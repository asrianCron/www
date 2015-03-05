<?php
	session_start();
	include "config/db.php";
    include "utils.php";
    $table_name = "users";
    $username = $_POST['register']['username'];
    $password = $_POST['register']['password'];
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if($mysqli->connect_errno) {
        printf("FAILED TO CONNECT TO MYSQL: %s", $mysqli->connect_error);
    }
    if($prep = $mysqli->prepare("SELECT username, password FROM " . DB_USERS_TABLE. " WHERE BINARY username=?")){
        $prep->bind_param("s", $mysqli->real_escape_string($username));
        $prep->execute();
        if(!$prep->fetch()){
            $encoded_password = encode($username, $password);
            if($insert_prep = $mysqli->prepare("INSERT INTO users(id, username, password) VALUES (NULL, ?, ?)")){
                $crypted_pass = encode($username, $password);

                $insert_prep->bind_param("ss", $mysqli->real_escape_string($username), $mysqli->real_escape_string($crypted_pass));
                if($insert_prep->execute()){
                    printf("USER ADDED TO DATABASE\n <a href='/'>HOME</a>");
                }else{
                    printf("ERROR ADDING USER TO DATABASE\n <a href='/'>HOME</a>");
                }
            } else {
                printf("UNABLE TO PREPARE QUERY\n");
            }

        }else{
            printf("USERNAME ALREADY TAKEN\n");
        }

        $prep->close();
    }

    $mysqli->close();
?>
