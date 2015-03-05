<?php

	function encode($usr, $pass){
		$split_user = split_username($usr); // halving the username string
		$salt = crc32($usr); // making salt from user
		$salted_user = $split_user[0] . $salt . $split_user[1]; // salting the user
		$to_return = $salted_user . $pass;

		return hash('sha256', $to_return);
	}

	function split_username($arg){
		$length = strlen($arg);
		if($length % 2 == 0){ // array will always have length 2
			return str_split($arg, $length / 2);
		} else {
			return str_split($arg, ($length + 1) / 2);
		}
	}

?>