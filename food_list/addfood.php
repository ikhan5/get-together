<?php
require_once './model/Database.php';
require_once './model/Food.php';

echo "<h3>Add Food</h3>";
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $size = $_POST['size'];
    $qty = $_POST['qty'];

    $db = Database::getDB();
    $f = new Food();
    $food = $f->insertFood($name, $type, $size, $qty, $db);

    if($s){
        echo "Food added sucessfully!";
    } else {
        echo "Error adding to list of food.";
    }
}
?>

<form action="" method="post">
    Name : <input type="text" name="name" /><br/>
    Type : <input type="text" name="type" /><br />
    Size : <input type="text" name="size" /><br />
    Quantity : <input type="text" name="type" /><br />
    <input type="submit" name="addpoll" value="Add Poll">
</form>