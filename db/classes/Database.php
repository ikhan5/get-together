<?php

class Database {
    
 
    public static function connect()
    {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=Get_Together", 'root', 'root');

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        } catch(PDOException $e) 
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
