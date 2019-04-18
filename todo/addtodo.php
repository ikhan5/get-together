<?php
/* Author: Maria Korolenko
 * Feature: To-Do List
 * Description: When the input is field and '+' is clicked 
 *              user see new added to-do list to the form.
 * Date Created: April 15th, 2019
 * Last Modified: April 17th, 2019
 * Recent Changes: Refactored Code, Added comments
 */
require_once '../model/database.php';
require_once 'Todo.php';

if (isset($_POST['addtodo'])){
    $event_id = $_GET['eid'];
    $task = $_POST['task'];
    $is_done = 0;

    $db = Database::getDB();
    $t = new Todo();
    $task= $t->insertTodo($event_id, $task, $is_done, $db);
}
?>

<form action="" method="post" style="margin-bottom: 10px;">
    <button type='submit' name='addtodo' class='todo-button-link'><i class="fas fa-plus plus"></i></button>
    <input class="poll-input" type="text" name="task" />
</form>
