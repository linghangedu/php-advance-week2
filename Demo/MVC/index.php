<?php
include_once( "controller/Controller.php" );

$controller = new Controller();
$controller->invoke();//直接跳到invoke function里面


if ($_GET['op'] == "add") {//index条件
    include( "view/addBook.php" );
    if ( ! empty( $_POST['title'] ) || ! empty( $_POST['author'] )
         || ! empty( $_POST['description'] )
    ) {
        //echo $_POST['title'];
        if ($controller->addBook(
            $_POST['title'],
                $_POST['author'],
            $_POST['description']
        )) {
            echo "<script>window.location='index.php'</script>";
        }
    }
}
?>