<?php
/**
* This class handles the loading of our countdown template.
*/


//
// Load our template file.
//
require("countdown-body.tpl.php");

class Content_Countdown {


	/**
	* Get our actual page.
	*
	* @param string $start_date The start date, in YYYYMMDDHHMMSS format.
	*
	* @param string $end_date The end date, in YYYYMMDDHHMMSS format.
	*
	* @return string HTML code
	*/
	function getPage($start_date, $end_date) {

		$retval = "";

		$retval .= Content\Countdown\getContent($start_date, $end_date);

		return($retval);

	} // End of getPage()


} // End of Content_Countdown class


