<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Database {

    public static function DB_connect(){
        $conn = mysqli_connect("localhost", "root", "", "sample");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        //echo "Connected ";
        return $conn;
        
    }
    
}
Database::DB_connect();

?>