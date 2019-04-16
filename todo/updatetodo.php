<?php 
require_once '../model/database.php';
require_once 'Todo.php';

if(isset($_POST['update'])){
    $id = $_POST['id'];
    
    $dbcon = Database::getDB();
    $t = new Todo();
    $task = $t->getTodoById($id, $dbcon);
    $is_done = $task->is_done;

    if($is_done){ 
        $td = new Todo();
        $count = $td->updateTodo($id, 0, $dbcon);
    }else{
        $td = new Todo();
        $count = $td->updateTodo($id, 1, $dbcon);
    }

    
    if($count){
        header("Location: index.php");
    } else {
        echo  "Error updating";
    }
}
