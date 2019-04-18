<?php

require_once '../model/database.php';
require_once 'Gallery.php';

$dbcon = Database::getDb();

if(isset($_POST["id"]))
{
    $old_name = get_old_image_name($dbcon, $_POST["id"]);
    $file_array = explode(".",$old_name);
    $file_extension = end($file_array);
    $new_name = $_POST["photo_name"].'.'.$file_extension;
    $query = '';
    if($old_name != $new_name)
    {
        $old_path = 'files/'.$old_name;
        $new_path = 'files/'.$new_name;
        if(rename($old_path, $new_path))
        {
            $query = "UPDATE gallery SET photo_name = '".$new_name."', title = '".$_POST["title"]."' 
            WHERE id = '".$_POST["id"]."' ";
        }
    }
    else
    {
        $query = "UPDATE gallery 
        SET title = '".$_POST["title"]."' 
        WHERE id = '".$_POST["id"]."' ";
    }
    $stmt = $dbcon->prepare($query);
    $stmt->execute();
}

function get_old_image_name($dbcon,$id)
{
    $query = "SELECT photo_name FROM gallery WHERE id = '".$id."' ";
    $stmt = $dbcon->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll();
    foreach($result as $row)
    {
        return $row['photo_name'];
    }
}

?>