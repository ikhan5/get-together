<?php
require_once '../model/database.php';
require_once './model/Poll.php';

    if(isset($_POST['addpoll'])){
        $answer = $_POST['poll_answer'];
        
        $db = Database::getDb();
        $p = new Poll();
        $c = $p->addPoll($answer, $db);

        if($c){
            header("Location: pollindex.php");
            echo "New poll added sucessfully";
        }else{
            echo "There is some problem adding the poll";
        }
    }
?>

<form action="" method="post">
    Answer: <input type="text" name="poll_answer" /><br />
    <input type="submit" name="addpoll" value="Add">
</form>