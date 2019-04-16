<?php
/* Author: Imzan Khan
 * Feature: Payments
 * Description: Retreives a list of all the Money Pools for a 
 *              specific event. The reason for the Money Pool, 
 *              how much in total is required(goal) for that Pool
 *              and how much has been paid so far are returned.
 *  
 *              Note: Initially I was going to make it so it was
 *              individual payments, as in each user would pay 
 *              individual fees, but decided that a larger Money Pool
 *              would be better suited. 
 * 
 * Date Created: March 26th, 2019
 * Last Modified: April 15th, 2019
 * Recent Changes: Refactored Code, added comments
 */

$user_id = $_SESSION['user_id'];
$event_id = $_SESSION['event_id'];
$mp = new Payment();
$payments = $mp->getPaymentStatus($event_id);
        foreach ($payments as $payment) {
            echo "<tr>";
            echo "<td>".$payment->reason."</td>";
            echo "<td>$".$payment->total_paid."</td>";
            echo "<td>$" . $payment->per_person_amount . "</td>";
            if($payment->total_paid >= $payment->per_person_amount){
                echo "<td style='color:green;'>Attained</td>";
            }else{
                echo "<td style='color:red;'>Not Reached</td>";
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