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

$db = Database::getDb();
$p = new Poll();
$mypoll = $p->getAllPolls(Database::getDb());


foreach($mypoll as $poll){
    echo "<a href='polldetail.php?id=$poll->id'>" .  $poll->poll_question  . "</a>".
        "<form action='editpoll.php' method='post'>" .
        "<input class='poll-input' type='hidden' value='$poll->id' name='id' />". 
        "<input class='poll-input' type='submit' value='Edit' name='edit' class='poll-btn1' />" . 
       
        "<form action='deletepoll.php' method='post'>" . 
        "<input class='poll-input' type='hidden' value='$poll->id' name='id' />". 
        "<input class='poll-input' type='submit' value='Delete' name='delete' class='poll-btn2' />".
        "</form>" . "</br>";
}

?>

