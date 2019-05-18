<?php


require_once '../model/database.php';
require_once 'Gallery.php';

if(isset($_POST["id"]))
{
    $id= $_POST['id'];
    $eid = $_GET['eid'];
    $dbcon = Database::getDb();
    $p = new Gallery();
    $count = $p->deletePhoto($id, $dbcon,$eid);

    if($count){
        header('location: index.php?eid='.$eid);
    }
}

?>