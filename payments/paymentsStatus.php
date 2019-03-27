<?php 
// Displays a list of all the Payments in the database, and allows to Create, View, Edit and Delete
// each of the individual payment rows 
require_once 'header.php';

$user_id = $_SESSION['user_id'];
$event_id = $_SESSION['event_id'];
$mp = new Payment();
$payments = $mp->getPaymentStatus($event_id);
?>

<div class="container">
    <h2>View Payments (Public View)</h2>
    <table>
        <?php 
        echo "<thead>";
        echo "<th>Reason</th>";
        echo "<th>Amount Paid</th>";
        echo "<th>Amount Needed</th>";
        echo "<th>Status</th>";
        echo "<th>Make Payment</th>";
        echo "</thead><tbody>";
        foreach ($payments as $payment) {
            echo "<tr>";
            echo "<td>".$payment->reason."</td>";
            echo "<td>".$payment->total_paid."</td>";
            echo "<td>$" . $payment->per_person_amount . "</td>";
            if($payment->total_paid >= $payment->per_person_amount){
                echo "<td style='color:green;'>Paid</td>";
            }else{
                echo "<td style='color:red;'>Unpaid</td>";
            }
            echo "<td><form action='payments.php' method='post'>" .
                "<input type='hidden' value='$payment->id' name='id' />";
                if($payment->total_paid >= $payment->per_person_amount){
            echo "<input style='color:grey;' class='button-link' type='submit' value='Pay Now' disabled/>";
                }else{
             echo "<input class='button-link' type='submit' value='Pay Now' name='payment' />";
                }
            echo "</form></td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>

<?php
    include "footer.php";
?>