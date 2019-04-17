<?php
/* Author: Imzan Khan
 * Feature: Payments
 * Description: When the 'Delete' link is clicked on the payment_list page
 *              the Delete page is directed to, and allows the user to 
 *              remove a payment's info from the 'payments' table based on 
 *              the row ID passed by the payment_list form         
 * Date Created: March 26th, 2019
 * Last Modified: April 16th, 2019
 * Recent Changes: Added URL variable
 */

require_once 'header.php';

if (isset($_POST['delete'])) {
    $p = new Payment();
    $email = $_POST['email'];
    $id = $_POST['id'];
    $payment = $p->selectPayment($id);
}

if (isset($_POST['delete_payment'])) {
    $p = new Payment();
    $id = $_POST['payment_id'];
    $p->deletePayment($id);

    $pool = new MoneyPool();
    $pool->reduceTotal($payment->pool_id,$id);

    header("Location: MoneyPools/pool_list.php?eid=$event_id");
    exit;
}
if (isset($_POST['cancel'])) {
    header("Location: MoneyPools/pool_list.php?eid=$event_id");
    exit;
}
?>
<!-- Form for deleting a payment  -->
<div class="payments_container">
    <a href="MoneyPools/pool_list.php?eid=<?=$event_id?>">
        <i class="fas fa-arrow-left"> Back to Pools</i>
    </a>
    <form method="post" action="">
        <h2 class="heading-style">Are you sure you want to Delete this Payment?</h2>
        <input type="hidden" name="payment_id" value="<?= $payment->id; ?>" />
        <div id="payment_info">
            <div class="payment-detail">
                <label for="email">Email:</label>
                <span id="email">
                    <?= $email ?>
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
        <input class="btn1" type="submit" name="delete_payment" value="Delete">
        <input type="submit" name="cancel" value="Cancel">
    </form>
</div>

<?php
    include "footer.php";
?>