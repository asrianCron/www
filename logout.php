<?php
	session_start();
	if($_SESSION['session_login_status']){
		$_SESSION = array();
		session_destroy();
	}
	header("Location: /");
?>