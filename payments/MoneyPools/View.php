<?php
// When the Event name hyperlink is clicked on the payment_list page
// the View page is directed to, and allows the user to View a payment's info
// from the 'payments' table based on the row ID passed by the payment_list form
require_once 'header.php';

if (isset($_POST['view'])) {
    $p = new Payment();
    $pool_id = $_POST['id'];
    $payments = $p->paymentsList($pool_id);
}
?>

<!-- Display for Viewing a payment  -->
<div class="container">
    <a href="pool_list.php">
        <i class="fas fa-arrow-left"> Back to Pools</i>
    </a>
    <h2>Viewing Payments in Pool</h2>
    <table>
        <?php 
    echo "<table><thead>";
    echo "<th>User</th>";
    echo "<th>Amount Paid</th>";
    echo "<th>Payment Method</th>";
    echo "<th colspan='2'>Table Options</th>";
    echo "</thead><tbody>";
    foreach ($payments as $payment) {
        echo "<tr>";
        echo "<td><form action='View.php' method='post'>" .
            "<input type='hidden' value='$payment->id' name='id' />" .
            "<input class='button-link' type='submit' value='$payment->user_id' name='view' /></form></td>";
        echo "<td>" . $payment->amount . "</td>";
        echo "<td>" . $payment->payment_method . "</td>";
        echo "<td><form action='Edit.php' method='post'>" .
            "<input type='hidden' value='$payment->id' name='id' />" .
            "<input class='button-link' type='submit' value='Edit' name='edit' /></td></form>";
        echo "<td><form action='Delete.php' method='post'>" .
            "<input type='hidden' value='$payment->id' name='id' />" .
            "<input class='button-link' type='submit' value='Delete' name='delete' /></td></form>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
        </tbody>
    </table>
</div>