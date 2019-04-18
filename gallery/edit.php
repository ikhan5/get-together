<?php

// this is supposed to be an edit button that edit the title of the photos

require_once '../model/database.php';
require_once 'Gallery.php';

$id = $_POST['id'];

$dbcon = Database::getDb();
$p = new Gallery();
$myphoto = $p->selectPhotoById($id, $dbcon);

foreach($myphoto as $row)
{
    $file_array = explode(".", $row["photo_name"]);
    $output['title'] = $row['title'];
    $output['photo_name'] = $file_array[0];
}

echo json_encode($output);