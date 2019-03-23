<?php 
require_once 'database/Database.php';
require_once 'Drink.php';

$dbcon = Database::getDB();
$d = new Drink();
$mydrink = $d->getAllRecDrinks($dbcon);

echo "<table id='table2'><tr>
        <th>Name</th>
        <th>Type</th>
        <th>Size</th>
        <th>Quantity</th>
        <th> </th>
    </tr>";
foreach($mydrink as $drink){
    echo "<tr class='recdrink'><td>".$drink->recdrink_name."</td>".
        "<td>".$drink->recdrink_type."</td>".
        "<td>".$drink->recdrink_size."</td>".
        "<td>".$drink->recdrink_qty."</td>".
        "<td class='add_rec'><form class='recPost' action='' method='post'>".
        "<input type='hidden' value='$drink->recdrink_id' class='rec_id' />".
        "<input type='submit' value='Add' name='insert' class='btn2'/>".
        "</form></td></tr>";
}
echo "</table>";

