<?php
// When the 'Edit' link is clicked on the payment_list page
// the Edit page is directed to, and allows the user to edit a payment's info
// from the 'payments' table based on the row ID passed by the payment_list form
require_once '../model/database.php';
require_once '../model/payment_db.php';

if (isset($_POST['edit'])) {
    $db_handler = Database::getDB();
    $p = new Payment();
    $payment_id = $_POST['id'];
    $payment = $p->selectPayment($db_handler, $payment_id);
}

if (isset($_POST['editpayment'])) {
    $db_handler = Database::getDB();
    $p = new Payment();
    $email = $_POST['email'];
    $amount = $_POST['amount'];
    $payment_method = $_POST['payment_method'];
    $payment_id = $_POST['payment_id'];
    $p->updatePayment($db_handler, $email, $amount, $payment_method, $payment_id);
    header("Location: payment_list.php");
    exit;
}
?>
<!-- Form for editting a payment -->
<h2>Editting Payment: </h2>
<form method="post" action="">
    <input type="hidden" name="payment_id" value="<?= $payment->payment_id; ?>" />
    <label for="email">Email: </label>
    <input type="email" name="email" id="email" value='<?= $payment->email ?>'><br />
    <label for="amount">Amount Paid: $</label>
    <input type="number" name="amount" id="amount" min="1" step=".01" value='<?= $payment->amount ?>' /> <br />
    <label for="payment_method">Choose a Payment Method:</label>
    <select name="payment_method" id="payment_method">
        <?php 
        if ($payment->payment_method === 'PayPal') {
            echo "<option value='PayPal' selected='selected'>PayPal</option>";
        } else {
            echo "<option value='Credit Card' selected='selected'>Credit Card</option>";
        }
        ?>
    </select>
    <br />
    <input type="submit" name="editpayment" value="Update Payment">
</form>