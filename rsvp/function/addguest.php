<?php
require_once '../database/Database.php';
require_once 'Guest.php';

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $db = Database::getDB();
    $g = new Guest();
    $guests = $g->insertGuest($name,$email,$db);

    if($c){
        echo "Added guest sucessfully";
    } else {
        echo "Error adding to guest list.";
    }
}
?>
