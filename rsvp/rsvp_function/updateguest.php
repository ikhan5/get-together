<?php 
require_once '../../model/database.php';
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
<link rel="stylesheet" type="text/css" href="../style/rsvp_style.css"/>
<div class="inputform">
<form action="" method="post">
    <h2 class="heading-style">Edit guest's information</h2>
    <input type="hidden" name="gid" value="<?= $guest->guest_id; ?>" />
    Name: <input type="text" name="name" value="<?= $guest->guest_name; ?>" /><br/>
    Email: <input type="text" name="email" value="<?= $guest->guest_email; ?>" /><br/>
    <button type="submit" name="updguest" value="UpdateGuest" class='btn'>Update</button>
</form>
</div>