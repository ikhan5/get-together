<?php
$pagetitle = 'Poll';
include($_SERVER['DOCUMENT_ROOT'].'/loggedin_header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Create a poll</title>
    <link rel="stylesheet" type="text/css" href="../CSS/poll.css"/>
</head>
<body>
    <div class="poll-container">
    <div class="poll-inputform">
    <h2 class="poll-heading-style">Add Poll Question</h2> 
    <?php include 'addquestion.php';?>
    </div>

    <div class="poll-display">
    <h2 class="poll-heading-style2">Add Poll Answers</h2>
    <?php include "addanswer.php";?>
    </div>

    <div class="poll-display">
    <h2 class="poll-heading-style2">List of polls</h2>
    <?php include "listpolls.php";?>
    </div>
</body>
</html>

