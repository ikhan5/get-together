<?php
require_once '../model/database.php';
require_once '../model/playlist_db.php';

    $playlist_id = $_POST['pid'];
    
    $songs = $_POST['songs'];
    $p = new PlaylistDB();
    foreach($songs as $song){
        $p->addSongsToPlaylist($song, $playlist_id);
    }
    header("Location: index.php");