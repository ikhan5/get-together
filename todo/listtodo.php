<?php 
/* Author: Maria Korolenko
 * Feature: To-Do List
 * Description: Shows inside the form with the list 
 *              of To-Dos that user created on index page.          
 * Date Created: April 15th, 2019
 * Last Modified: April 17th, 2019
 * Recent Changes: Refactored Code, Added comments
 */
require_once '../model/database.php';
require_once 'Todo.php';

$dbcon = Database::getDB();
$t = new Todo();
$event_id = $_GET['eid'];
$tasks = $t->getAllTodo($event_id, Database::getDB());

echo "<table id='todo-table'>";

foreach($tasks as $task){
    if($task->is_done)
{   
    echo "<td class='todo-text' style='color:#05e5e5'>".$task->task."</td>";
    echo "<td><form action='updatetodo.php?eid=$event_id' method='post'>" .
    "<input class='poll-input' type='hidden' value='$task->id' name='id' />".
    "<button type='submit' name='update' class='todo-button-link'><i class='far fa-check-circle todo-button-link'></i></button>".
    "</form></td>";
}else{
    echo "<td class='todo-text'>".$task->task."</td>"; 
    echo "<td><form action='updatetodo.php?eid=$event_id' method='post'>" .
    "<input class='poll-input' type='hidden' value='$task->id' name='id' />".
    "<button type='submit' name='update' class='todo-button-link'><i class='far fa-circle todo-button-link'></i></button>".
    "</form></td>";  
}
    echo "<td><form action='deletetodo.php?eid=$event_id' method='post'>" .
    "<input class='poll-input' type='hidden' value='$task->id' name='id' />".
    "<button type='submit' name='delete' class='todo-button-link todo-delete'><i class='far fa-trash-alt'></i></button>".
    "</form></td></tr>";
}
    echo "</todo-table>";
?>
