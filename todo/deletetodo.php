<?php 

require_once '../model/database.php';
require_once 'Todo.php';


if(isset($_POST['delete'])){
    $id= $_POST['id'];
    $dbcon = Database::getDb();
    $t = new Todo();
    $count = $t->deleteTodo($id, $dbcon);

    if($count){
        header("Location: index.php");
    }
}

?>