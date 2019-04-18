<?php
/* Author: Maria Korolenko
 * Feature: Poll
 * Description: 
 * 
 * Date Created: April 5th, 2019
 * Last Modified: April 18th, 2019
 * Recent Changes: Refactored Code, Added comments
 */ 
require_once '../model/database.php';
require_once './model/Poll.php';

echo "<h3>Edit Poll</h3>";
if(isset($_POST['edit'])){
    $id = $_POST['id'];

    $db = Database::getDb();
    $p = new Poll();
    $poll = $p->getPollById($id, $db);
    var_dump($poll);
}

if(isset($_POST['editpoll'])){
    $id= $_POST['id'];
    $question = $_POST['poll_question'];
    $answer = $_POST['poll_answer'];

    $db = Database::getDb();
    $p = new Poll();
    $mydata = $p->editPoll($id, $question, $answer, $db);

    if($mydata){
        header("Location: listpolls.php");
    } else {
        echo  "Problem updating poll";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="../CSS/poll.css"/>
</head>


<form action="" method="post">
    <label for="poll_question">Question</label>
    <input type="text" name="poll_question" id="poll_question" /><br />
    <ul>
            
    </ul>
    <label for="poll_answer">Answer</label>
    <input type="text" name="poll_answer" id="poll_answer" /><br />
    <input type="submit" name="save" class='poll-btn' value="Edit Poll" />
</form>

