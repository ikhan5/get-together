<?php
/* Author: Imzan Khan
 * Feature: Payments
 * Description: When the '+ Create a Money Pool' link is 
 *              clicked on the payment_list page the Create 
 *              page is directed to, and allows the user to insert 
 *              a new payment into the 'payments' table.            
 * Date Created: March 26th, 2019
 * Last Modified: April 16th, 2019
 * Recent Changes: Added URL variable
 */

 session_start();
 $user_id = $_SESSION['userid'];
if(isset($_SESSION['userid'])){
    include "header.php";
    if (isset($_POST['process__payment'])) {
        $pool_id = filter_input(INPUT_POST, 'pool_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $amount = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $method = filter_input(INPUT_POST, 'method', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $event_id = filter_input(INPUT_POST, 'event_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $p = new Payment();
        $p->insertPayment($pool_id, $amount, $method, $user_id);

        $mp = new MoneyPool();
        $mp->updateTotal($amount, $pool_id);
        header("Location: paymentsStatus.php?eid=$event_id");
    }
}else{
    echo "You need to be logged in to view this page";
}