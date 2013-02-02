<?php
/**
* This class handles the loading of our live page once countdown is complete.
*/


//
// Load our template file.
//
require("live-body.tpl.php");

class Content_Live {


	/**
	* Get our actual page.
	*
	* @return string HTML code
	*/
	function getPage() {

		$retval = "";

		$retval .= Content\Live\getContent();

		return($retval);

	} // End of getPage()


} // End of Content_Live class


