<?php
/**
* This classfile is responsible for the logic of our countdown.
*/

class Countdown {


	/**
	* How much time do we have left?
	*
	* @param string $date The date we're counting down to in 
	*	YYYYMMDDHHMMSS format.
	*
	* @return integer The number of seconds left. This can be 
	*	zero or a negative number.
	*/
	function getTimeLeft($date) {

		$deadline = strtotime($date);
		//echo "DEBUG: Deadline: " . date("r", $deadline);
		$now = time();

		$retval = $deadline - $now;

		return($retval);

	} // End of getTimeLeft()


} // End of Countdown class


