<?php
require_once '../../model/database.php';
require_once 'Drink.php';

if (isset($_POST['insert'])) {
    $rec_id = $_POST['rec_id'];
    $eid = $_GET['eid'];

    $db = Database::getDB();
    $d = new Drink();
    $get_rec = $d->getRecDrinkById($rec_id, $db);

$add_rec = $d->insertDrink($get_rec->recdrink_name,
                           $get_rec->recdrink_type,
                           $get_rec->recdrink_size,
                           $get_rec->recdrink_qty,
                           $eid,$db);
}