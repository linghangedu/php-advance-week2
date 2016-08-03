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
    <title>User registration form</title>
</head>
<body>
<h1>User registration form</h1>

<!-- The HTML registration form -->
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    Username: <input type="text" name="username"/><br/>
    Password: <input type="password" name="password"/><br/>
    First name: <input type="text" name="first_name"/><br/>
    Last name: <input type="text" name="last_name"/><br/>
    Email: <input type="type" name="email"/><br/>

    <input type="submit" name="submit" value="Register"/>
    <a href="login.php">I already have an account</a>
</form>


<?php
if (isset( $_POST['submit'] )) {

    # prepare data for insertion
    $username = $_POST['username'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    # check if username and email exist else insert
    // u = username, e = email, ue = both username and email already exists
    $exists = "";

    $db  = new DBHelper();
    $sql1 = "SELECT username from Users2 WHERE username = '{$username}' LIMIT 1";
    $sql2 = "SELECT email from Users2 WHERE email = '{$email}' LIMIT 1";
    $res1 = $db->execute_sql( $sql1 );
    $res2 = $db->execute_sql( $sql2 );

    if (count($res1) == 1) {
        $exists .= "u";
    }
    if (count($res2) == 1) {
        $exists .= "e";
    }

    if ($exists == "u") {
        echo "<p><b>Error:</b> Username already exists!</p>";
    } else if ($exists == "e") {
        echo "<p><b>Error:</b> Email already exists!</p>";
    } else if ($exists == "ue") {
        echo "<p><b>Error:</b> Username and Email already exists!</p>";
    } else {
        # insert data into mysql database
        $sql3 = "INSERT  INTO `Users2` (`id`, `username`, `password`, `first_name`, `last_name`, `email`)
				VALUES (NULL, '{$username}', '{$password}', '{$first_name}', '{$last_name}', '{$email}')";
        //echo htmlspecialchars ( $sql3 );

        if ($db->execute_dml( $sql3 )) {
            redirect_to( "login.php?msg=Registred successfully" );
        } else {
            echo "<p>MySQL error</p>";
            exit();
        }
    }
    $db->close_connect();
}
?>
</body>
</html>
