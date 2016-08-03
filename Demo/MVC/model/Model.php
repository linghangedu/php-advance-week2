<?php

include_once( "model/Book.php" );
include_once( "model/DBHelper.php" );

class Model
{
    public function getBookList()
    {
        // here goes some hardcoded values to simulate the database

        $db  = new DBHelper();
        $sql = "select * from Book";
        $res = $db->execute_sql( $sql );
        $db->close_connect();

        //var_dump($res);
        // echo count($res);
        $number_of_books = count( $res );
        //echo $number_of_books;

        $books_array = Array();

        if ($number_of_books == 0) {
            echo "No data found";
            exit;
        }

        foreach ($res as $row) {
            $book = new Book(
                $row['title'], $row['author'], $row['description']
                );

            array_push( $books_array, $book );
        }

        return $books_array;
    }

    public function getBook( $title )
    {
        // we use the previous function to get all the books and then we return the requested one.
        // in a real life scenario this will be done through a db select command
        $db  = new DBHelper();
        $sql = "select * from Book where `title` = '$title' limit 1";
        // echo htmlspecialchars ( $sql );
        $res = $db->execute_sql( $sql );
        $db->close_connect();

        $book = new Book($res[0]['title'], $res[0]['author'], $res[0]['description']);

        return $book;
    }

    public function addBook( $book )
    {
        $db  = new DBHelper();
        $sql = "insert into Book VALUES (NULL, '$book->title',
        '$book->author', '$book->description')";
        //echo htmlspecialchars ( $sql );
        $res = $db->execute_sql( $sql );
        $db->close_connect();

        return true;

    }
}


?>
