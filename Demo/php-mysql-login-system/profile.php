<?php 
require_once( "functions.php" );
require_once( "DBHelper.php" );
session_start();
?>
<html>
<head>
	<title>User Profile</title>
</head>
<body>
<h1>User Profile</h1>

<?php
if (logged_in() == false) {
	redirect_to("login.php");
} else {
	if (isset($_GET['id']) && $_GET['id'] != "") {
		$id = $_GET['id'];
	} else {
		$id = $_SESSION['user_id'];
	}

    $db  = new DBHelper();
    $sql = "SELECT * FROM Users2 WHERE id = {$id} LIMIT 1";
    $res = $db->execute_sql( $sql );
    //echo htmlspecialchars ( $sql );
    $db->close_connect();

		if (count($res) != 1) {

			echo "<p>MySQL error</p>";
			exit();
		} else {
			# calculating online status
			if (time() - $res[0]['status'] <= (30)) { // 300 seconds = 5 minutes timeout
				$status = "Online";
			} else {
				$status = "Offline";
			}
			
			# echo the user profile data
			echo "<p>User ID: {$res[0]['id']}</p>";
			echo "<p>Username: {$res[0]['username']}</p>";
			echo "<p>Status: {$status}</p>";			
		}
}

// showing the login & register or logout link
if (logged_in() == true) {
	echo '<a href="logout.php">Log Out</a>';
} else {
	echo '<a href="login.php">Login</a> | <a href="register.php">Register</a>';
}
?>

</body>
</html>
