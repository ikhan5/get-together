<?php
/* Author: Imzan Khan
 * Feature: Payments
 * Description: When the Event name hyperlink is clicked on the payment_list page
 *              the View page is directed to, and allows the user to View a payment's info
 *              from the 'payments' table based on the row ID passed by the payment_list form           
 * Date Created: March 26th, 2019
 * Last Modified: April 16th, 2019
 * Recent Changes: Added URL variable
 */

require_once 'header.php';
require_once '../../model/account/account_db.php';
if (isset($_POST['view'])) {
    $p = new Payment();
    $pool_id = $_POST['id'];
    $payments = $p->paymentsList($pool_id);
}else{
    header("Location: pool_list.php");
}
?>

<!-- Display for Viewing a payment  -->
<div class="payments_container">
    <a href="pool_list.php?eid=<?=$event_id?>">
        <i class="fas fa-arrow-left"> Back to Pools</i>
    </a>
    <h2 class="payments_heading-style">Viewing Payments in Pool</h2>
    <table class="payments_table">
        <?php 
    echo "<thead>";
    echo "<th>User</th>";
    echo "<th>Amount Paid</th>";
    echo "<th>Payment Method</th>";
    echo "<th colspan='2'>Table Options</th>";
    echo "</thead><tbody>";
    foreach ($payments as $payment) {
        $u = new AccountDB();
        $user = $u->getUser($payment->user_id);

        echo "<tr>";
        echo "<td><form action='../viewPayment.php?eid=$event_id' method='post'>" .
            "<input type='hidden' value='$payment->id' name='id' />" .
            "<input type='hidden' value='$user->email' name='email' />" .
            "<input class='button-link' type='submit' value='$user->email' name='view' /></form></td>";
        echo "<td>" . $payment->amount . "</td>";
        echo "<td>" . $payment->payment_method . "</td>";
        echo "<td><form action='../editPayment.php?eid=$event_id' method='post'>" .
            "<input type='hidden' value='$user->email' name='email' />" .
            "<input type='hidden' value='$payment->id' name='id' />" .
            "<input class='button-link' type='submit' value='Edit' name='edit' /></td></form>";
        echo "<td><form action='../deletePayment.php?eid=$event_id' method='post'>" .
            "<input type='hidden' value='$user->email' name='email' />" .
            "<input type='hidden' value='$payment->id' name='id' />" .
            "<input class='button-link' type='submit' value='Delete' name='delete' /></td></form>";
        echo "</tr>";
    }
    ?>
        </tbody>
    </table>
</div>
<?php
    include($_SERVER['DOCUMENT_ROOT'].'/loggedin_footer.php');
?>