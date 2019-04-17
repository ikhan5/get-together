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
    <div class="container">
    <div class="inputform">
        <h2 class="h-style-add">Add food to your event</h2>
        <form method="post" action="addfood.php?eid=<?=$event_id?>">
        <label>Type : </label><br/>
        <p>
        <?php
            $options= array('choose','Vegeterian','Fast Food','Burgers','Pizza','Sushi', 'Salads', 'Deserts');
            echo '<select name="type" class="dropbtn">';
            for ($i=0; $i<count($options);$i++)
            {
                echo'<option>'.$options[$i].'</option>';
            }
            echo '</select>';
        ?></p><br/>
        <label>Description: </label><input type="text" name="name"/><br/>
        <label>Size : </label><input type="text" name="size"/><br/>
        <label>Quantity : </label><input type="text" name="qty"/><br/>
        <button type="submit" name="save" class='btn'>Save</button>
        </form>
    </div>
    <div class="display">
        <h2 class="h-style-list">List of Food</h2>
    <?php 
        include "listfood.php";
    ?>
    </div>
    <div class="recomlist">
        <h2 class="h-style-rec">Recommandations from us</h2>
    <?php 
        include "listrecfood.php";
    ?>
    </div>
    </div>
</body>
</html>