<?php
// When the Event name hyperlink is clicked on the payment_list page
// the View page is directed to, and allows the user to View a payment's info
// from the 'payments' table based on the row ID passed by the payment_list form
require_once '../model/database.php';
require_once '../model/payment_db.php';

if (isset($_POST['view'])) {
    $db_handler = Database::getDB();
    $p = new Payment();
    $pool_id = $_POST['id'];
    $payment = $p->selectPayment($db_handler, $pool_id);
}

?>
<!-- Display for Viewing a payment  -->
<h2>Viewing Payment</h2>
<div id="payment_info">
    <div class="user-detail">
        <label for="email">Email:</label>
        <span id="email">
            <?php echo $payment->email ?></span>
    </div>
    <div class="user-detail">
        <label for="amount">Amount Paid:</label>
        <span id="amount">
            $<?php echo $payment->amount ?></span>
    </div>
    <div class="user-detail">
        <label for="payment-method">Amount Paid:</label>
        <span id="payment-method">
            <?php echo $payment->payment_method ?></span>
    </div>
</div>