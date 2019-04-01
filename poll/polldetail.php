<?php
require_once './model/Database.php';
require_once './model/Poll.php';


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $dbcon = Database::getDb();

    $p = new Poll();
    $poll= $p->getPollById($id, $dbcon);

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="../CSS/poll.css"/>
</head>
<body>
<form class="webPoll" method="post" action="">
    <h4><?php echo $poll->poll_question ?></h4>
    <ul>
        <label class='poll_active'>
            <input type='radio' name='choise' value='0'><?php echo $poll->poll_answer?>
        </label>
    </ul>
    <p class="buttons">
        <button type="submit" name='save' class='btn'>Vote!</button>
    </p>
</form>
</body>
</html>