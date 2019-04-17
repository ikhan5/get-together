<?php 
require_once '../model/database.php';
require_once './model/Food.php';

$event_id = $_GET['eid'];

$dbcon = Database::getDB();
$f = new Food();
$myfood = $f->getAllFood(Database::getDB());

echo "<table id='table'><tr>
        <th>Name</th>
        <th>Type</th>
        <th>Size</th>
        <th>Quantity</th>
    </tr>";
foreach($myfood as $food){
    echo "<tr><td>".$food->food_name."</td>".
        "<td>".$food->food_type."</td>".
        "<td>".$food->food_size."</td>".
        "<td>".$food->food_qty."</td>".
        "<td><form action='updatefood.php?eid=$event_id' method='post'>" .
        "<input type='hidden' value='$food->food_id' name='id' />".
        "<input type='submit' value='Update' name='update' class='btn_1'/>".
        "</form></td>" .
        "<td><form action='deletefood.php?eid=$event_id' method='post'>" .
        "<input type='hidden' value='$food->food_id' name='id' />".
        "<input type='submit' value='Delete' name='delete' class='btn_2' />".
        "</form></td></tr>";
}
echo "</table>";
?>

