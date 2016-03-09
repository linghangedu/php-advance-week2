<html>
<head>
    <title>Accessing Cookies with PHP</title>
</head>
<body>


<?php
if( isset($_COOKIE["name"]))
    echo "Welcome " . $_COOKIE["name"] . "<br />";
else
    echo "Sorry... Not recognized" . "<br />";
?>


<?php
echo $_COOKIE["name"]. "<br />";
/* is equivalent to */
echo $HTTP_COOKIE_VARS["name"]. "<br />";

echo $_COOKIE["age"] . "<br />";
/* is equivalent to */
echo $HTTP_COOKIE_VARS["name"] . "<br />";
?>


</body>
</html>