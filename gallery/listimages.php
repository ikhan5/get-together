<?php

require_once 'database.php';
require_once 'Gallery.php';

$dbcon = Database::getDb();
$p = new Gallery();
$myphoto = $p->getAllPhotos(Database::getDB());

$output = '';

if($myphoto > 0)
{
    $count = 0;
    foreach($myphoto as $row)
    {
        $count ++;
        $output.='
        <div class="photo-container">
            <div class="photo-sec">    
            <img src="files/'.$row["photo_name"].'" class="photo"/>
            </div>
            <div class="photo-info">
                <div class="photo-content">
                <p class="photo-text">'.$row["title"].'</p>
                <button type="button" class="edit" id="'.$row["id"].'">Edit</button>
                <button type="button" class="delete" id="'.$row["id"].'"data-photo_name="'.$row["photo_name"].'">Delete</button>
                </div>
            </div>
        </div><br/>
        ';
    }
}
else{
    $output.='
    <p>No photos at the moment</p>
    ';
}

echo $output;

?>