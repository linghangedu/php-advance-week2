<?php
$myfile = "orders.txt";
if (!file_exists($myfile))
{
    echo "File does not exist";
    exit;
}

$orders = file($myfile);
$number_of_orders = count($orders);
if ($number_of_orders == 0)
{
    echo "<p><strong>No orders pending."
         ."Please try again later."
         ."</strong></p>";
}
for ($i=0; $i<$number_of_orders; $i++)
{
    $line = explode("\t",$orders[$i]);
    foreach($line as $value) {
        echo "$value <br>";
    }
    echo "##########################<br/>";
}

?>