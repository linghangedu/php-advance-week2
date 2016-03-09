<?php
if (preg_match( "/PHP/", "I love PHP" )) {
    echo "Match found";
} else {
    echo "No match";
}
?>


<?php
$email = "someone@somewhere.edu.au";

$pattern = '/^[a-zA-Z0-9_\.]+@[a-zA-Z0-9\-\.]+$/';

if (preg_match( $pattern, $email )) {
    echo '<h2 style="color:green;">Email address is well-formed</h2>';
} else {
    echo '<h2 style="color:red;">Not a valid email address</h2>';
}
?>

<?php
$copy_date = "Copyright 1999";
$copy_date = preg_replace("([0-9]+)", "2000", $copy_date);
echo $copy_date;
echo "<br>";
?>

<?php

$ip = "123.456.789.000"; // some IP address
$iparr = preg_split ("/\./", $ip);
print "$iparr[0] <br />";
print "$iparr[1] <br />" ;
print "$iparr[2] <br />"  ;
print "$iparr[3] <br />"  ;

?>


<?php

$foods = array("pasta", "steak", "fish", "potatoes");
// find elements beginning with "p", followed by one or more letters.
$p_foods = preg_grep("/p(\w+)/", $foods);

print_r($p_foods);
echo "<br>";


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
} else {
    echo "Well-formed email format";
}

//Email addr must have 2-4 letter for generic top-level domain name.
$emailRegEx = '/^[A-Z0-9\._%+-]+@[A-Z0-9\.-]+\.[A-Z]{2,4}$/i';
//Password must have at least 4 characters, and there must be at least 1 character and 1 number
$pwdRegEX = '/^(?=.*\d)(?=.*[A-Za-z]).{4,}$/';

?>