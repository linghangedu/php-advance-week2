<?php

class DBHelper//function 作用：连接数据库
{

    public $conn;
    public $dbname = "test";
    public $username = "root";
    public $password = "root";
    public $host = "localhost";

    public function __construct() //作用：连接数据库之后执行的动作
    {

        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->dbname);
                                    //函数里的参数是当前class里这些参数
        if (!$this->conn) {//如果当前class里的conn参数无法连接数据库，显示connect fail
            die("connect fail" . mysqli_error($this->conn));
        }
    }

    public function execute_sql($sql)// 作用： 把数据按照一定方法存放
    {

        $arr = array();//创建一个新数组
        $res = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
            //
        while ($row = mysqli_fetch_assoc($res)) {
            $arr[] = $row;
        }
        mysqli_free_result($res);
        return $arr;

    }

    public function close_connect()//如果$conn里不是空的，关闭这个数据库连接
    {

        if (!empty($this->conn)) {
            mysqli_close($this->conn);
        }
    }
}

?>
