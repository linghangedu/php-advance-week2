<html>
<head>
    <title>Results</title>
</head>
<body>
<?php

$heightincm = $_POST['heightincm'];
echo "Metric height is " . $heightincm . " centimetres<br/>";

$heightininches = $heightincm / 2.54;
 $feet          = floor( $heightininches / 12 );
 $inches        = $heightininches % 12;

echo "Imperial height is " . $feet . " feet and " . $inches . " inches";
?>
</body>
</html>