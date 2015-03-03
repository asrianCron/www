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
        User: <input type="text" name="user[name]">
        Password: <input type="text" name="user[password]">
        <input type="submit">
    </form>
    <a href="register.php">Register</a>
    
    <form action="logout.php">
        <input type="submit" value="Logout">
    </form>

        <?php
        // include "TestClass.php";
        session_start();
        // $tst = new TestClass("cake");
        // echo $tst->var;

        // $_SESSION['user'] = 'alpha';
        // $_SESSION['user'] = $_POST['user'];
        // $_SESSION['password'] = 'cake';

        if(isset($_SESSION['session_login_status']) && $_SESSION['session_login_status']){
            echo "LOGIN SUCCESSFUL";
        } else {
            echo "NOT YET LOGGED IN";
        }

        ?>
        <!-- <a href="read.php">Read</a> -->
    </body>
</html>
 
