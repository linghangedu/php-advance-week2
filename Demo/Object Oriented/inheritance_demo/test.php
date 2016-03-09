<?php

include "Models.php";

// utility functions

function print_vars($obj)
{
    foreach (get_object_vars($obj) as $prop => $val) {
        echo "\t$prop = $val<br>";
    }
}

function print_methods($obj)
{
    $arr = get_class_methods(get_class($obj));
    foreach ($arr as $method) {
        echo "\tfunction $method()<br>";
    }
}

// instantiate 2 objects

$veggie = new Vegetable(true, "blue");
$leafy = new Spinach();

// print out information about objects
echo "veggie: CLASS " . get_class($veggie) . "<br>";
echo "leafy: CLASS " . get_class($leafy);
echo ", PARENT " . get_parent_class($leafy) . "<br>";

// show veggie properties and methods
echo "<br>veggie: Properties<br>";
print_vars($veggie);
echo "<br>veggie: Methods<br>";
print_methods($veggie);

// and leafy properties and methods
echo "<br>leafy: Properties<br>";
print_vars($leafy);
echo "<br>leafy: Methods<br>";
print_methods($leafy);
?>