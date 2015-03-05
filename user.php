<?php

class User{

	public $username = null;
	public $encrypted_password = null;
	public $logged_in = null;

	public function __construct(){
		$this->$username = "";
		$this->$encrypted_password = "";
		$this->$logged_in = 0;
	}
	// public function __construct($username, $encrypted_password){
	// 	$this->$username = $username;
	// 	$this->$encrypted_password = $encrypted_password;
	// 	$this->$logged_in = 0;
	// }
	public function set_logged_in($arg){
		$this->$logged_in = $arg;
	}
	public function is_logged_in(){
		return $logged_in;
	}
	public function set_username($arg){
		$this->$username = $arg;
	}
	public function get_username(){
		return $this->$username;
	}
	public function set_encrypted_password($arg){
		$this->$encrypted_password = $arg;
	}
	public function get_encrypted_password(){
		return $this->$encrypted_password;
	}
}

?>