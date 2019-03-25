<?php
// When the 'Edit' link is clicked on the payment_list page
// the Edit page is directed to, and allows the user to edit a payment's info
// from the 'payments' table based on the row ID passed by the payment_list form
require_once 'header.php';
if(isset($_SESSION['user_id'])){
if (isset($_POST['edit'])) {
    $db_handler = Database::getDB();
    $p = new Payment();
    $id = $_POST['id'];
    $payment = $p->selectPayment($id);
}

if (isset($_POST['editpayment'])) {
    $db_handler = Database::getDB();
    $p = new Payment();
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $amount = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $method = $_POST['payment_method'];
    $p->updatePayment($amount, $method, $id);
    header("Location: payment_list.php");
    exit;
}
}else{
    echo "Need to login to view this page";
}
?>
<!-- Form for editting a payment -->
<h2>Editting Payment: </h2>
<form method="post" action="">
    <input type="hidden" name="id" value="<?= $payment->id; ?>" />
    <label for="email">Email: </label>
    <input type="hidden" name="email" id="email" value='<?= $_SESSION['user_id']; ?>'><br />
    <label for="amount">Amount Paid: $</label>
    <input type="number" name="amount" id="amount" min="1" step=".01" value='<?= $payment->amount ?>' /> <br />
    <label for="payment_method">Choose a Payment Method:</label>
    <select name="payment_method" id="payment_method">
        <?php 
        if ($payment->payment_method === 'PayPal') {
            echo "<option value='PayPal' selected='selected'>PayPal</option>";
            echo "<option value='Credit Card'>Credit Card</option>";
        } else {
            echo "<option value='Credit Card' selected='selected'>Credit Card</option>";
            echo "<option value='PayPal'>PayPal</option>";
        }
        ?>
    </select>
    <br />
    <input type="submit" name="editpayment" value="Update Payment">
</form>