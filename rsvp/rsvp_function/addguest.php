<?php
require_once '../../model/database.php';
require_once 'Guest.php';

$name = "";
$email = "";

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $eid = $_POST['eid'];

    $db = Database::getDB();
    $g = new Guest();
    $guests = $g->insertGuest($name,$email,$eid,$db);

    if($c){
        echo "Added guest sucessfully";
    } else {
        echo "Error adding to guest list.";
    }
}