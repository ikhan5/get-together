<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>List of Drinks</title>
    <link rel="stylesheet" type="text/css" href="style/drinks_style.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="inputform">
        <h2 class="heading-style">Add drinks to your event</h2>
        <form method="post" action="drinks_function/adddrink.php">
        <label>Name : </label><input type="text" name="name"/><br/>
        <label>Type : </label><br/>
        <p>
        <?php
            $options= array('choose','Non-alcoholic','Wine','Spirits','Beer and Ciders','Coolers');
            echo '<select name="type" class="dropbtn">';
            for ($i=0; $i<count($options);$i++)
            {
                echo'<option>'.$options[$i].'</option>';
            }
            echo '</select>';
        ?></p><br/>
        <label>Size : </label><input type="text" name="size"/><br/>
        <label>Quantity : </label><input type="text" name="qty"/><br/>
        <button type="submit" name="save" class='btn'>Save</button>
        </form>
        <p class="errormsg">whyyy</p>
    </div>
    <div class="display">
        <h2 class="heading-style2">List of Drinks</h2>
        <?php 
            include "drinks_function/listdrinks.php";
        ?>
    </div>
    <div class="recdrinklist">
        <h2 class="heading-style3">Our Recommendations</h2>
        <?php 
            include "drinks_function/listrecdrinks.php";
        ?>
    </div>
    </div>
    <script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <script src="js/drink_recid.js"></script>
</body>
</html>