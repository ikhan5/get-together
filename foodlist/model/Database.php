<?php 
class Database
{
     //__construct access modifier private and properties static
    private static $user = 'root';
    private static $pass = 'root';
    private static $db = 'food';
    private static $dsn = 'mysql:localhost;dbname=food';
    private static $dbcon;
    
    private function __construct()
    {

    }
    public static function getDB()
    {
        if (!isset(self::$dbcon)) {
            try {
                self::$dbcon = new PDO(self::$dsn,self::$user,self::$pass);
                self::$dbcon->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                $msg = $e->getMessage();
                include 'customerror.php';
                exit();
            }
        }
        return self::$dbcon;
    }
}