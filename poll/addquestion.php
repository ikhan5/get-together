<?php
require_once '../model/database.php';
require_once './model/Poll.php';

    if(isset($_POST['addpoll'])){
        $question = $_POST['poll_question'];
        
        $db = Database::getDb();
        $p = new Poll();
        $c = $p->addPoll($question, $db);

        if($c){
            header("Location: pollindex.php");
            echo "New poll added sucessfully";
        }else{
            echo "There is some problem adding the poll";
        }
    }
?>

<form action="" method="post">
    Question: <input type="text" name="poll_question" /><br/>
    <input type="submit" name="addpoll" value="Add">
</form>