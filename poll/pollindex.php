<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Create a poll</title>
    <link rel="stylesheet" type="text/css" href="../CSS/poll.css"/>
</head>
<body>
    <div class="container">
    <div class="inputform">
        <h2 class="h-style-add">Add new poll</h2> 
    <form action="addpoll.php" method="post">
        Question: <input type="text" name="poll_question" /><br/>
        Answer: <input type="text" name="poll_answer" /><br />
        <input type="submit" name="addpoll" class='btn'>
    </form>
    </div>
    <div class="display">
        <h2 class="h-style-list">List of polls</h2>
    <?php 
        include "listpolls.php";
    ?>
    </div>
    </div>
</body>
</html>


