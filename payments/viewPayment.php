<?php
/* Author: Imzan Khan
 * Feature: Payments
 * Description: When the Event name hyperlink is clicked on the payment_list page
 *              the View page is directed to, and allows the user to View a payment's info
 *              from the 'payments' table based on the row ID passed by the payment_list form
 * Date Created: March 26th, 2019
 * Last Modified: April 15th, 2019
 * Recent Changes: Refactored Code, added comments
 */

require_once 'header.php';
if (isset($_POST['view'])) {
    $db_handler = Database::getDB();
    $p = new Payment();
    $id = $_POST['id'];
    $payment = $p->selectPayment($id);
    $email = $_POST['email'];
}else{
    header("Location: MoneyPools/pool_list.php");
}
?>

<!-- Display for Viewing a payment  -->
<div class="payments_container">
    <a href="MoneyPools/pool_list.php?eid=<?=$event_id?>">
        <i class="fas fa-arrow-left"> Back to Pools</i>
    </a>
    <h2 class="heading-style2">Viewing Payment</h2>
    <div id="payment_info">
        <div class="user-detail">
            <label for="email">Email:</label>
            <span id="email">
                <?=htmlspecialchars($email) ?></span>
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
</div>

<?php
    include "footer.php";
?>