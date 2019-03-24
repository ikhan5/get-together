<?php
// When the '+ Create a Money Pool' link is clicked on the payment_list page
// the Create page is directed to, and allows the user to insert a new payment
// into the 'payments' table 
require_once '../model/database.php';
require_once '../model/payment.php';

if (isset($_POST['process__payment'])) {
    $email = $_POST['email'];
    $amount = $_POST['amount'];
    $payment_method = $_POST['method'];

    $db_handler = Database::getDB();
    $p = new Payment();
    $p->insertPayment($db_handler, $email, $amount, $method);
    header("Location: payment_list.php");
    exit;
}