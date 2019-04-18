<?php
require_once '../../model/database.php';
require_once 'Drink.php';

if (isset($_POST['save'])) {
    
    $name = $_POST['name'];
    $type = $_POST['type'];
    $size = $_POST['size'];
    $qty = $_POST['qty'];
    $eid = $_GET['eid'];

    $db = Database::getDB();
    $d = new Drink();
    $drinks = $d->insertDrink($name,$type,$size,$qty,$eid,$db);

    if($drinks){
        echo "Added drink sucessfully!";
    } else {
        echo "Error adding to list of drinks.";
    }
}