<?php 
/* Author: Imzan Khan
 * Feature: Payments
 * Description: Displays a list of all the Money Pools in the database, and allows to Create, View, Edit and Delete
 *              each of the individual money pool rows     
 * Date Created: March 26th, 2019
 * Last Modified: April 15th, 2019
 * Recent Changes: Refactored Code, added comments
 */
require_once 'header.php';
$p = new Payment();
$payments = $p->getPaymentStatus($event_id);
?>
<link rel="stylesheet" href="../../CSS/money_pools.css" />
<div class="container">

    <body>
        <h2>View Money Pools</h2>
        <div id="create_payment">
            <a href="Create.php">+ Create a Money Pool</a>
        </div>
        <table>
            <?php 
        echo "<table><thead>";
        echo "<th>Reason</th>";
        echo "<th>Amount Collected</th>";
        echo "<th>Goal</th>";
        echo "<th>Goal Status</th>";
        echo "<th colspan='2'>Pool Options</th>";
        echo "</thead><tbody>";
        foreach ($payments as $payment) {
            echo "<tr>";
            echo "<td><form action='View.php?eid=$event_id' method='post'>" .
                    "<input type='hidden' value='$payment->id' name='id' />" .
                    "<input class='button-link' type='submit' value='$payment->reason' name='view' /></form></td>";
            echo "<td>$".$payment->total_paid."</td>";
            echo "<td>$" . $payment->per_person_amount . "</td>";
            if($payment->total_paid >= $payment->per_person_amount){
                echo "<td style='color:green;'>Attained</td>";
            }else{
                echo "<td style='color:red;'>Not Reached</td>";
            }
            echo "<td><form action='Edit.php?eid=$event_id' method='post'>" .
                    "<input type='hidden' value='$payment->id' name='id' />" .
                    "<input class='button-link' type='submit' value='Edit' name='edit' /></td></form>";
            echo "<td><form action='Delete.php' method='post'>" .
                    "<input type='hidden' value='$payment->id' name='id' />" .
                    "<input class='button-link' type='submit' value='Delete' name='delete' /></td></form>";
        }
        echo "</table>";
        ?>
            </tbody>
        </table>
    </body>
</div>