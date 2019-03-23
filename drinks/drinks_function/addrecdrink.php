<?php
require_once 'database.php';
require_once 'Drink.php';

$db = Database::getDB();

$rec_id = $_POST['rec_id'];

$d = new Drink();
$get_rec = $d->getRecDrinkById($rec_id, $db);

$add_rec = $d->insertDrink($get_rec->recdrink_name,
                           $get_rec->recdrink_type,
                           $get_rec->recdrink_size,
                           $get_rec->recdrink_qty,
                           $db);