<?php
// When the '+ Create a Money Pool' link is clicked on the payment_list page
// the Create page is directed to, and allows the user to insert a new payment
// into the 'payments' table 
session_start();
require_once '../model/database.php';
require_once '../model/payment_db.php';
$user_id = $_SESSION['user_id'];
$event_id = $_SESSION['event_id'];

if(isset($_SESSION['user_id'])){
    if (isset($_POST['process__payment'])) {
        $amount = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $method = filter_input(INPUT_POST, 'method', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $db_handler = Database::getDB();
        $p = new Payment();
        $p->insertPayment($event_id, $amount, $method, $user_id);
        header("Location: payment_list.php");
    }
}else{
    echo "You need to be logged in to view this page";
}