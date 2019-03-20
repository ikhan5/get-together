<?php
require_once '../model/database.php';
require_once '../model/playlist_db.php';

if(isset($_POST['getsongs'])){
    $playlist_id = $_POST['playlist_id'];
    $p = new PlaylistDB();
    $songs = $p->getAllSongsByID($playlist_id);
    $jsonprod = json_encode($songs);

    header('Content-Type: Application/json');
    echo $jsonprod;
}