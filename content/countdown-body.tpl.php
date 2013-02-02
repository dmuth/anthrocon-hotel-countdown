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
namespace Content\Countdown;


/**
* This function creates our content.
*
* @param string $start_date The start date, in YYYYMMDDHHMMSS format.
*
* @param string $end_date The end date, in YYYYMMDDHHMMSS format.
*
* @return string HTML code
*
*/
function getContent($start_date, $end_date) {

	//
	// Our URI's directory for doing includes off the local filesystem.
	//
	$dir = dirname($_SERVER["DOCUMENT_URI"]);

	//
	// For each of these URLs, use the local file for testing, 
	// and the S3 URL for running deployed.
	//

	//
	// Our CSS URL
	//
	$css_url = $dir . "/content/style.css";
	//$css_url = "//s3.amazonaws.com/anthrocon/AC2013/hotel/style.css";

	//
	// Our CSS used by the clock Javascript
	//
	$clock_css_url = $dir . "/content/js-clock/css/jbclock.css";
	//$clock_css_url = "//s3.amazonaws.com/anthrocon/AC2013/hotel/js-clock/css/jbclock.css";

	//
	// The clock Javascript
	//
	$clock_js_url = $dir . "/content/js-clock/js/jbclock.js";
	//$clock_js_url = "//s3.amazonaws.com/anthrocon/AC2013/hotel/js-clock/js/jbclock.js";

	//
	// Start buffering our output
	//
	ob_start();

?>
<html>
<head>

<link rel="stylesheet" type="text/css" href="<?php print $css_url; ?>" />
<link rel="stylesheet" href="<?php print $clock_css_url; ?>" type="text/css" media="all" />

<?php
//
// Google hosting of jQuery FTW!
//
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

        <?php
            /* Set start and end dates here */
            $startDate  = strtotime($start_date);
            $endDate    = strtotime($end_date);
            /* /Set start and end dates here */
        ?>
        <script type="text/javascript">
            $(document).ready(function(){

		var user_agent = "";
		if (navigator && navigator.userAgent) {
			user_agent = navigator.userAgent;
		}

		if (user_agent.match(/msie/i)) {
			//
			// Do nothing for MSIE
			//

		} else {
			//
			// We're not in MSIE? Go ahead and load our 
			// Clock JS and start the clock.
			//
			$.getScript("<?php print $clock_js_url; ?>", function() {

				JBCountDown({
					secondsColor : "#ffdc50",
					minutesColor : "#9cdb7d",
					hoursColor   : "#378cff",
					daysColor    : "#ff6565",
					startDate   : "<?php echo $startDate; ?>",
					endDate     : "<?php echo $endDate; ?>",
					now         : "<?php echo strtotime('now'); ?>",
					seconds     : "<?php echo date('s'); ?>"
				});

				$(".wrapper").fadeIn("slow");

			});

		}

            });
        </script>

</head>
<body>

<img src="//s3.amazonaws.com/anthrocon/AC2013/banner.png" height="183" width="970" />
<br/>

<div class="content">

<h1>Anthrocon 2013 Hotel Reservations Countdown Page</h1>

	<?php // This gets hidden by default, thanks to MSIE. ?>
        <div class="wrapper" style="display: none; ">
        <div class="clock">
            <!-- Days -->
            <div class="clock_days">
                <div class="bgLayer">
                    <div class="topLayer"></div>
                    <canvas id="canvas_days" width="188" height="188">
                    </canvas>
                    <div class="text">
                        <p class="val">0</p>
                        <p class="type_days">Days</p>
                    </div>
                </div>
            </div>
            <!-- Days -->
            <!-- Hours -->
            <div class="clock_hours">
                <div class="bgLayer">
                    <div class="topLayer"></div>
                    <canvas id="canvas_hours" width="188" height="188">
                    </canvas>
                    <div class="text">
                        <p class="val">0</p>
                        <p class="type_hours">Hours</p>
                    </div>
                </div>
            </div>
            <!-- Hours -->
            <!-- Minutes -->
            <div class="clock_minutes">
                <div class="bgLayer">
                    <div class="topLayer"></div>
                    <canvas id="canvas_minutes" width="188" height="188">
                    </canvas>
                    <div class="text">
                        <p class="val">0</p>
                        <p class="type_minutes">Minutes</p>
                    </div>
                </div>
            </div>
            <!-- Minutes -->
            <!-- Seconds -->
            <div class="clock_seconds">
                <div class="bgLayer">
                    <div class="topLayer"></div>
                    <canvas id="canvas_seconds" width="188" height="188">
                    </canvas>
                    <div class="text">
                        <p class="val">0</p>
                        <p class="type_seconds">Seconds</p>
                    </div>
                </div>
            </div>
            <!-- Seconds -->
        </div>
        </div><!--/wrapper-->

<br/>
<br/>
<br/>
To handle the increased traffic, this website is now in read-only mode.
The link for hotel reservations will be posted here at 
<b>11 AM EST on February 1st, 2013</b>.
<br/>
<br/>
If you are using a browser other than Internet Explorer, there will be 
a nice counter displayed above.  There will be no need to refresh this 
page <b>until the counter reaches zero</b>.
<br/>
<br/>

At that time, we will also post the link to these other places 
(in case this website goes down from the load) in the following order:
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


