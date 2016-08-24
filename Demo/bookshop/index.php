<?php
include_once( "app/controllers/Controller.php" );
	session_start();

$controller = new Controller();
$controller->invokeBook();//调用controller里的invokebook函数

if ($_GET['op'] == "login") {//如果后缀有 op， 说明已经login

    $username = empty($_POST['username'])? "" : $_POST['username'];
    $password = empty($_POST['password'])? "" : $_POST['password'];
    //echo $_POST['title'];
    $user = $controller->login($username, $password);
    if ($user != false) {
		$_SESSION['user_id'] = $user->id;
        
		$_SESSION['username'] = $user->username;

        if ($user->username == "admin") {//如果username=admin， 就打印admin页面
            echo "<script>window.location='admin/data.php'</script>";
        } else {//如果不是admin，就打印index登陆页面
            echo "<script>window.location='index.php'</script>";
        }
    } else{
            echo "<script>window.location='index.php?msg=loginFail'</script>";
    }

}

?>
