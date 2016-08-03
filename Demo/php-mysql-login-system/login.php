<?php
	session_start();

	require_once( "functions.php" );
	require_once( "DBHelper.php" );
	if (logged_in() == true) {
		redirect_to("profile.php");
	}
?>
<html>
<head>
	<title>User Login Form</title>
</head>
<body>
<h1>User Login Form</h1>

<!-- The HTML login form -->
	<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
		Username: <input type="text" name="username" /><br />
		Password: <input type="password" name="password" /><br />
		Remember me: <input type="checkbox" name="remember" /><br />

		<input type="submit" name="submit" value="Login" />
		<a href="forgot.php">Forgot Password?</a>
		<a href="register.php">Register</a>
	</form>
<?php
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	// processing remember me option and setting cookie with long expiry date
	if (isset($_POST['remember'])) {
		session_set_cookie_params('604800'); //one week (value in seconds)
		session_regenerate_id(true);
	}


    $db  = new DBHelper();
    $sql = "SELECT * from Users2 WHERE username LIKE '{$username}' AND password LIKE '{$password}' LIMIT 1";
    $res = $db->execute_sql( $sql );


	if (count($res) != 1) {
		echo "<p><b>Error:</b> Invalid username/password combination</p>";
	} else {
        //print_r($res);
		// Authenticated, set session variables
		$_SESSION['user_id'] = $res[0]['id'];
		$_SESSION['username'] = $res[0]['username'];

		// update status to online
		$timestamp = time();
		$sql2 = "UPDATE Users2 SET status={$timestamp} WHERE id={$_SESSION['user_id']}";
        $db->execute_dml( $sql2 );

		redirect_to("profile.php?id={$_SESSION['user_id']}");

	}
    $db->close_connect();
}

if(isset($_GET['msg'])) {
	echo "<p style='color:red;'>".$_GET['msg']."</p>";
}
?>

</body>
</html>
