<?php 
/* Author: Maria Korolenko
 * Feature: Food List
 * Description: Gets List information and allows the user
 *              to edit the Food type, name, description,
 *              size, quantity. New inputs are validated
 *              then updated in the database.  
 * Date Created: March 29th, 2019
 * Last Modified: April 18th, 2019
 * Recent Changes: Refactored Code, Added comments
 */ 
require_once '../model/database.php';
require_once './model/Food.php';

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $event_id = $_GET['eid'];
    $dbcon = Database::getDB();
    $f = new Food();
    $food = $f->getFoodById($id, $event_id, $dbcon);
}

if(isset($_POST['updfood'])){
    $id= $_POST['fid'];
    $event_id = $_GET['eid'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $size = $_POST['size'];
    $qty = $_POST['qty'];

    $dbcon = Database::getDb();
    $f = new Food();
    $count = $f->updateFood($id, $event_id, $name, $type, $size, $qty, $dbcon);

    if($count){
        header('location: foodindex.php?eid='.$event_id);
    } else {
        echo  "Error updating.";
    }
}

?>
<link rel="stylesheet" type="text/css" href="../CSS/foodlist.css"/>

<div class="inputform">
<form action="" method="post">
    <h2 class="h-style">Edit Food</h2>
    <input type="hidden" name="fid" value="<?= $food->food_id; ?>" />
    Name : <input type="text" name="name" value="<?= $food->food_name; ?>" /><br/>
    Type : <br/>
        <?php
            $options= array('choose','Vegeterian','Fast Food','Burgers','Pizza','Sushi', 'Salads', 'Deserts');
            echo '<select name="type" class="dropbtn">';
            for ($i=0; $i<count($options);$i++)
            {
                echo'<option>'.$options[$i].'</option>';
            }
            echo '</select>';
    ?>
    <br/>
    Size : <input type="text" name="size" value="<?= $food->food_size; ?>" /><br/>
    Quantity : <input type="text" name="qty" value="<?= $food->food_qty; ?>" /><br/>
    <button type="submit" name="updfood" value="UpdateFood" class='btn'>Update</button>
</form>
</div>