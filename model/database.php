<?php

class Database
{
    //properties
    private static $user = 'gettogthr';
    private static $pass = 'partytime';
    private static $db = 'get-together';
    private static $dsn = 'mysql:host=localhost;dbname=get-together';
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
                include 'customerror.php';
                exit();
            }
        }
        return self::$dbcon;
    }
}