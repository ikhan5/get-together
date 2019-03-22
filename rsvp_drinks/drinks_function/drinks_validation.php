<?php

$errors = "";
$name = "";
$type = "";
$size = "";
$qty = "";


if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $size = $_POST['size'];
    $qty = $_POST['qty'];
    
    $errors = validateForm($name,$type,$size,$qty,$errors);

    if (empty ($errors)){
        return $errors;
    }
}