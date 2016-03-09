<?php


$tyreqty  = $_POST['tyreqty'];
$oilqty   = $_POST['oilqty'];
$sparkqty = $_POST['sparkqty'];
$address  = $_POST['address'];

define ( "TYREPRICE", 100.2 );
define ( "OILPRICE", 10.45 );
define ( "SPARKPRICE", 4 );


$totalAmount = 0.00;

date_default_timezone_set('Australia/Sydney');
$date = date("Y-m-d H:i:s");

//echo $date;

$totalAmount = $tyreqty * TYREPRICE + $oilqty * OILPRICE + $sparkqty * SPARKPRICE;

//echo $totalAmount;


echo "You order summary<br>";

if ($tyreqty > 0) {
    echo $tyreqty . " tyres<br>";
}
if ($oilqty > 0) {
    echo $oilqty . " oil<br>";
}
if ($sparkqty > 0) {
    echo $sparkqty . " spark plugs<br>";
}

echo "total amount: " . $totalAmount . "<br>";

echo "your address: " . $address;