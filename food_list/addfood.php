<?php
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
    Name of food: <input type="text" name="name" /><br/>
    Type : <input type="text" name="type" /><br />
    Size : <input type="text" name="size" /><br />
    Quantity : <input type="text" name="type" /><br />
    <input type="submit" name="addfood" value="AddFood">
</form>