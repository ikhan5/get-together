<?php
// When the Event name hyperlink is clicked on the payment_list page
// the View page is directed to, and allows the user to View a payment's info
// from the 'payments' table based on the row ID passed by the payment_list form
require_once 'header.php';
if (isset($_POST['view'])) {
    $db_handler = Database::getDB();
    $p = new Payment();
    $id = $_POST['id'];
    $payment = $p->selectPayment($id);
}
?>

<!-- Display for Viewing a payment  -->
<h2>Viewing Payment</h2>
<div id="payment_info">
    <div class="user-detail">
        <label for="email">Email:</label>
        <span id="email">
            <?=htmlspecialchars($payment->email) ?></span>
    </div>
    <div class="user-detail">
        <label for="amount">Amount Paid:</label>
        <span id="amount">
            $<?=htmlspecialchars($payment->amount) ?></span>
    </div>
    <div class="user-detail">
        <label for="payment-method">Payment Method:</label>
        <span id="payment-method">
            <?=htmlspecialchars($payment->payment_method) ?></span>
    </div>
</div>