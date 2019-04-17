<?php
/* Author: Imzan Khan
 * Feature: Payments
 * Description: When the 'Edit' link is clicked on the payment_list page
 *              the Edit page is directed to, and allows the user to edit a payment's info
 *              from the 'payments' table based on the row ID passed by the payment_list form      
 * Date Created: March 26th, 2019
 * Last Modified: April 16th, 2019
 * Recent Changes: Added URL variable
 */

require_once 'header.php';
if(isset($_SESSION['userid'])){
if (isset($_POST['edit'])) {
    $db_handler = Database::getDB();
    $p = new Payment();

    $email = $_POST['email'];
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
    header("Location: MoneyPools/pool_list.php?eid=".$event_id);
    exit;
}
}else{
    echo "Need to login to view this page";
}
?>
<!-- Form for editting a payment -->
<div class="payments_container">
    <a href="MoneyPools/pool_list.php?eid=<?=$event_id?>">
        <i class="fas fa-arrow-left"> Back to Pools</i>
    </a>
    <h2 class="heading-style">Editting Payment: </h2>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?= $payment->id; ?>" />
        <p>Email: <?= $email ?></p>
        <label for="amount">Amount Paid: $</label>
        <input type="number" name="amount" id="amount" min="1" step=".01" value='<?= $payment->amount ?>' required />
        <br />
        <label for="payment_method">Choose a Payment Method:</label>
        <select name="payment_method" id="payment_method">
            <?php 
        if ($payment->payment_method === 'PayPal') {
            echo "<option value='PayPal' selected='selected'>PayPal</option>";
            echo "<option value='Credit'>Credit</option>";
        } else {
            echo "<option value='Credit' selected='selected'>Credit</option>";
            echo "<option value='PayPal'>PayPal</option>";
        }
        ?>
        </select>
        <br />
        <input type="submit" name="editpayment" value="Update Payment">
    </form>
</div>

<?php
    include "footer.php";
?>