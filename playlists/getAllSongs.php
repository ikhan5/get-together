<?php
require_once '../model/database.php';
require_once '../model/playlist_db.php';

$p = new PlaylistDB();
$songs = $p->getAllSongs();
$jsonprod = json_encode($songs);

header('Content-Type: Application/json');
echo $jsonprod;