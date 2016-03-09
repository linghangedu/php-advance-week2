<?php
$age = $_POST['age'];
$email = $_POST['email'];
$slogan = $_POST['slogan'];
if ($age < 18){
    echo "You must be 18 or over to " ."enter the competition!";
    exit;
}
$entry = "Email address: ".$email."\n" ."Slogan: ".$slogan."\n";

mail("tinnnng@gmail.com", "Contact Entry", $entry);
echo "Your entry has been submitted. Good luck!";
?>