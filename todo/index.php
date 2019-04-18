<?php
$pagetitle = 'To-Do';
include($_SERVER['DOCUMENT_ROOT'].'/loggedin_header.php');
?>

<?php
    $event_id = $_GET['eid'];
?>
    
<section class="todo-container">
    <div class="todo-inputform">
        <h1 class="to-do-h-style-list">To-Do List</h1>
        <?php include 'addtodo.php';?>
        <?php include 'listtodo.php'; ?>
        
    </div>
</section>
