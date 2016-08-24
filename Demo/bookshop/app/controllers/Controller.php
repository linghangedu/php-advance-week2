<?php
include_once("app/models/Model.php");

class Controller {
	public $model;

	public function __construct()
    {
        $this->model = new Model();

    }

	public function invokeBook()
	{
		if (!isset($_GET['book']))//判断变量是否已经设置，返回类型boolean
		{
			// no special book is requested, we'll show a list of all available books
			$books = $this->model->getBookList();//如果没有设置，则执行当前class里model里的函数
			include 'app/views/booklist.php';//并且加载这个booklist view
		}
		else
		{
			// show the requested book
			$book = $this->model->getBook($_GET['book']);//如果已经设置了
			include 'app/views/bookDetails.php';//则加载book details 的view
		}
	}

    public function addBook( $title, $author, $description )//函数addbook里有三个参数
    {

        $book = new Book( $title, $author, $description );//新函数book里也有三个参数

        return $this->model->addBook( $book );//返回当前函数里的book参数
    }

   public function addUser( $username, $password, $email, $firstName, $lastName )//函数adduser
    {
if ( $this->model->checkUsernameAvailability( $username ) != false) {//如果username已经存在，返回重复
    return "duplicated";

        }//并且创建一个new user
        $user = new User( null, $username, $password,  $firstName, $lastName, $email, 0 );
        return $this->model->addUser( $user );//并且返回当前函数里的user参数
        //问题：为什么创建new user 之后需要返回一个值？
    }

  public function login( $username, $password )//函数login里有两个参数，
  {
      return $this->model->getUser( trim($username), $password );//调用函数之后得到一个返回值

    }


    	public function invokeContact()//函数作用：记载view contact
	{
			// $books = $this->model->getBookList();
			include 'app/views/contact.php';
    }

        	public function invokeAbout()
	{
			// $books = $this->model->getBookList();
			include 'app/views/about.php';
    }
  	public function invokeSignIn()
	{
			// $books = $this->model->getBookList();
			include 'app/views/signIn.php';
    }

        	public function invokeSignUp()
	{
			// $books = $this->model->getBookList();
			include 'app/views/signUp.php';
    }
}

?>
