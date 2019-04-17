<?php 
require_once '../model/database.php';
require_once 'Drink.php';

$eid = $_GET['eid'];

$dbcon = Database::getDB();
$d = new Drink();
$mydrink = $d->getAllDrinks(Database::getDB(),$eid);

echo "<table id='drinks_table'><tr>
        <th>Name</th>
        <th>Type</th>
        <th>Size</th>
        <th>Quantity</th>
        <th> </th>
        <th> </th>
    </tr>";
foreach($mydrink as $drink){
    echo "<tr><td>".$drink->drink_name."</td>".
        "<td>".$drink->drink_type."</td>".
        "<td>".$drink->drink_size."</td>".
        "<td>".$drink->drink_qty."</td>".
        "<td><form action='drinks_function/updatedrink.php?eid=$eid' method='post'>" .
        "<input type='hidden' value='$drink->drink_id' name='id' />".
        "<input type='submit' value='Update' name='update' class='drinks_btn1'/>".
        "</form></td>" .
        "<td><form action='drinks_function/deletedrink.php?eid=$eid' method='post'>" .
        "<input type='hidden' value='$drink->drink_id' name='id' />".
        "<input type='submit' value='Delete' name='delete' class='drinks_btn2' />".
        "</form></td></tr>";
}
echo "</table>";



?>