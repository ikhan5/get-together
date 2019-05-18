<?php

require_once '../model/database.php';

$event_id = $_GET['eid'];

$dbcon = Database::getDb();
$query = "SELECT * FROM gallery WHERE event_id = ".$eid;
$result = $dbcon->query($query);

if($result->rowCount() > 0){
    while($row = $result->fetch()){
        echo '<div class="photo-container">
        <div class="photo-sec">';
        if($row['photo_name']){
            $image = base64_decode($row['photo_name']);
            $file_info = finfo_open();
            $mime_type = finfo_buffer($file_info, $image, FILEINFO_MIME_TYPE);

        echo '<img src="data:' .$mime_type.';base64,'.$row['photo_name'].'">
        </div>';
        echo '<div class="photo-info">
        <p class="photo-text">'.$row['title'].'</p>
        <button type="button" class="delete" id="'.$row["id"].'"data-photo_name="'.$row["photo_name"].'">Delete</button>
        </div>
        </div>';
        }
    }
}