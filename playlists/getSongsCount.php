<?php
require_once '../model/database.php';
require_once '../model/playlist_db.php';

$pid = $_POST['pid'];
$p = new PlaylistDB();
$song_count = $p->getSongCount($pid);

$jsonprod = json_encode($song_count);

header('Content-Type: Application/json');
echo $jsonprod;