<?php

class Database
{
    //properties
    private static $user = 'root';
    private static $pass = 'root';
    private static $db = 'poll_system';
    private static $dsn = 'mysql:host=localhost; dbname=poll_system';
    private static $dbcon;

    private function __construct()
    { 

    }
    
    //get pdo connection
    public static function getDb(){
        if(!isset(self::$dbcon)){
            try { 
                self::$dbcon = new PDO(self::$dsn, self::$user, self::$pass);
                self::$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $err){
                $msg = $err->getMessage();
                include 'customerror.php';
                exit();
            }
        }
        
        return self::$dbcon;
    } 
} 
