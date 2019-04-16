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
$event_id = $_SESSION['event_id'];
$mp = new MoneyPool();
$pools = $mp->poolsList($event_id);
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
        echo "<th>Amount Per Person</th>";
        echo "<th colspan='2'>Table Options</th>";
        echo "</thead><tbody>";
        foreach ($pools as $pool) {
            echo "<tr>";
            echo "<td><form action='View.php' method='post'>" .
                "<input type='hidden' value='$pool->id' name='id' />" .
                "<input class='button-link' type='submit' value='$pool->reason' name='view' /></form></td>";
            echo "<td>$" . $pool->amount_collected . "</td>";
            echo "<td>$" . $pool->per_person_amount . "</td>";
            echo "<td><form action='Edit.php' method='post'>" .
                "<input type='hidden' value='$pool->id' name='id' />" .
                "<input class='button-link' type='submit' value='Edit' name='edit' /></td></form>";
            echo "<td><form action='Delete.php' method='post'>" .
                "<input type='hidden' value='$pool->id' name='id' />" .
                "<input class='button-link' type='submit' value='Delete' name='delete' /></td></form>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
            </tbody>
        </table>
    </body>
</div>