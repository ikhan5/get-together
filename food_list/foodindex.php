<?php

$pagetitle = 'Create Event';
include($_SERVER['DOCUMENT_ROOT'].'/loggedin_header.php');
?>

<?php
    $event_id = $_GET['eid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>List of Food</title>
    <link rel="stylesheet" type="text/css" href="../CSS/foodlist.css"/>
</head>
<body>
    <div class="food-container">
    <div class="food-inputform">
        <h2 class="food-h-style-add">Add food to your event</h2>
        <form method="post" action="addfood.php?eid=<?=$event_id?>">
        <label>Type : </label><br/>
        <p>
        <?php
            $options= array('choose','Vegeterian','Fast Food','Burgers','Pizza','Sushi', 'Salads', 'Deserts');
            echo '<select name="type" class="food-dropbtn">';
            for ($i=0; $i<count($options);$i++)
            {
                echo'<option>'.$options[$i].'</option>';
            }
            echo '</select>';
        ?></p><br/>
        <label>Description: </label><input type="text" name="name"/><br/>
        <label>Size : </label><input type="text" name="size"/><br/>
        <label>Quantity : </label><input type="text" name="qty"/><br/>
        <button type="submit" name="save" class='food_btn'>Save</button>
        </form>
    </div>
    <div class="food-display">
        <h2 class="food-h-style-list">List of Food</h2>
    <?php 
        include "listfood.php";
    ?>
    </div>
    </div>
</body>
</html>