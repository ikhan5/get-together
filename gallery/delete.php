<?php


require_once 'database.php';
require_once 'Gallery.php';

if(isset($_POST["id"]))
{
    $file_path = 'files/' . $_POST["photo_name"];
    if(unlink($file_path))
    {   
        $id= $_POST['id'];
        $dbcon = Database::getDb();
        $p = new Gallery();
        $count = $p->deletePhoto($id, $dbcon);
    }
}

?>