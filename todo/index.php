<?php

$pagetitle = 'Create Event';
include($_SERVER['DOCUMENT_ROOT'].'/loggedin_header.php');
?>
<?php
    $event_id = $_GET['eid'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>To-Do List</title>
    <link rel="stylesheet" type="text/css" href="../CSS/todo.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
<section class="todo-container">
    <div class="todo-inputform">
        <h1 class="to-do-h-style-list">To-Do List</h1>
        <?php include 'addtodo.php';?>
        <?php include 'listtodo.php'; ?>
    </div>
</section>
</body>
</html>

