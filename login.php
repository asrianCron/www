<?php
	session_start();
	include "config/db.php";
	// var_dump($_POST['user']['name']);

	$username = $_POST['user']['name'];
	$password = $_POST['user']['password'];

	$_SESSION['user'] = $_POST['user']['name'];
	$_SESSION['password'] = $_POST['user']['password'];

	// $mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if($mysqli->connect_errno) {
		echo "FAILED TO CONNECT TO MYSQL: " . $mysqli->connect_error;
	}
	// $query = "SELECT " . $username . " FROM " . DB_USERS_TABLE;
	$query = "SELECT username, password FROM " . DB_USERS_TABLE . " WHERE BINARY username='" . $username ."'";

	$res = $mysqli->query($query);
	$row = 0;
	if($res){
		$row = $res->fetch_assoc();
		if($row['password'] == $password){
			$_SESSION['session_login_status'] = 1;
			header('Location: /');
		} else {
			$_SESSION['session_login_status'] = 0;
			header('Location: /');

		}
	}

	// var_dump($res);
	// echo "</br>";
	// var_dump($row);
	

?>