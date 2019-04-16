<?php
require_once './model/Database.php';
require_once './model/Poll.php';

$db = Database::getDb();
$p = new Poll();
$mypoll = $p->getAllPolls(Database::getDb());


foreach($mypoll as $poll){
    echo "<a href='polldetail.php?id=$poll->id'>" .  $poll->poll_question  . "</a>".
        "<form action='editpoll.php' method='post'>" .
        "<input type='hidden' value='$poll->id' name='id' />". 
        "<input type='submit' value='Edit' name='edit' class='btn1' />" . 
       
        "<form action='deletepoll.php' method='post'>" . 
        "<input type='hidden' value='$poll->id' name='id' />". 
        "<input type='submit' value='Delete' name='delete' class='btn2' />".
        "</form>" . "</br>";
}

?>

