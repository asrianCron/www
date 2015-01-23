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
        User: <input type="text" name="user[0][name]">
        Password: <input type="text" name="user[0][password]">
        <input type="submit">
    </form>

        <?php
        include "TestClass.php";
        session_start();
        $tst = new TestClass("cake");
        echo $tst->var;

        // $_SESSION['user'] = 'alpha';
        // $_SESSION['user'] = $_POST['user'];
        // $_SESSION['password'] = 'cake';


        ?>
        <a href="read.php">Read</a>
    </body>
</html>
 
