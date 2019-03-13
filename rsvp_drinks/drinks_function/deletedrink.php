<?php 
require_once '../database/Database.php';
require_once 'Drink.php';

if(isset($_POST['delete'])){
    $id= $_POST['id'];
    $dbcon = Database::getDb();
    $d = new Drink();
    $count = $d->deleteDrink($id, $dbcon);

    if($count){
        header("Location: ../drinks_index.php");
    }
}

?>