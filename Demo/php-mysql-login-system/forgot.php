<?php
session_start();
require_once( "functions.php" );
require_once( "DBHelper.php" );

if (logged_in() == true) {
    redirect_to( "profile.php" );
}
?>
<html>
<head>
    <title>Forgot your Username or Password?</title>
</head>
<body>
<h1>Forgot your Username or Password?</h1>

<p>Please enter your email address below.</p>

<form action="forgot.php" method="post">
    Email: <input type="text" name="email"/>
    <input type="submit" name="submit" value="Submit"/>
</form>
<?php

if (isset( $_POST['submit'] )) {
    $db = new DBHelper();
    $sql
         = "SELECT email FROM Users2 WHERE email LIKE '{$_POST['email']}' LIMIT 1";
    $res = $db->execute_sql( $sql );

## query database
# fetch data from mysql database


    if (count( $res ) != 1) {
        echo "<p><b>Error:</b> Email address is not found</p>";
    } else {
        // email login to the user's email
        //TODO use phpMailer
        echo "<p>Login credentials has been sent to <b>{$_POST['email']}</b></p>";
    }
}
?>
<a href="login.php">Login</a> | <a href="register.php">Register</a>

</body>
</html>
