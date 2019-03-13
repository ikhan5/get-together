<?php 
require_once '../database/Database.php';
require_once 'Guest.php';

if(isset($_POST['delete'])){
    $id= $_POST['id'];
    $dbcon = Database::getDb();
    $g = new Guest();
    $count = $g->deleteGuest($id, $dbcon);

    if($count){
        header("Location: ../rsvp_index.php");
    }
}

?>