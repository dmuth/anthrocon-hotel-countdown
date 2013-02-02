<?php

require("countdown.class.php");
require("content/countdown.class.php");
require("content/live.class.php");


//
// What date are we counting down to?
//
$start_date = "20120201110000";
$end_date = "20130201110000";

//
// PROTIP: Comment this out in a production environment!
// This is for testing and development ONLY.
//
if (isset($_GET["date"])) {
	$end_date = rawurlencode($_GET["date"]);
}

//
// How much time do we have left?
//
$countdown = new Countdown();
$seconds_left = $countdown->getTimeLeft($end_date);

$content_countdown = new Content_Countdown();
$content_live = new Content_Live();


//echo "SECONDS LEFT: $seconds_left<br/>\n";
$html = "";

if ($seconds_left >= 0) {
	//$end_date = "20120201110000"; // Debugging
	$html .= $content_countdown->getPage($start_date, $end_date);
} else {
	$html .= $content_live->getPage();
}

print $html;

// All done!


