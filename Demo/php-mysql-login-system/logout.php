<?php
require_once( "functions.php" );
require_once( "DBHelper.php" );
session_start();

$db = new DBHelper();
$sql = "SELECT status from Users2 WHERE id={$_SESSION['user_id']}";
$res = $db->execute_sql( $sql );
//echo htmlspecialchars ( $sql );


// update status to offline

$timestamp = $res[0]['status'] - 300;
$sql2 = "UPDATE Users2 SET status={$timestamp} WHERE id={$_SESSION['user_id']}";
$db->execute_dml( $sql2 );
$db->close_connect();
## finally destroying the session
// unset all session variables
$_SESSION = array();
// destroy the session cookie
if (isset( $_COOKIE[session_name()] )) {
    setcookie( session_name(), '', time() - 50000, '/' );
}
// destroy the session
session_destroy();

redirect_to( "login.php" );
?>
