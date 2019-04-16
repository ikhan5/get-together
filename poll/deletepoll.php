<?php
require_once '../model/database.php';
require_once './model/Poll.php';

    if(isset($_POST['delete'])){
        $id = $_POST['id']; 
        $db = Database::getDb();
        $p = new Poll();
        $mydata = $p->deletePoll($id, $db);

        if($mydata){
            header("Location: pollindex.php");
        }
    }
?>
