<?php 
require_once '../../model/database.php';
require_once 'Drink.php';

session_start();

$eid = $_GET['eid'];
$userid = $_SESSION['userid'];
$userrole = $_SESSION['userrole'];

if(!isset($userid)) {
  $return_url = urlencode($_SERVER['REQUEST_URI']);
  header('Location: /account/?action=show_add_form&return_url=' . $return_url);
}

$pagetitle = 'Update Drink item';
include($_SERVER['DOCUMENT_ROOT'].'/loggedin_header.php');


if(isset($_POST['update'])){
    $id = $_POST['id'];
    
    $dbcon = Database::getDB();
    $d = new Drink();
    $drink = $d->getDrinkById($id,$dbcon);
}

if(isset($_POST['upddrink'])){
    $eid = $_POST['eid'];
    $id= $_POST['did'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $size = $_POST['size'];
    $qty = $_POST['qty'];

    $dbcon = Database::getDb();
    $d = new Drink();
    $count = $d->updateDrink($id, $name, $type, $size, $qty, $dbcon);

    if($count){
        header("Location: ../?eid=$eid");
    } else {
        echo  "Update error.";
    }
}

?>

<div class="drinks_inputform">
<form action="" method="post">
    <h2 class="drinks_heading-style2">Edit Drink</h2>
    <input type="hidden" name="eid" value="<?= $eid; ?>">
    <input type="hidden" name="did" value="<?= $drink->drink_id; ?>" />
    Name : <input type="text" name="name" value="<?= $drink->drink_name; ?>" /><br/>
    Type : <br/>
        <?php
            $options= array('choose','Non-alcoholic','Wine','Spirits','Beer and Ciders','Coolers');
            echo '<select name="type" class="dropbtn">';
            for ($i=0; $i<count($options);$i++)
            {
                echo'<option>'.$options[$i].'</option>';
            }
            echo '</select>';
    ?><br/>
    Size : <input type="text" name="size" value="<?= $drink->drink_size; ?>" /><br/>
    Quantity : <input type="text" name="qty" value="<?= $drink->drink_qty; ?>" /><br/>
    <button type="submit" name="upddrink" value="UpdateDrink" class='drinks_btn'>Update</button>
</form>
</div>