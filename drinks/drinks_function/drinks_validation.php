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

//validate form
function validateForm($name,$type,$size,$qty,$errors)
{
    if (empty($name)){
        $errors.= "Please enter the name for drinks.<br/>";
    }

    if (empty($type)) {
        $errors .= "Please select the type of drinks<br/>";
    } else {
        if (!($type == "Non-alcoholic" || $type == "Wine" || $type == "Spirits" || $type == "Beer and Ciders" || $type == "Coolers")) {
            $errors .= "Please select the type of drinks.<br/>";
        }
    }
    
    if (empty($size)){
        $errors.= "Please enter the size for drinks.<br/>";
    }
    
    if (empty($qty)){
        $errors.= "Please enter the quantity for drinks.<br/>";
    } else {
        if (!is_numeric($qty)){
        $errors.= "Please enter numbers only.<br/>";
    }
    return $errors;
    }
}