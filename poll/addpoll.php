<?php
require_once './model/Database.php';
require_once './model/Poll.php';

echo "<h3>Add New Poll</h3>";
    if(isset($_POST['addpoll'])){
        $question = $_POST['poll_question'];
        $answer = $_POST['poll_answer'];
        
        $db = Database::getDb();
        $p = new Poll();
        $c = $p->addPoll($question, $answer, $db);

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
    Answer: <input type="text" name="poll_answer" /><br />
    <input type="submit" name="addpoll" value="AddPoll">
</form>