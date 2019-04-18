<?php
/* Author: Maria Korolenko
 * Feature: To-Do List
 * Description: When the 'Edit/Done' icon is clicked on the index 
 *              page form the to-do row text change color to blue 
 *              and icon shows "done" mark.  
 * Date Created: April 15th, 2019
 * Last Modified: April 17th, 2019
 * Recent Changes: Refactored Code, Added comments
 */ 
require_once '../model/database.php';
require_once 'Todo.php';

if(isset($_POST['update'])){
    $event_id = $_GET['eid'];
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
        header("Location: index.php?eid=$event_id");
    } else {
        echo  "Error updating";
    }
}
