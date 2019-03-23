<?php
require_once 'database.php';
require_once 'Drink.php';

if (isset($_POST['save'])) {
    
    $name = $_POST['name'];
    $type = $_POST['type'];
    $size = $_POST['size'];
    $qty = $_POST['qty'];

    $db = Database::getDB();
    $d = new Drink();
    $drinks = $d->insertDrink($name,$type,$size,$qty,$db);

    if($drinks){
        echo "Added drink sucessfully!";
    } else {
        echo "Error adding to list of drinks.";
    }
}