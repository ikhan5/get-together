<?php 
require_once 'database/Database.php';
require_once 'Drink.php';

$dbcon = Database::getDB();
$d = new Drink();
$mydrink = $d->getAllDrinks(Database::getDB());

echo "<table id='table'><tr>
        <th>Name</th>
        <th>Type</th>
        <th>Size</th>
        <th>Quantity</th>
        <th> </th>
    </tr>";
foreach($mydrink as $drink){
    echo "<tr><td>".$drink->drink_name."</td>".
        "<td>".$drink->drink_type."</td>".
        "<td>".$drink->drink_size."</td>".
        "<td>".$drink->drink_qty."</td>".
        "<td><form action='drinks_function/updatedrink.php' method='post'>" .
        "<input type='hidden' value='$drink->drink_id' name='id' />".
        "<input type='submit' value='Update' name='update' class='btn1'/>".
        "</form></td>" .
        "<td><form action='drinks_function/addrecdrink.php' method='post'>" .
        "</form></td></tr>";
}
echo "</table>";

