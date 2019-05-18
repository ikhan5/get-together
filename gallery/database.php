<?php

class Database
{
    //properties
    //private static $user = 'gettogthr';
    //private static $pass = 'partytime';
    //private static $dsn = 'mysql:host=localhost;dbname=gettogether';
    //private static $dbcon;

    private static $user = 'root';
    private static $pass = 'root';
    private static $db = 'techenth_gettogether';
    private static $dsn = 'mysql:host=localhost;dbname=techenth_gettogether';
    private static $dbcon;

    private function __construct()
    {
    }

    //get pdo connection
    public static function getDb(){
        if(!isset(self::$dbcon)) {
            try {
                self::$dbcon = new PDO(self::$dsn, self::$user, self::$pass);
                self::$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                $msg = $e->getMessage();
                echo($msg);
                // include 'customerror.php';
                exit();
            }
        }
        return self::$dbcon;
    }
}