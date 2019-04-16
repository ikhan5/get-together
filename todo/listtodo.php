<?php 
require_once '../model/database.php';
require_once 'Todo.php';

$dbcon = Database::getDB();
$t = new Todo();
$tasks = $t->getAllTodo(1, Database::getDB());

echo "<table id='table'>";

foreach($tasks as $task){
    if($task->is_done)
{   
    echo "<td class='text' style='color:#05e5e5'>".$task->task."</td>";
    echo "<td><form action='updatetodo.php' method='post'>" .
    "<input type='hidden' value='$task->id' name='id' />".
    "<button type='submit' name='update' class='button-link'><i class='far fa-check-circle button-link'></i></button>".
    "</form></td>";
}else{
    echo "<td class='text'>".$task->task."</td>"; 
    echo "<td><form action='updatetodo.php' method='post'>" .
    "<input type='hidden' value='$task->id' name='id' />".
    "<button type='submit' name='update' class='button-link'><i class='far fa-circle button-link'></i></button>".
    "</form></td>";  
}
    echo "<td><form action='deletetodo.php' method='post'>" .
    "<input type='hidden' value='$task->id' name='id' />".
    "<button type='submit' name='delete' class='button-link delete'><i class='far fa-trash-alt'></i></button>".
    "</form></td></tr>";
}
    echo "</table>";
?>