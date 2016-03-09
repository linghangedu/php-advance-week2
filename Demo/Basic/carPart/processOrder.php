<?php

$tyreqty  = $_POST['tyreqty'];
$oilqty   = $_POST['oilqty'];
$sparkqty = $_POST['sparkqty'];
$address  = $_POST['address'];

define ( "TYREPRICE", 100 );
define ( "OILPRICE", 10 );
define ( "SPARKPRICE", 4 );

$totalqty = 0;
$totalqty += $tyreqty;
$totalqty += $oilqty;
$totalqty += $sparkqty;

$totalmount = 0.00;

$date = date( "H:i, jS F" );
echo "<p> Order processed at ";
echo $date;
echo "<br>";

echo "<p> Your order is as follows: ";
echo "<br>";
if ($totalqty == 0) {
    echo "You did not order anything on the
  previous page:<br>";
} else {
    if ($tyreqty > 0) {
        echo $tyreqty . " tires<br>";
    }
    if ($oilqty > 0) {
        echo $oilqty . " bottles of oil<br>";
    }
    if ($sparkqty > 0) {
        echo $sparkqty . " spark plugs<br>";
    }
}

$total = $tyreqty * TYREPRICE +
         $oilqty * OILPRICE +
         $sparkqty * SPARKPRICE;

$total = number_format( $total, 2, ".", "" );

echo "<p>Total of order is " .
     $total . "</p>";
echo "<p> Address to ship to is " .
     $address . "<br>";

/////// write to a file /////////

$outputstring = $date."\t"
                .$tyreqty." tyres \t"
                .$oilqty." oil\t"
                .$sparkqty." spark plugs\t"
                ."\$" .$total
                ."\t". $address
                ."\n";

$fp = fopen("orders.txt", "a");

if($fp != false) {
    fwrite($fp, $outputstring);
    fclose($fp);
} else {
    echo "order cannot be written";
}


?>

<p>You can view orders <a href="orders.php">here</a></p>