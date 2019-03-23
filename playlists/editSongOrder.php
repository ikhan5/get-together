<?php
require_once '../model/database.php';
require_once '../model/playlist_db.php';

if(isset($_POST['update'])){
    foreach($_POST['positions'] as $position){
        $playlist_id = $position[0];
        $song_id = $position[1];
        $newPosition = $position[2];

        $o = new PlaylistDB;
        $o->editSongOrder($playlist_id, $song_id, $newPosition);
    }
}