<?php

$age = $_POST['age'];
$email = $_POST['email'];
$name = $_POST['name'];


//$age = empty($_POST['age'])? "" : $_POST['age'];



if ($age < 18) {

    echo "You must be 18 or over";

    exit();
}

if ($age == 100){
    echo "<script>window.location = 'index.php'</script>";
}

$message ="Hello, $name! <br> Your Email is: $email <br> Your age is: $age";

echo $message;

mail("tinnnng@gmail.com", "test from phpstorm", $message);

?>


