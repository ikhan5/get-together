<?php
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