<?php
	session_start();
	include "config/db.php";
    $table_name = "users";
    $username = $_POST['register']['name'];
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if($mysqli->connect_errno) {
        echo "FAILED TO CONNECT TO MYSQL: " . $mysqli->connect_error;
    }
    // $query = "SELECT " . $username . " FROM " . $table_name;
    $query = "SELECT username, password FROM " . DB_USERS_TABLE. " WHERE BINARY username='" . $username."'";

    $res = $mysqli->query($query);
    $row = 0;
    if($res){
        $row = $res->fetch_assoc();
        if(!$row){
            $query = "INSERT INTO users(id, username, password) VALUES (NULL, '" . $_POST['register']['name'] . "', '" . $_POST['register']['password'] . "')";
            if($mysqli->query($query) === TRUE){
                echo "USER ADDED TO DATABASE";
                echo "</br>";
                echo "<a href='/'> HOME</a>";
            } else {
                echo "ERROR ADDING USER TO DATABASE";
                echo "</br>";
                echo "<a href='/'> HOME</a>";
            }

        } else{
            echo "USERNAME ALREADY TAKEN";
        }
    }


?>
