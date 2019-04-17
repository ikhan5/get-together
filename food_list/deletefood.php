<?php 
require_once '../model/database.php';
require_once './model/Food.php';

if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $event_id = $_GET['eid'];
    $dbcon = Database::getDb();
    $f = new Food();
    $count = $f->deleteFood($id, $dbcon);

    if($count){
        header('location: foodindex.php?eid='.$event_id);
    }
}

?>