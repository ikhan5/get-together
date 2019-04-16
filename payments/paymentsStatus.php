<?php 
/* Author: Imzan Khan
 * Feature: Payments
 * Description: Displays a list of all the Money Pools for a 
 *              specific event. The listing will display the 
 *              reason for the Money Pool, how much in total
 *              is required(goal) for that Pool. If the pool has 
 *              reached its goal (Attained), no payments can be made,
 *              otherwise (Not Attained) users can make a payment 
 *              towards the Money Pool.
 * Date Created: March 26th, 2019
 * Last Modified: April 15th, 2019
 * Recent Changes: Refactored Code, added comments
 */

require_once 'header.php';
?>

<div class="container">
    <h2>View Pools</h2>
    <table>

        <thead>
            <th>Reason</th>
            <th>Amount Paid</th>
            <th>Amount Needed</th>
            <th>Goal Status</th>
            <th>Make Payment</th>
        </thead>
        <tbody>
            <?php 
            include "MoneyPools/displayPaymentTotalInPools.php";
        ?>
        </tbody>
    </table>
</div>

<?php
    include "footer.php";
?>