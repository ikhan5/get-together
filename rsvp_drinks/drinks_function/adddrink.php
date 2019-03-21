<?php
require_once '../database/Database.php';
require_once 'Drink.php';
require_once 'drinks_validation.php'

$db = Database::getDB();

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $size = $_POST['size'];
    $qty = $_POST['qty'];

    $d = new Drink();
    $drinks = $d->insertDrink($name,$type,$size,$qty,$db);

    if($drinks){
        echo "Added drink sucessfully!";
    } else {
        echo "Error adding to list of drinks.";
    }
}