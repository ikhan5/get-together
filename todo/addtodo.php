<?php

require_once '../model/database.php';
require_once 'Todo.php';

if (isset($_POST['addtodo'])){
    $event_id = $_GET['id'];
    $task = $_POST['task'];
    $is_done = 0;

    $db = Database::getDB();
    $t = new Todo();
    $task= $t->insertTodo($event_id, $task, $is_done, $db);


}
?>

<form action="" method="post" style="margin-bottom: 10px;">
    <button type='submit' name='addtodo' class='button-link'><i class="fas fa-plus plus"></i></button>
    <input type="text" name="task" />
</form>

