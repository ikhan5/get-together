<?php

session_start();

$eid = $_GET['eid'];
$userid = $_SESSION['userid'];
$userrole = $_SESSION['userrole'];

if(!isset($userid)) {
  $return_url = urlencode($_SERVER['REQUEST_URI']);
  header('Location: /account/?action=show_add_form&return_url=' . $return_url);
}

$pagetitle = 'Drink List';
include($_SERVER['DOCUMENT_ROOT'].'/loggedin_header.php');

?>
<link rel="stylesheet" type="text/css" href="../CSS/drinks_style.css"/>

<body class="drinks_body">
    <div class="drinks_container">
    <div class="drinks_inputform">
        <h2 class="drinks_heading-style">Add drinks to your event</h2>
        <form method="post" action="drinks_function/adddrink.php?eid=<?= $eid ?>">
        <label>Name : </label><input type="text" name="name"/><br/>
        <label>Type : </label><br/>
        <p>
        <?php
            $options= array('choose','Non-alcoholic','Wine','Spirits','Beer and Ciders','Coolers');
            echo '<select name="type" class="drinks_dropbtn">';
            for ($i=0; $i<count($options);$i++)
            {
                echo'<option>'.$options[$i].'</option>';
            }
            echo '</select>';
        ?></p><br/>
        <label>Size : </label><input type="text" name="size"/><br/>
        <label>Quantity : </label><input type="text" name="qty" /><br/>
        <button type="submit" name="save" class='drinks_btn'>Save</button>
        </form>
    </div>
    <div class="drinks_display">
        <h2 class="drinks_heading-style2">List of Drinks</h2>
        <?php 
            include "drinks_function/listdrinks.php";
        ?>
    </div>
    <div class="drinks_recdrinklist">
        <h2 class="drinks_heading-style3">Our Recommendations</h2>
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