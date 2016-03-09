<?php
$filename = "./files/tmp2.txt";
$file = fopen( $filename, "w" );
if( $file == false )
{
    echo ( "Error in opening new file" );
    exit();
}
fwrite( $file, "This is  a simple test\n" );
fclose( $file );
?>

<html>
<head>
    <title>Writing a file using PHP</title>
</head>
<body>

<?php
if( $file != false )
{
    $fileSize = filesize( $filename );
    $msg = "File  created with name $filename ";
    $msg .= "containing $fileSize bytes";
    echo $msg;
}
else
{
    echo ("File $filename does not exit" );
}


?>
</body>
</html>