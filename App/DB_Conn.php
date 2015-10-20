<?php

//connection to a database
class DB_Conn {

    private static $host = "127.0.0.1";
    private static $db_name = "auto_baza";
    private static $username = "root";
    private static $password = "miro4471";
    private static $conn;

    static public function getConnection(){

        try{
            self::$conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db_name.';charset=UTF8', self::$username, self::$password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
        return self::$conn;
    }
}