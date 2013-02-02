<?php
/**
* Our template for the countdown page.
*/

//
// The reason for this namespace and funciton action is twofold:
//
// - First, to prevent people from loading this file directly 
//	via the web and viewing itself contents.
//
// - Second, so that all of these template files can be loaded 
//	when the initial index.php is loaded. At first glance, 
//	that seems to be a bad idea, but the reason I do this 
//	is so that I can verify that all of the necessary files 
//	exist while the system is in countdown phase.  Because 
//	nothing would suck more than for the countdown to finish, 
//	and for a "file not found" error to result for the live 
//	template, potentially while thousands of people are 
//	viewing the page.
//
namespace Content\Live;


/**
* This function creates our content.
*
* @return string HTML code
*
*/
function getContent() {

	//
	// Our URI's directory for doing includes off the local filesystem.
	//
	$dir = dirname($_SERVER["DOCUMENT_URI"]);

	//
	// Our CSS URL
	// Use a local file for testing, then upload to Amazon S3 or 
	// a CDN for deployment.
	//
	$css_url = $dir . "/content/style.css";
	//$css_url = "//s3.amazonaws.com/anthrocon/AC2013/hotel/style.css";

	//
	// Our URL for the hotel reservations.
	//
	$url = "http://www.google.com/foobar/test"; // Debugging
	//$url = "https://resweb.passkey.com/go/anthroattendee";

	//
	// Start buffering our output
	//
	ob_start();

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php print $css_url; ?>" />
</head>
<body>

<img src="//s3.amazonaws.com/anthrocon/AC2013/banner.png" height="183" width="970" />
<br/>

<div class="content">

<h1>Hotel Reservations For Anthrocon 2013 Are Now Open!</h1>

<div style="font-size: x-large; ">
I understand that a deposit of one night's room and tax will be
charged when I make my reservation and that this deposit is
NON-REFUNDABLE if I cancel my reservation after that charge is made. I
also agree to the Housekeeping policies at Anthrocon's hotels. 
</div>

<br/>
<br/>

<div style="font-size: 16px; ">
<a href="<?php print $url; ?>">Now take me to the Passkey site so I can make my hotel reservation.</a>
</div>
<br/>
<br/>

We will take this website out of read-only mode once the traffic levels to it 
have gone down to sane values.
<br/>
<br/>

In the meantime, here are other ways to get in touch with us:

<ul>
<li>Twitter: <a href="http://twitter.com/Anthrocon">http://twitter.com/Anthrocon</a></li>
<li>Our Facebook Page: <a href="http://www.facebook.com/Anthrocon">http://www.facebook.com/Anthrocon</a></li>
<li>Our Facebook Group: <a href="https://www.facebook.com/groups/49844448265/">https://www.facebook.com/groups/49844448265/</a></li>
<li>Google Plus: <a href="https://plus.google.com/+anthrocon/posts">https://plus.google.com/+anthrocon</a> </li>
<li>LiveJournal: <a href="http://anthrocon.livejournal.com/">http://anthrocon.livejournal.com/</a></li>
</ul>



</div>

</body>
</html>
<?php

	//
	// Grab our buffer contents and turn off buffer.
	//
	$retval = ob_get_contents();
	ob_end_clean();

	return($retval);

} // End of getContent()


