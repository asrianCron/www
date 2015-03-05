<?php
	session_start();
	include "config/db.php";
	include "utils.php";
	$username = $_POST['user']['username'];
	$password = $_POST['user']['password'];

	$_SESSION['username'] = $_POST['user']['username'];
	$_SESSION['password'] = $_POST['user']['password'];

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if($mysqli->connect_errno) {
		echo "FAILED TO CONNECT TO MYSQL: " . $mysqli->connect_error;
	}

    if($prep = $mysqli->prepare("SELECT username, password FROM " . DB_USERS_TABLE. " WHERE BINARY username=?")){
	    $prep->bind_param("s", $mysqli->real_escape_string($username)); // it'll probably work without using real_escape_string(), TODO: look into that
	    $prep->execute();
	    $prep->bind_result($usrn, $psswrd);
	    if($prep->fetch()){
	    	if($psswrd === encode($username, $password)){
	    		$_SESSION['session_login_status'] = 1;
	    		header('Location: /');
	    	} else {
	    		$_SESSION['session_login_status'] = 0;
	    		header('Location: /');
	    	}
	    } else {
		    header('Location: /');

	    }
	} else {
		printf("FAILED TO PREPARE QUERY");
	}

?>