<?php
/* Author: Imzan Khan
 * Feature: Payments
 * Description: When the 'Delete' link is clicked on the payment_list page
 *              the Delete page is directed to, and allows the user to 
 *              remove a payment's info from the 'payments' table based on 
 *              the row ID passed by the payment_list form         
 * Date Created: March 26th, 2019
 * Last Modified: April 15th, 2019
 * Recent Changes: Refactored Code, added comments
 */

require_once 'header.php';

if (isset($_POST['delete'])) {
    $p = new Payment();
    $id = $_POST['id'];
    $payment = $p->selectPayment($id);
}

if (isset($_POST['delete_payment'])) {
    $p = new Payment();
    $event_id = $_SESSION['event_id'];
    $id = $_POST['payment_id'];
    $p->deletePayment($id);
    header("Location: MoneyPools/pool_list.php");
    exit;
}
if (isset($_POST['cancel'])) {
    header("Location: MoneyPools/pool_list.php");
    exit;
}
?>
<!-- Form for deleting a payment  -->
<div class="container">
    <form method="post" action="">
        <h2>Are you sure you want to Delete this Payment?</h2>
        <input type="hidden" name="payment_id" value="<?= $payment->id; ?>" />
        <div id="payment_info">
            <div class="payment-detail">
                <label for="email">Email:</label>
                <span id="email">
                    <?= htmlspecialchars($payment->id) ?></span>
            </div>
            <div class="payment-detail">
                <label for="amount">Amount Paid:</label>
                <span id="amount">
                    $
                    <?= htmlspecialchars($payment->amount) ?></span>
            </div>
            <div class="payment-detail">
                <label for="payment-method">Amount Paid:</label>
                <span id="payment-method">
                    <?=htmlspecialchars($payment->payment_method) ?></span>
            </div>
        </div>
        <input class="btn" type="submit" name="delete_payment" value="Delete">
        <input type="submit" name="cancel" value="Cancel">
    </form>
</div>