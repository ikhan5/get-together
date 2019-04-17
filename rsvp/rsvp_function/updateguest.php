<?php 
require_once '../../model/database.php';
require_once 'Guest.php';

session_start();

$eid = $_GET['eid'];
$userid = $_SESSION['userid'];
$userrole = $_SESSION['userrole'];

if(!isset($userid)) {
  $return_url = urlencode($_SERVER['REQUEST_URI']);
  header('Location: /account/?action=show_add_form&return_url=' . $return_url);
}

$pagetitle = 'Update Guest Information';
include($_SERVER['DOCUMENT_ROOT'].'/loggedin_header.php');


if(isset($_POST['update'])){
    $id = $_POST['id'];
    $eid = $_POST['eid'];
    
    $dbcon = Database::getDB();
    $g = new Guest();
    $guest = $g->getGuestById($id, $eid, $dbcon);
}

if(isset($_POST['updguest'])){
    $eid = $_POST['eid'];
    $id= $_POST['gid'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $dbcon = Database::getDb();
    $g = new Guest();
    $count = $g->updateGuest($id, $name, $email, $dbcon);

    if($count){
        header("Location: ../rsvp/?eid='$eid'");
    } else {
        echo  "Update error.";
    }
}

?>
<div class="rsvp_inputform">
<form action="" method="post">
    <h2 class="heading-style">Edit guest's information</h2>
    <input type="hidden" name="eid" value="<?= $eid; ?>">
    <input type="hidden" name="gid" value="<?= $guest->guest_id; ?>" />
    Name: <input type="text" name="name" value="<?= $guest->guest_name; ?>" /><br/>
    Email: <input type="text" name="email" value="<?= $guest->guest_email; ?>" /><br/>
    <button type="submit" name="updguest" value="UpdateGuest" class='rsvp_btn'>Update</button>
</form>
</div>