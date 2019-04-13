<?php 
// Displays a list of all the Payments in the database, and allows to Create, View, Edit and Delete
// each of the individual payment rows 
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