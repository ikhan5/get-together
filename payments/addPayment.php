<?php
/* Author: Imzan Khan
 * Feature: Payments
 * Description: When the '+ Create a Money Pool' link is 
 *              clicked on the payment_list page the Create 
 *              page is directed to, and allows the user to insert 
 *              a new payment into the 'payments' table.            
 * Date Created: March 26th, 2019
 * Last Modified: April 15th, 2019
 * Recent Changes: Refactored Code, added comments
 */

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
        header("Location: paymentsStatus.php?eid=".$event_id);
    }
}else{
    echo "You need to be logged in to view this page";
}