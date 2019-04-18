<?php

require_once '../model/database.php';
require_once 'Gallery.php';

$dbcon = Database::getDb();

if(count($_FILES["file"]["name"]) > 0 )
{
    for($count=0; $count<count($_FILES["file"]["name"]); $count++)
    {
        $file_name = $_FILES["file"]["name"][$count];
        $tmp_name = $_FILES["file"]["tmp_name"][$count];
        $file_array = explode(".", $file_name);
        $file_extension = end($file_array);
        if(file_already_uploaded($file_name,$dbcon))
        {
          $file_name = $file_array[0].'-'.rand(). '.' .$file_extension;
        }
        $location = 'files/' .$file_name;
        if(move_uploaded_file($tmp_name, $location))
        {
            $query = "INSERT INTO gallery (title,photo_name)
            VALUES ('','".$file_name."')
            ";

            $stmt = $dbcon->prepare($query);
            $stmt->execute();
        }
    }
}

function file_already_uploaded($file_name,$dbcon)
{
    $query = "SELECT * FROM gallery where photo_name ='".$file_name."'";
    $stmt = $dbcon->prepare($query);
    $stmt->execute();
    $number_of_rows = $stmt->rowCount();
    if($number_of_rows > 0)
    {
        return true;
    }
    else
    {
        return false;
    }
}


?>