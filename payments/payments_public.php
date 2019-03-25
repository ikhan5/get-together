<?php 
// Displays a list of all the Payments in the database, and allows to Create, View, Edit and Delete
// each of the individual payment rows 
require_once 'header.php';

$user_id = $_SESSION['user_id'];
$e = new Payment();
$events = $e->getEventsWithPoolsByID($user_id);
?>

<body>
    <h2>View Payments (Public View)</h2>
    <table>
        <?php 
        echo "<thead>";
        echo "<th>Event Name</th>";
        echo "<th>Amount Needed</th>";
        echo "<th>Status</th>";
        echo "<th>Make Payment</th>";
        echo "</thead><tbody>";
        foreach ($events as $event) {
            echo "<tr>";
            echo "<td><input type='text' value='$event->title' /></td>";
            echo "<td>$" . $event->budget . "</td>";
            echo "<td>Unpaid</td>";
            echo "<td><form action='payments.php' method='post'>" .
                "<input type='hidden' value='$event->id' name='id' />" .
                "<input type='submit' value='Pay Now' name='payment' /></form></td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</body>

<?php
    include "footer.php";
?>