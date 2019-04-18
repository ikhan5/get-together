<?php 
require_once '../../model/database.php';
require_once 'Guest.php';


if(isset($_POST['delete'])){
    $eid = $_GET['eid'];
    $id= $_POST['id'];
    $dbcon = Database::getDb();
    $g = new Guest();
    $count = $g->deleteGuest($id, $dbcon);

    if($count){
        header("Location: ../?eid=$eid");
    }
}

?>