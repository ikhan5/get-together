<?php
/* Author: Maria Korolenko
 * Feature: Food List
 * Description: Allows users to add the food     
 * Date Created: March 29th, 2019
 * Last Modified: April 18th, 2019
 * Recent Changes: Refactored Code, added comments
*/
require_once '../model/database.php';
require_once './model/Food.php';

echo "<h3>Add Food</h3>";
if (isset($_POST['save'])) {
    $event_id = $_GET['eid'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $size = $_POST['size'];
    $qty = $_POST['qty'];

    $db = Database::getDB();
    $f = new Food();
    $food = $f->insertFood($event_id, $name, $type, $size, $qty, $db);

    if($f){
        header('location: foodindex.php?eid='.$event_id);
        echo "Food added sucessfully!";
    } else {
        echo "Error adding to list of food.";
    }
}
?>

<form action="" method="post">
    Description <input class="food-input" type="text" name="name" /><br/>
    Type : <input class="food-input" type="text" name="type" /><br />
    Size : <input class="food-input" type="text" name="size" /><br />
    Quantity : <input class="food-input" type="text" name="type" /><br />
    <input type="submit" name="addfood" value="AddFood">
</form>