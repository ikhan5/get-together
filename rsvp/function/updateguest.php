<?php 
require_once '../database/Database.php';
require_once 'Guest.php';

if(isset($_POST['update'])){
    $id = $_POST['id'];
    
    $dbcon = Database::getDB();
    $g = new Guest();
    $guest = $g->getGuestById($id, $dbcon);
}

if(isset($_POST['updguest'])){
    $id= $_POST['gid'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $dbcon = Database::getDb();
    $g = new Guest();
    $count = $g->updateGuest($id, $name, $email, $dbcon);

    if($count){
        header("Location: ../index.php");
    } else {
        echo  "Update error.";
    }
}

?>

<form action="" method="post">
    <input type="hidden" name="gid" value="<?= $guest->guest_id; ?>" />
    Name: <input type="text" name="name" value="<?= $guest->guest_name; ?>" /><br/>
    Email: <input type="text" name="email" value="<?= $guest->guest_email; ?>" /><br/>
    <input type="submit" name="updguest" value="UpdateGuest">
</form>

