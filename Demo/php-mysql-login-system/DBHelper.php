<?php

class DBHelper
{

    public $conn;
    public $dbname = "test";
    public $username = "root";
    public $password = "root";
    public $host = "localhost";

    public function __construct()
    {

        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->dbname);
        if (!$this->conn) {
            die("connect fail" . mysqli_error($this->conn));
        }
    }

    public function execute_sql($sql)
    {

        $arr = array();
        $res = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));

        while ($row = mysqli_fetch_assoc($res)) {
            $arr[] = $row;
        }
        mysqli_free_result($res);
        return $arr;

    }

    public function execute_dml($sql)
    {

        $b = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        if (!$b) {
            return false; //fail
        } else {
            if (mysqli_affected_rows($this->conn) > 0) {
                return 1; //ok
            } else {
                return true; //none
            }
        }

    }

    public function close_connect()
    {

        if (!empty($this->conn)) {
            mysqli_close($this->conn);
        }
    }
}

?>

