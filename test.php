<?php
	include "utils.php";
	$test_string = $_POST['test_string'];
	echo "Initial string: " . $test_string . endl();
	$bit_32 = crc32($test_string);
	echo "CRC_32: " . $bit_32 . endl();
	$length = strlen($test_string);
	echo "LENGTH: " . $length . endl();
	$str_split = 
	var_dump($str_split);
	echo endl();
	var_dump(encode($test_string, $bit_32));



	function encode($usr, $pass){
		$split_user = split_username($usr); // halving the username string
		$salt = crc32($usr);
		$to_return = $split_user[0] . $salt . $split_user[1]; // salting the user

		return hash('sha256', $to_return);
	}

	function split_username($arg){
		$length = strlen($arg);
		if($length % 2 == 0){
			return str_split($arg, $length / 2);
		} else {
			return str_split($arg, ($length + 1) / 2);
		}
	}

?>