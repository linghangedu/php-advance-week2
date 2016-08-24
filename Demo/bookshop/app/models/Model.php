<?php

include_once( "app/models/Book.php" );
include_once( "app/models/User.php" );
include_once( "app/models/Order.php" );
include_once( "app/models/DBHelper.php" );

class Model
{
    /////////// BOOK /////////////
    public function getBookList()//被controller 里的invokeBook函数调用
    {
        // here goes some hardcoded values to simulate the database

        $db  = new DBHelper();
        $sql = "select * from Books";
        $res = $db->execute_sql( $sql );//在db里面执行sql语句
        $db->close_connect();

//var_dump($res);
// echo count($res);
        $number_of_books = count( $res );//计算执行sql语句之后的结果
        //echo $number_of_books;

        $books_array = Array();

        if ($number_of_books == 0) {//如果结果等于0，显示..，并退出
            echo "No data found";
            exit;
        }

        foreach ($res as $row) {//遍历执行sql语句后的结果，并按照$row格式排列
            $book = new Book(//book信息的排列格式
                $row['id'],
                $row['author'],
                $row['category'],
                $row['description'],
                $row['picture'],
                $row['price'],
                $row['rating'],
                $row['title']
            );

            array_push( $books_array, $book );//？？？
        }

        return $books_array;
    }

    public function getBook( $id )//
    {
        // we use the previous function to get all the books and then we return the requested one.
        // in a real life scenario this will be done through a db select command
        $allBooks = $this->getBookList();

        foreach ($allBooks as $book) {//遍历所有的的书，按照$book 方式排列
            if ($book->id == $id) {//如果id相符，则返回$book
                return $book;
            }
        }

        return false;//否则返回错误
    }

    public function addBook( $book )
    {
        $db  = new DBHelper();
        $sql = "insert into Books VALUES (NULL, '$book->title',
'$book->author', '$book->description', '$book->price', '$book->rating', '$book->picture', '$book->category')";
       // echo htmlspecialchars ( $sql );
        $res = $db->execute_sql( $sql );
        $db->close_connect();

        return true;
    }


    /////////// User /////////////
    public function getUserList()
    {
        // here goes some hardcoded values to simulate the database

        $db  = new DBHelper();
        $sql = "select * from Users";
        $res = $db->execute_sql( $sql );
        $db->close_connect();

//var_dump($res);
// echo count($res);
        $number_of_users = count( $res );
        //echo $number_of_books;

        $users_array = Array();

        if ($number_of_users == 0) {
            echo "No data found";
            exit;
        }

        foreach ($res as $row) {
            $user = new User(
                $row['id'],
                $row['username'],
                $row['password'],
                $row['first_name'],
                $row['last_name'],
                $row['email'],
                $row['status']
            );

            array_push( $users_array, $user );
        }

        return $users_array;
    }

    public function getUser( $username, $password )
    {
        $db  = new DBHelper();
        $sql = "select * from Users where username = '{$username}' AND password = '{$password}' LIMIT 1";
        $res = $db->execute_sql( $sql );
        $db->close_connect();

        if (empty( $res )) {
            return false;
        } else {
            $row  = $res[0];
            $user = new User(
                $row['id'],
                $row['username'],
                $row['password'],
                $row['first_name'],
                $row['last_name'],
                $row['email'],
                $row['status']
            );

            return $user;
        }
    }

    public function addUser( $user )
    {
        $db  = new DBHelper();
        $sql = "insert into Users VALUES (NULL, '$user->username',
'$user->password', '$user->firstName', '$user->lastName', '$user->email', '$user->status')";
        //echo htmlspecialchars ( $sql );
        $res = $db->execute_sql( $sql );
        $db->close_connect();

        return true;
    }

    public function checkUsernameAvailability( $username )
    {
        $db = new DBHelper();
        $sql
            = "SELECT username from users WHERE username = '{$username}' LIMIT 1";

        // echo htmlspecialchars ( $sql );
        $res = $db->execute_sql( $sql );
        $db->close_connect();
        if (count( $res ) == 1) {
            return "<p><b>Error:</b> Username already exists!</p>";
        } else {
            return false;
        }
    }


    /////////// Order /////////////
    public function getOrderList()
    {
        // here goes some hardcoded values to simulate the database

        $db  = new DBHelper();
        $sql = "select * from Orders";
        $res = $db->execute_sql( $sql );
        $db->close_connect();

//var_dump($res);
// echo count($res);
        $number_of_orders = count( $res );
        //echo $number_of_books;

        $orders_array = Array();

        if ($number_of_orders == 0) {
            echo "No data found";
            exit;
        }

        foreach ($res as $row) {
            $order = new Order(//变量order里面包含的参数和格式
                $row['id'],
                $row['user_id'],
                $row['book_id'],
                $row['qty'],
                $row['order_time']
            );

            array_push( $orders_array, $order );
        }

        return $orders_array;
    }

    public function getOrder( $id )
    {
        $db  = new DBHelper();
        $sql = "select * from Orders where id = '$id' limit 1";
        $res = $db->execute_sql( $sql );
        $db->close_connect();

        if (empty( $res )) {
            return false;
        } else {
            $row   = $res[0];
            $order = new Order(
                $row['id'],
                $row['user_id'],
                $row['book_id'],
                $row['qty'],
                $row['order_time']
            );

            return $order;
        }
    }

    public function addOrder( $order )
    {
        $db  = new DBHelper();
        $sql = "insert into Orders VALUES (NULL, '$order->userId',
'$order->bookId', '$order->qty', '$order->orderTime')";
        //echo htmlspecialchars ( $sql );
        $res = $db->execute_sql( $sql );
        $db->close_connect();

        return true;
    }
}


?>
