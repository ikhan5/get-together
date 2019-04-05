<?php

class Gallery
{
    public function addPhoto($filetitle, $filedes, $images, $db){

    $images = $_FILES['image']['name'];
    $tmp_dir = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];
    $filepath = "photos/".$_FILES['image']['name'];

    $upload_dir = 'photos/';
    $imgExt = strtolower(pathinfo($images,PATHINFO_EXTENSION));
    $valid_ext = array('jpeg','jpg','png','gif');
    move_uploaded_file($tmp_dir, $upload_dir.$images);

    $stmt = $db->prepare('INSERT INTO gallery(title,description,path) VALUES(:imgtitle, :imgdes, :filepath)');
    $stmt->bindParam(':imgtitle',$filetitle);
    $stmt->bindParam(':imgdes',$filedes);
    $stmt->bindParam(':filepath',$filepath);
    $count = $stmt->execute();

    if($count){
        $errors = "added photo";
    } else{
        $errors ="error adding phoho.";
    }
    return $errors;
    
    }
}