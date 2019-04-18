<?php 
require_once '../model/database.php';
require_once 'Drink.php';

$eid = $_GET['eid'];

$dbcon = Database::getDB();
$d = new Drink();
$mydrink = $d->getAllRecDrinks($dbcon);

echo "<table id='drinks_table2'><tr>
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
        "<td class='add_rec'><form class='recPost' action='addrecdrink.php' method='post'>".
        "<input type='hidden' name='eid' value='$eid'>".
        "<input type='hidden' value='$drink->recdrink_id' name='rec_id' />".
        "<input type='submit' value='Add' name='insert' class='drinks_btn2'/>".
        "</form></td></tr>";
}
echo "</table>";

