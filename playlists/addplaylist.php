<?php
require_once '../model/database.php';
require_once '../model/playlist_db.php';


$name = $_POST['name'];
$desc = $_POST['desc'];
$date = $_POST['date'];
$event = $_POST['event'];

$p = new PlaylistDB();
$c = $p->addPlaylist($name, $desc, $date, $event);

if($c){
    echo "Added playlist sucessfully";
} else {
    echo "problem adding a playlist";
}