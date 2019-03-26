<?php 
// Displays a list of all the Payments in the database, and allows to Create, View, Edit and Delete
// each of the individual payment rows 
require_once 'header.php';

$p = new Payment();
$payments = $p->paymentsList($_SESSION['event_id']);
?>

<body>
    <h2>View Payments (Admin View)</h2>
    <div id="create_payment">
        <a href="payments.php">+ Create a Payment</a>
    </div>
    <table>
        <?php 
        echo "<thead>";
        echo "<th>User ID</th>";
        echo "<th>Amount Paid</th>";
        echo "<th>Payment Method</th>";
        echo "</thead><tbody>";
        foreach ($payments as $payment) {
            echo "<tr>";
            echo "<td><form action='viewPayment.php' method='post'>" .
            "<input type='hidden' value='$payment->id' name='id' />" .
            "<input class='button-link' type='submit' value='$payment->user_id' name='view' /></form></td>";
            echo "<td>$" . $payment->amount . "</td>";
            echo "<td>" . $payment->payment_method . "</td>";
            echo "<td><form action='editPayment.php' method='post'>" .
                "<input type='hidden' value='$payment->id' name='id' />" .
                "<input type='submit' value='Edit' name='edit' /></form></td>";
            echo "<td><form action='deletePayment.php' method='post'>" .
                "<input type='hidden' value='$payment->id' name='id' />" .
                "<input type='submit' value='Delete' name='delete' /></form></td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</body>

<?php
    include "footer.php";
?>