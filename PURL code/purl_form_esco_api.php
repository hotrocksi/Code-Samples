<?php



$args['errorurl'] = "http://www.google.co.uk";
$args['deliveryEmail'] = "simon.goldie@pro-activeuk.com";		// Required
$args['accountcode'] = $_SESSION['accountcode'];
$args['hash'] = strtoupper(md5("simon.goldie@pro-activeuk.com".$_SESSION['accountcode']."5tivesT3mp5alt"));		// Required (email and salt)
$args['method'] = 2;
$args['confirmationurl'] = "http://www.grocer.proactive360.com/esco_complete.php?purl=".$_SESSION['Contact']['Purl']."&stock_ref=".$_SESSION['Contact']['StockRef']."&level=".$_SESSION['Contact']['Level']."&abandoned=".$_SESSION['Contact']['Abandoned'];
$args['paymentType'] = "CC";							// Required
$args['stockRef'] = "";									
$args['bundleRef'] = "";
$args['deliveryTitle'] = "Mr";							// Required
$args['deliveryForename'] = "John";						// Required
$args['deliverySurname'] = "Smith";						// Required
$args['deliveryTelephone'] = $_SESSION['Telephone'];
$args['deliveryJob'] = $_REQUEST['JobTitle'];
$args['deliveryDepartment'] = $_SESSION['Department'];
$args['deliveryCompany'] = $_REQUEST['Company'];
$args['deliveryAddressline1'] = "Inspiration House";	// Required
$args['deliveryAddressline2'] = $_SESSION['Address2'];
$args['deliveryTown'] = "Chichester";					// Required
$args['deliveryCounty'] = $_SESSION['County'];
$args['deliveryPostcode'] = "PO19 7RT";					// Required
$args['deliveryCountryISO'] = "GB";						// Required
$args['billingAlternate'] = 0;

echo "<pre>";
print_r($args);
exit;

if (isset($_REQUEST['bundleRef'])) {
	$args['bundleRef'] = $_REQUEST['bundleRef'];
}
if (isset($_REQUEST['stockRef'])) {
	$args['stockRef'] = $_REQUEST['stockRef'];
}


#$url = "http://wrb.dev.esco.isledev.co.uk/_api/transfer.ashx";
$url = "http://shop.william-reed.com/_api/transfer.ashx";



$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($args));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
$result = curl_exec($ch);

$xml = new SimpleXMLElement($result);
if ($xml->url != "") {
	header("Location: ".$xml->url);
} else {
	echo "<h2>Error</h2>";
	echo "<p>".$xml->fault->message."</p>";
}