<?php
// When the 'Delete' link is clicked on the payment_list page
// the Delete page is directed to, and allows the user to remove a payment's info
// from the 'payments' table based on the row ID passed by the payment_list form
require_once '../model/database.php';
require_once '../model/payment_db.php';

if (isset($_POST['delete'])) {
    $db_handler = Database::getDB();
    $p = new Payment();
    $payment_id = $_POST['id'];
    $payment = $p->selectPayment($db_handler, $payment_id);
}

if (isset($_POST['delete_payment'])) {
    $db_handler = Database::getDB();
    $p = new Payment();
    $payment_id = $_POST['payment_id'];
    $p->deletePayment($db_handler, $payment_id);
    header("Location: payment_list.php");
    exit;
}
if (isset($_POST['cancel'])) {
    header("Location: payment_list.php");
    exit;
}
?>
<!-- Form for deleting a payment  -->
<form method="post" action="">
    <h2>Are you sure you want to Delete this Payment?</h2>
    <input type="hidden" name="payment_id" value="<?= $payment->payment_id; ?>" />
    <div id="payment_info">
        <div class="payment-detail">
            <label for="email">Email:</label>
            <span id="email">
                <?php echo $payment->email ?></span>
        </div>
        <div class="payment-detail">
            <label for="amount">Amount Paid:</label>
            <span id="amount">
                $
                <?php echo $payment->amount ?></span>
        </div>
        <div class="payment-detail">
            <label for="payment-method">Amount Paid:</label>
            <span id="payment-method">
                <?php echo $payment->payment_method ?></span>
        </div>
    </div>
    <input type="submit" name="delete_payment" value="Delete">
    <input type="submit" name="cancel" value="Cancel">
</form>