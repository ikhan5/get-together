<?php 
require_once '../model/database.php';
require_once '../model/playlist_db.php';

if(isset($_POST['deletesong'])){
    $pid = $_POST['playlistID'];
    $sid = $_POST['songID'];
    $p = new PlaylistDB;
    $playlist = $p->deleteSongFromPlaylist($sid,$pid);
    header("Location: playlists.php");
}