<?php
	include "utils.php";
	$test_string = $_POST['test_string'];
	echo $test_string . PHP_EOL . encode("", $test_string) . PHP_EOL . encode("", $test_string);

?>