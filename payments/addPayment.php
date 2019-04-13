<?php
// When the '+ Create a Money Pool' link is clicked on the payment_list page
// the Create page is directed to, and allows the user to insert a new payment
// into the 'payments' table 
session_start();
 include "header.php";
$user_id = $_SESSION['user_id'];


if(isset($_SESSION['user_id'])){
    if (isset($_POST['process__payment'])) {
        $pool_id = filter_input(INPUT_POST, 'pool_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $amount = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $method = filter_input(INPUT_POST, 'method', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $p = new Payment();
        $p->insertPayment($pool_id, $amount, $method, $user_id);

        $mp = new MoneyPool();
        $mp->updateTotal($amount, $pool_id);
        header("Location: paymentsStatus.php");
    }
}else{
    echo "You need to be logged in to view this page";
}