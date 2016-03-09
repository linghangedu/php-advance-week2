<?php
/* Defining a PHP Function */
function writeMessage()
{
    echo "You are really a nice person, Have a nice time!";
}
/* Calling a PHP Function */
writeMessage();
?>


<?php
function addFunction($num1, $num2)
{
    $sum = $num1 + $num2;
    echo "Sum of the two numbers is : $sum";
}
addFunction(10, 20);
?>



<?php
function addFunction($num1, $num2)
{
    $sum = $num1 + $num2;
    return $sum;
}
$return_value = addFunction(10, 20);
echo "Returned value from the function : $return_value";
?>



<?php
//////////// Passing Arguments //////////
function addFive($num)
{
    $num += 5;
}

function addSix(&$num) \\note the different here
{
    $num += 6;
}
$orignum = 10;
addFive( $orignum );
echo "Original Value is $orignum\n";
addSix( $orignum );
echo "Original Value is $orignum\n";
?>


<?php
//////////// default value //////////

function printMe($param = NULL)
{
    print $param;
}
printMe("This is test");
printMe();
?>

<?php
//////////// dynamic function //////////

function sayHello()
{
    echo "Hello<br />";
}
$function_holder = "sayHello";
$function_holder();
?>

