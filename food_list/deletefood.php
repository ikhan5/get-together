<?php 
require_once './model/Database.php';
require_once './model/Food.php';

if(isset($_POST['delete'])){
    $idn= $_POST['id'];
    $dbcon = Database::getDb();
    $f = new Food();
    $count = $f->deleteFood($id, $dbcon);

    if($count){
        header("Location: ../foodindex.php");
    }
}

?>