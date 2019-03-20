<?php
require_once '../model/database.php';
require_once '../model/playlist_db.php';

$p = new PlaylistDB();
$playlists = $p->getAllPlaylists();
$jsonprod = json_encode($playlists);

header('Content-Type: Application/json');
echo $jsonprod;