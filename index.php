<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Init</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/main.css">
        <script src="js/main.js"></script>
    </head>
    <body>

    <form action="login.php" method="post">
        User: <input type="text" name="user[username]">
        Password: <input type="text" name="user[password]">
        <input type="submit">
    </form>
    <a href="register.php">Register</a>
    
    <form action="logout.php">
        <input type="submit" value="Logout">
    </form>

    <form action="test.php" method="post">
        String: <input type="text" name="test_string">
        <input type="submit" value="Test">
    </form>

        <?php
        session_start();

        if(isset($_SESSION['session_login_status']) && $_SESSION['session_login_status']){
            printf("LOGIN SUCCESSFUL");
        } else {
            printf("NOT YET LOGGED IN");
        }

        ?>
        <!-- <a href="read.php">Read</a> -->
    </body>
</html>
 
