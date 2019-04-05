<?php

function validateForm($filetitle,$checkimage)
{
    $errors="";
    if (empty($filetitle) ) {
        $errors .= "Please type a title.<br/>";
    }
    if(file_exists($checkimage) ) {
        $errors .= "Please upload photo.<br/>";
    }
    return $errors;
}