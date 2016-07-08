<?php

// includes & Config
//--------------------
include ('class.feed.php');
$jsonFeed = [JSON FEED URL HERE];
$output = "";

//Setup Page Template
//-----------------------
$template = "template.php";

// Load Template into variable
$html = file_get_contents($template);
$html = mb_convert_encoding($html, 'HTML-ENTITIES', "UTF-8");


//Process Fixtures Feed
//-----------------------
$jsonFeedReader = new jsonFeedRead;
$data = $jsonFeedReader->jsonFeedProc($jsonFeed);

if($data == null) {
	$output = "<div><h2>Invalid Feed<h2></div>";
	$end = true;
}

//Debug - View feed results
#echo "<pre>";
#print_r($data);
#echo "</pre><br>";


// Sort fixtures into most recent first
$fixtures = array_reverse($data['SoticFeed']['Fixtures']['Fixture']);

if ($fixtures == null && !$end){
	$output .= "<div><h2>Fixtures feed not in expected format!</h2></div>";
} else {
	$output .= $jsonFeedReader->getFixtures($fixtures);
}

//Insert dynamic elements to the page template
$html = str_replace("[FIXTURES]", $output, $html);

//Output completed page
echo $html;

?>
