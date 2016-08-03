<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$q =  $_REQUEST["q"];

$con = mysqli_connect('localhost','root','root', 'test');

if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"test");
$sql="SELECT * FROM Users2 WHERE username = '$q' limit 1";
      //  echo htmlspecialchars ( $sql );

$result = mysqli_query($con,$sql);
$user = mysqli_fetch_array($result);
if (empty($user)) {
    echo "ok";
} else{
    echo "username is been registered!";
}

mysqli_close($con);
?>
</body>
</html>
