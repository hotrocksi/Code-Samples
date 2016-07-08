<?php

// Load config
include ('purl_config.php');



// Get variables
$purl = $_GET['user'];												// from htcaccess mod rewrite
$page = $_GET['page'];												// from htcaccess mod rewrite
if (!$page) {
	$page = "home";
}

/*
if($_SERVER["HTTP_HOST"] == $domain) {								// force www. prefix to url for click report consistency
	$change_url = "http://www." . $domain. $_SERVER["REQUEST_URI"];;	
	header("Location: $change_url");
	exit();																
}
*/

$url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];  	// get url from browser address bar - used for tracking
$referrer = $_SERVER['HTTP_REFERER'];								// get url from the page the link was clicked



// Build database field name array for use in $_SESSION['Contact'] array
$query = "SELECT * FROM $dbtable LIMIT 1";
$result = mysql_query($query) or die(mysql_error());
$num_fields = mysql_num_fields($result);
for ($i=0; $i < $num_fields; $i++)
{
	$ar_field[$i] = mysql_field_name($result, $i);
}


// Find $purl and create $_SESSION['Contact'] array
$query = "	SELECT * 
			FROM $dbtable 
			LEFT JOIN email_promo ON db.`Source` = email_promo.`PromoCode`
			LEFT JOIN email_promo_api_codes ON email_promo.`Level` = email_promo_api_codes.`Level`				
			WHERE Purl = '$purl'";
			#echo $query;
$result = $mysqli->query($query);
while($row = $result->fetch_assoc()) {

	$found = "Y";
	foreach ($row AS $key => $val) {
		$_SESSION['Contact'][$key] = $val;
	}
	#for ($i=0; $i < count($ar_field); $i++)	{
	#	$_SESSION['Contact'][$ar_field[$i]] = $row[$ar_field[$i]];
	#}
}

if ($found == "Y" && $_SESSION['Contact']['DisplayOffer'] == "") {
	$_SESSION['Contact']['DisplayOffer'] = $_SESSION['Contact']['DisplayOfferDefault'];
	$query = "	UPDATE $dbtable
				SET `DisplayOffer` = \"".$_SESSION['Contact']['DisplayOffer'] ."\"
				WHERE Purl = '$purl'";
	$result = $mysqli->query($query);
}



// If not found, default to generic purl
if ($found != "Y")
{
	$purl = "";
	$query = "SELECT * FROM $dbtable WHERE Purl = '$purl'";
	$result = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_array($result))
	{
		$found = "Y";
		for ($i=0; $i < count($ar_field); $i++) {
			$_SESSION['Contact'][$ar_field[$i]] = $row[$ar_field[$i]];
		}
	}
}


// Create SessionID for first time connections and if user changes PURL
$query = "	SELECT
				SessionID, Purl
			FROM
				$dbtable_session
			WHERE
				SessionID = '".$_SESSION['Browser']['SessionID']."'
			AND
				PURL = '".$_SESSION['Contact']['Purl']."'
			";
$result = mysql_query($query) or die(mysql_error());
$num_rows = mysql_num_rows($result);

if ($num_rows  == 0) {
	$query = "	SELECT
					MAX(SessionID)
				FROM
					$dbtable_session
			";
	$result = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_array($result))
	{
		$_SESSION['Browser']['SessionID'] = $row['MAX(SessionID)'];
	}
	
	$_SESSION['Browser']['SessionID']++;
	$activity = "session";
	include("purl_tracker.php");
}



// Use security page firewall
if ($found == "Y") {
	if ($enable_security == "Y")
	{
		if ($_POST['security'])
		{
			$_SESSION['Security'] = $_POST['security'];
		}
		$query = "SELECT * FROM $dbtable WHERE Purl = '$purl' AND Security = '".$_SESSION['Security']."'";
		$result = mysql_query($query) or die(mysql_error());
		$numrows = mysql_num_rows($result);	
		if ($numrows == 0)
		{
			unset ($_SESSION['Security']);	
			include ('purl_security.php');
		}
	}
}
else
{
	unset ($_SESSION['Security']);	
}



// Was a form submitted?
if ($_REQUEST['pa_ref'])
{
	$form_ref = $_REQUEST['pa_ref'];
	$form_submit = "Y";
}



// Bullet proof form handling (non javascript)
if ($form_submit == "Y")
{
	$_SESSION['Form'] = $_POST;

	// Required field validation
	$bad = 0;
	foreach ($form_validation[$form_ref] AS $val)
	if ($_SESSION['Form'][$val] == "") {
		$bad = 1; 
	};
	if ($bad == 1) {
		$form_message =  $form_warning[$form_ref];
		unset($_REQUEST['pa_ref']);
	} else {


		// Alert and track
		$form_message =  $form_success[$form_ref];
		$activity = "form";
		include ('purl_tracker.php');
		include ('purl_email.php');
		if ($enable_emailthanks == "Y")	{
			include ('purl_emailthanks.php');
		}


		// Form add-ons
		if ($_REQUEST['pa_ref'] == "Download") {
			include('purl_form_create.php');
		}	
		if ($_REQUEST['pa_ref'] == "Referral") {
			include('purl_form_referral.php');
		}
		if ($_REQUEST['pa_ref'] == "Register" || $_REQUEST['pa_ref'] == "Trial") {
			include('esco_redirect.php');
		}

	}

}



// Avoid page/invalid user becoming purl - example: usepurls.com/home/why
if ($found != "Y" || $purl == "")
{
	$page = $_GET['user'];												// from htcaccess mod rewrite
	if ($page == "") {
		$page = "home";
	}
	unset ($purl);
	unset ($_SESSION['Contact']);	
}





// Set redirection variable
for ($i = 0; $i < count($ar_link); $i++) 
{
	if ( strtoupper($page) == strtoupper($ar_link[$i][1]) )
	{
		if ( strtoupper($ar_link[$i][2]) == strtoupper("Internal") )
		{
			#$ext = str_replace($domain, $domain."/".$_SESSION['Contact']['Purl'], $ar_link[$i][0]);
		}
		else
		{	
			$ext = url_to_absolute( $cust_domain, $ar_link[$i][0]);
		}
	}
}




// Register open/clicks
if ($form_submit != "Y") {
	if ($page == "home" || $page == "homepage") {
		$activity = "visit";
	}
	else {
		$activity = "click";
	}
	include ('purl_tracker.php');
	
	
	// avoid sending duplicate emails (3g dongle dual networks etc)
	if ($req_counter == 0) 
	{
		if ($enable_email == "Y")
		{
			include ('purl_email.php');
		}
		// send thank you email
		if ($enable_emailthanks == "Y")
		{
			include ('purl_emailthanks.php');
		}
	}
}

//Open Count
#echo "visit table: ".$dbtable_visit;
#print_r($_SESSION['Browser']['SessionID']);

$query = "	SELECT
				`Purl`
			FROM
				$dbtable_visit
			WHERE	
				`Purl` = \"".$_SESSION['Contact']['Purl']."\"
			";
$result = $mysqli->query($query);
$open_count = $result->num_rows;


if (!$_SESSION['Contact']['Purl']) {
	$ext = "http://shop.william-reed.com/brands/thegrocer.htm";
}

// Redirect page
if ($ext)
{
	header("Location: ".$ext);
}




// Template selection
#$template = "purl_template_intro.php";
$template = "purl_template.php";
#$template = "purl_template_thanks.php";

if ($page == "home") {
	$template = "purl_template.php";
}

if ($open_count == 1) {
	$template = "purl_template_intro.php";
} else {
	$template = "purl_template.php";
}

if ($page == "thanks") {
	$template = "purl_template_thanks.php";
}
if ($page == "trialthanks") {
	$template = "purl_template_trialthanks.php";
}
if ($page == "intro") {
	$template = "purl_template_intro.php";
}


// Load Template into variable
$html = file_get_contents($template);
$html = mb_convert_encoding($html, 'HTML-ENTITIES', "UTF-8");



// Jquery code for tracking time spent on code
$clock1 = "
<script src=\"http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js\"></script>
<script>
jQuery.noConflict();

// Getting the time on page load
jQuery(document).ready(function()
{
	startday = new Date();
	clockStart = startday.getTime();
});
	  
// Getting the time on page unload
jQuery(window).unload(function()
{
	startday = new Date();
	clockEnd = startday.getTime();
	clockViewtime = Math.round((clockEnd-clockStart)/1000); 
	
	dataString = 'purl=' + '".$purl."' + '&activity=' + '".$activity."' + '&spent=' + clockViewtime + '&page=' + '".$page."';

	// Request url
	jQuery.ajax({
		type: 'POST',
		url: '../purl_timer.php', 
		data: dataString,
		success: function(output){

		}
	});	
});
</script>
";

$clock2 = "
<script>
// Getting the time on page load
$(document).ready(function()
{
	startday = new Date();
	clockStart = startday.getTime();
});
	  
// Getting the time on page unload
$(window).unload(function()
{

	startday = new Date();
	clockEnd = startday.getTime();
	clockViewtime = Math.round((clockEnd-clockStart)/1000); 
	
	dataString = 'purl=' + '".$purl."' + '&activity=' + '".$activity."' + '&spent=' + clockViewtime + '&page=' + '".$page."';
	
	// Request url
	$.ajax({
		type: 'POST',
		url: '../purl_timer.php', 
		data: dataString,
		success: function(output){
			
		}
	});	
});
</script>
";

// Insert the time spent on page tracking code.  Only insert jquery if needed.
$pos = strpos($html, "jquery");
if ($pos === false)
{
	// jquery string not found - use no conflict script
	$myclock = $clock1;
}
else
{
	// jquery string found - use regular script
	$myclock = $clock2;
}

$html = str_replace("</body>", $myclock."</body>", $html);

// DMG calendar fix
$html = str_replace("var _vCalUrl = \"/", "var _vCalUrl = \"http://www.cvent.com/", $html);
$html = str_replace("var _iCalUrl = \"/", "var _iCalUrl = \"http://www.cvent.com/", $html);
$html = str_replace(" var _EmailToPlnrUrl = \"/", "var _EmailToPlnrUrl = \"http://www.cvent.com/", $html);


//Check if all required fields for ESCO payment system are available
//------------------------------------------------------------------
$completedata = "No"; //Initialise. Required fields are missing from the data
$req_counter == 0; //Initialise count


$esco_required[] = "Title";
$esco_required[] = "FirstName";
$esco_required[] = "LastName";
$esco_required[] = "Address1";
$esco_required[] = "Town";
//$esco_required[] = "CountryISO"; //REQUIRED?  All data UK?? 
//ARE SAME FIELDS REQUIRED FOR TRIAL??

$reqcount = count($esco_required); //No of required fields in esco_required array

foreach ($esco_required as $value) {
	$details = $_SESSION['Contact'][$value];
	if ($_SESSION['Contact'][$value] != "") {
		$match_counter++;
	}
}

if ($match_counter == $reqcount){
	$completedata = "Yes"; //All matched. Short form selected
} else {
	$completedata = "No";
}

#echo "Count (matched | required) :  ".$match_counter." | ".$reqcount;
#echo " - Success? :  ".$completedata;

#$completedata = "Yes"; //Debug/Styling only
//------------------------------------------------------------------
//------------------------------------------------------------------
// Segmented copy
include ('purl_template_segments.php');

//PA AUTO FORM INSERTION
include ('purl_template_forms.php');  //HTML form code
$html = str_replace("</head>", $pa_form_style."</head>", $html); // Insert Form style into <HEAD>

$subbed = "trial";
// SHOW TRIAL OFFER
if($_SESSION['Contact']['DisplayOffer'] == "Trial" ) {

	if($completedata == "Yes"){
		$html = str_replace("[PA_REGISTER_FORM]", $pa_trial_form_short, $html);		//Insert trial form
	} else {
		$html = str_replace("[PA_REGISTER_FORM]", $pa_trial_form, $html);			//Insert trial form
	}

} else if($_SESSION['Contact']['DisplayOffer'] == "Subscription" ) {
	$subbed = "sub";
	//SHOW SUBSCRIPTION OFFER
	if($completedata == "Yes"){
		$html = str_replace("[PA_REGISTER_FORM]", $pa_register_form_short, $html);	//Insert register form
	} else {
		$html = str_replace("[PA_REGISTER_FORM]", $pa_register_form, $html);		//Insert register form
	}
	
} else {
	$subbed = "complete";
	$html = str_replace("[PA_REGISTER_FORM]", $downloads, $html);	//Remove subscrition form and replace with downloads

}
	

$html = str_replace("[PA_DOWNLOAD_FORM]", $pa_download_form, $html);// Insert Download Form into page
$html = str_replace("[PA_REFERRAL_FORM]", $pa_referral_form, $html);// Insert Referral Form into page
$html = str_replace("</body>", $pa_scripts."</body>", $html); // Insert Form scripts at end of <BODY>



//PAYMENT PRICES / VARIATIONS
//------------------------------------------------------------------

if($_SESSION['Contact']['Level'] == "Finance") {
	$prices = 
		'<h5 class="[LEVEL] clear" style="margin: 10px 0px 0px 0px; padding: 10px 0 0 0; font-family: FFUnitWebProUltra; font-weight: normal;">SAVE £30 - 1 Year Membership £265+VAT </h5>
		<p class="" style="margin-bottom: 0;">Select your payment option:</p>
		<div class="large-5 medium-5 columns"><input name="paymentType" type="radio" value="DD" style="margin: 0;" checked="checked" /> <span class="smallish">Direct Debit</span><br /></div>
		<div class="large-5 medium-5 columns"><input name="paymentType" type="radio" value="CC" /> <span class="smallish">Credit Card</span><br /></div>';
} else if($_SESSION['Contact']['Level'] == "Platinum") {
	$prices = 
		'<h5 class="[LEVEL] clear" style="margin: 10px 0px 0px 0px; padding: 10px 0 0 0; font-family: FFUnitWebProUltra; font-weight: normal;">SAVE £45 - 1 Year Membership £400+VAT</h5>
		<p class="" style="margin-bottom: 0;">Select your payment option:</p>
		<div class="large-5 medium-5 columns"><input name="paymentType" type="radio" value="DD" style="margin: 0;" checked="checked" /> <span class="smallish">Direct Debit</span><br /></div>
		<div class="large-5 medium-5 columns"><input name="paymentType" type="radio" value="CC" /> <span class="smallish">Credit Card</span><br /></div>';
}else if($_SESSION['Contact']['Level'] == "Gold") {
	$prices = 
		'<h5 class="[LEVEL] clear" style="margin: 10px 0px 0px 0px; padding: 10px 0 0 0; font-family: FFUnitWebProUltra; font-weight: normal;">SAVE £25 - 1 Year Membership £200+VAT</h5>
		<p class="" style="margin-bottom: 0;">Select your payment option:</p>
		<div class="large-5 medium-5 columns"><input name="paymentType" type="radio" value="DD" style="margin: 0;" checked="checked" /> <span class="smallish">Direct Debit</span><br /></div>
		<div class="large-5 medium-5 columns"><input name="paymentType" type="radio" value="CC" /> <span class="smallish">Credit Card</span><br /></div>';
} else if($_SESSION['Contact']['Level'] == "Silver") { 
	$prices = 
		'<h5 class="[LEVEL] clear" style="margin: 10px 0px 0px 0px; padding: 10px 0 0 0; font-family: FFUnitWebProUltra; font-weight: normal;">1 Year Membership £175+VAT</h5>
		<p class="" style="margin-bottom: 0;">Select your payment option:</p>
		<div class="large-5 medium-5 columns"><input name="paymentType" type="radio" value="DD" style="margin: 0;" checked="checked" /> <span class="smallish">Direct Debit</span><br /></div>
		<div class="large-5 medium-5 columns"><input name="paymentType" type="radio" value="CC" /> <span class="smallish">Credit Card</span><br /></div>';
}

//------------------------------------------------------------------
//------------------------------------------------------------------



// Personalisation hooks
if ($_SESSION['Contact']['Salute'])
{
	if ($open_count > 1) 
	{
		$html = str_replace("[WELCOME]", $_SESSION['Contact']['Salute'].", <span class='[LEVEL] bold'>get more</span> with <span class='[LEVEL] bold prodname' style=''>The Grocer [LEVEL] Membership</span>", $html);
	}
	else
	{
		$html = str_replace("[WELCOME]", $_SESSION['Contact']['Salute'].", <span class='[LEVEL] bold'>get more</span> with <span class='[LEVEL] bold prodname' style=''>The Grocer [LEVEL] Membership</span>", $html);
	}
}
else
{
	$html = str_replace("[WELCOME]", $_SESSION['Contact']['Salute'].", <span class='[LEVEL] bold'>get more</span> with <span class='[LEVEL] bold prodname' style=''>The Grocer [LEVEL] Membership</span>", $html);
}





if (isset($_SESSION['Contact']['Salute'])) {
	$html = str_replace("[SALUTE]", $_SESSION['Contact']['Salute'], $html);
	$html = str_replace("[SALUTE2]", $_SESSION['Contact']['Salute'].", ", $html);
} else {
	$html = str_replace("[SALUTE]", "", $html);
	$html = str_replace("[SALUTE2]", "", $html);
}

if (isset($_SESSION['Contact']['Company'])) {
	$html = str_replace("[COMPANY]", $_SESSION['Contact']['Company'], $html);
	$html = str_replace("[COMPANY2]", " at ".$_SESSION['Contact']['Company'], $html);
} else {
	$html = str_replace("[COMPANY]", "", $html);
	$html = str_replace("[COMPANY2]", "", $html);
}

$miniflip_show = $miniflip;
if ($_SESSION['Contact']['Level'] == "Platinum") {
	$html = str_replace("[PRODIMAGE]", $prodimage_platinum, $html);
	$html = str_replace("[BENEFITS]", $benefits_platinum, $html);
	if($completedata == "Yes"){ //Short Pre-pop form displayed on page
		$html = str_replace("[NEWS]", "smallnews", $html);
	} else { //Long Pre-pop form displayed on page
		$html = str_replace("[NEWS]", "", $html);
		#$html = str_replace("[NEWS]", "smallnews", $html);
	}
} else if ($_SESSION['Contact']['Level'] == "Gold") {
	$html = str_replace("[PRODIMAGE]", $prodimage_gold, $html);
	$html = str_replace("[BENEFITS]", $benefits_gold, $html);
	if($completedata == "Yes"){
		$html = str_replace("[NEWS]", "smallnews", $html);
	} else {
		$html = str_replace("[NEWS]", "", $html);
		#$html = str_replace("[NEWS]", "smallnews", $html);
	}
} else if ($_SESSION['Contact']['Level'] == "Silver") {
	$html = str_replace("[PRODIMAGE]", $prodimage_silver, $html);
	$html = str_replace("[BENEFITS]", $benefits_silver, $html);
	if($completedata == "Yes"){
		$html = str_replace("[NEWS]", "smallnews", $html);
	} else {
		$html = str_replace("[NEWS]", "mednews", $html);
	}
} else if ($_SESSION['Contact']['Level'] == "Finance") {
	$miniflip_show = "";
	$html = str_replace("[PRODIMAGE]", $prodimage_finance, $html);
	$html = str_replace("[BENEFITS]", $benefits_finance, $html);
	if($completedata == "Yes"){
		$html = str_replace("[NEWS]", "bignews", $html);
	} else {
		$html = str_replace("[NEWS]", "biggernews", $html);
	}
} else {
	$html = str_replace("[PRODIMAGE]", $prodimage_silver, $html);
	$html = str_replace("[BENEFITS]", $benefits_silver, $html);
	$html = str_replace("[NEWS]", "", $html);
}

// text
$html = str_replace("[PURL]", $_SESSION['Contact']['Purl'], $html);
$html = str_replace("[NAME]", trim($_SESSION['Contact']['FirstName']." ".$_SESSION['Contact']['LastName']), $html);
$html = str_replace("[TITLE]", $_SESSION['Contact']['Title'], $html);
$html = str_replace("[FIRSTNAME]", $_SESSION['Contact']['FirstName'], $html);
$html = str_replace("[LASTNAME]", $_SESSION['Contact']['LastName'], $html);
$html = str_replace("[COMPANY]", $_SESSION['Contact']['Company'], $html);
$html = str_replace("[COMPANYNAME]", "", $html);
$html = str_replace("[JOB]", $_SESSION['Contact']['JobTitle'], $html);
$html = str_replace("[ADDRESS1]", $_SESSION['Contact']['Address1'], $html);
$html = str_replace("[ADDRESS2]", $_SESSION['Contact']['Address2'], $html);
$html = str_replace("[ADDRESS3]", $_SESSION['Contact']['Address3'], $html);
$html = str_replace("[TOWN]", $_SESSION['Contact']['Town'], $html);
$html = str_replace("[COUNTY]", $_SESSION['Contact']['County'], $html);
$html = str_replace("[POSTCODE]", $_SESSION['Contact']['Postcode'], $html);
$html = str_replace("[COUNTRY]", $_SESSION['Contact']['Country'], $html);
$html = str_replace("[PHONE]", $_SESSION['Contact']['Telephone'], $html);
$html = str_replace("[EMAIL]", $_SESSION['Contact']['Email'], $html);
$html = str_replace("[SUBJECT]", $_SESSION['Contact']['Subject'], $html);

$html = str_replace("[MINIFLIP]", $miniflip_show, $html);
$html = str_replace("[DATA_PROTECTION]", $data_protection, $html);
$html = str_replace("[DOWNLOADS]", $downloads, $html);

#echo $form_message;

$html = str_replace($form_output[$form_ref], $form_message, $html);
$html = str_replace("[FORMRESULT1]", "", $html);
$html = str_replace("[FORMRESULT2]", "", $html);
$html = str_replace("[FORMRESULT3]", "", $html);
$html = str_replace("[DOMAIN]", $purl_domain, $html);
$html = str_replace("[FORMSELF]", "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], $html);
$html = str_replace("[LEVEL_PAYMENT]", $prices, $html);
$html = str_replace("[SUB]", $subbed, $html);
$html = str_replace("[LEVEL]", $_SESSION['Contact']['Level'], $html);

	$deadline = $_SESSION['Contact']['Deadline'];
	$mydate = DateTime::createFromFormat("Y-m-d H:i:s", $deadline);
	
	$offer_deadline = $mydate->format('jS F Y');
	#$offer_deadline = $_SESSION['Contact']['Deadline'];

if($_SESSION['Contact']['DisplayOffer'] == "Complete") {
	$html = str_replace("[DEADLINE]", "", $html);
} else {
	$html = str_replace("[DEADLINE]", "&#8224;Your special offer ends ".$offer_deadline, $html);
}


// Grocer Form API hooks
$html = str_replace("[ACCOUNTCODE]", "", $html);
$html = str_replace("[STOCKREF]", $_SESSION['Contact']['StockRef'], $html);
$html = str_replace("[BUNDLEREF]", $_SESSION['Contact']['BundleRef'], $html);
$html = str_replace("[CONFIRMATIONURL]", "http://www.my-grocer.co.uk/esco_complete.php?session_id=".$_SESSION['Browser']['SessionID']."&purl=".$_SESSION['Contact']['Purl'], $html);



$name = trim($_SESSION['Contact']['FirstName']." ".$_SESSION['Contact']['LastName']);
$name_upper = strtoupper($name);


if($_SESSION['Contact']['Title'] == ""){
	$title = "";
} else {
	$title = $_SESSION['Contact']['Title']." ";
}
$name_n_title = $title." ".$name;
$firstname = $_SESSION['Contact']['FirstName'];
$stripstring = preg_replace('/\s+/', '', $firstname);
if (strlen($stripstring) < 3) {
	//Name is most likely initials, use Title Surname
	$name = $name_n_title;
	$pos = "long";
} else {
	// Use firstname
	$name = trim($firstname);
	$pos = "short";
}


// Clever way of relative to absolute 
$dom = new DOMDocument();
$dom->loadHTML($html);
$dom->encoding = 'UTF-8';
$ar_xpath[] = array("Hyperlink", "/html/body//a", "href");
$ar_xpath[] = array("CSS", "/html//link", "href");
$ar_xpath[] = array("Javascript", "/html//script", "src");
$ar_xpath[] = array("Image", "/html/body//img", "src");
//$ar_xpath[] = array("Iframe", "/html/body//iframe", "src");
$ar_xpath[] = array("Form", "/html/body//form", "action");
$ar_xpath[] = array("Form Input", "/html/body//input", "src");
$ar_xpath[] = array("Flash", "/html/body//object", "data");
$ar_xpath[] = array("Flash", "/html/body//object", "value");
for ($x=0; $x < count($ar_xpath); $x++)
{
	$xpath = new DOMXPath($dom);
	$hrefs = $xpath->evaluate($ar_xpath[$x][1]);
	for ($i=0; $i < $hrefs->length; $i++) 
	{
		// Relative and absolute hyperlinks array
		$href = $hrefs->item($i);
		if ($href->getAttribute($ar_xpath[$x][2]) != "")
		{
			$href_rel[] = $href->getAttribute($ar_xpath[$x][2]);
			$href_abs[] = url_to_absolute( $cust_domain, $href_rel[count($href_rel)-1]);
		}
	}
}

// Replace relative with absolute
for ($i = 0; $i < count($href_rel); $i++) 
{
	// Ignore hyperlinks starting with #
	if (substr($href_rel[$i],0,1) != "#") 
	{
		$html = str_replace("\"".$href_rel[$i]."\"", "\"".$href_abs[$i]."\"", $html);
		$html = str_replace("'".$href_rel[$i]."'", "'".$href_abs[$i]."'", $html);
	}
}


// Dumb way of relative to absolute (due to incorrect use of tags on client website)
$html = str_replace("href=\"/", "href=\"".$cust_domain."/", $html);
$html = str_replace('href=\'/', 'href=\''.$cust_domain.'/', $html);
$html = str_replace("src=\"/", "src=\"".$cust_domain."/", $html);
$html = str_replace('src=\'/', 'src=\''.$cust_domain.'/', $html);


// Insert purl tracking into hyperlinks in $ar_link
for ($i = 0; $i < count($ar_link); $i++) 
{
	if ($purl) 
	{
		$link = "../".$purl."/".$ar_link[$i][1];
	}
	else
	{
		$link = "../".$ar_link[$i][1];
	}
	$html = str_replace("href=\"".$ar_link[$i][0]."\"", "href=\"".$link."\"", $html);
	$html = str_replace("href=\'".$ar_link[$i][0]."\'", "href=\'".$link."\'", $html);
}

$status = $_SESSION['Contact']['Status'];
$level = $_SESSION['Contact']['Level'];
$debug_stuff = <<<EOT
<div id="debug" style="">
	<p><strong>Debug Data</strong></p>
	<p>Level: {$level}<br/>
	Status: {$status}<br/>
	Complete Data: {$completedata}<br/>
	Visit count: {$open_count}
	</p>
</div>
EOT;
#echo $debug_stuff;
	


// Output landing page
echo $html;



#$debug = "Y";
if ($debug == "Y") 
{
	echo '<pre>';
	print_r($_REQUEST);
	print_r($_SESSION);
}



?>
