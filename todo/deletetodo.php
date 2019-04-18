<?php 
/* Author: Maria Korolenko
 * Feature: To-Do List
 * Description: When the 'Delete' icon is clicked on the index page form
 *              and it remove a to-do list from the 'to_dos' table based    
 *              on the row ID passed by the index form.    
 * Date Created: April 15th, 2019
 * Last Modified: April 17th, 2019
 * Recent Changes: Refactored Code, Added comments
 */
require_once '../model/database.php';
require_once 'Todo.php';

if(isset($_POST['delete'])){
    $event_id = $_GET['eid'];
    $id= $_POST['id'];

    $dbcon = Database::getDb();
    $t = new Todo();
    $count = $t->deleteTodo($id, $dbcon);

    if($count){
        header("Location: index.php?eid=$event_id");
    }
}

?>