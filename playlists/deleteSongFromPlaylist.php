<?php 
require_once '../model/database.php';
require_once '../model/playlist_db.php';

if(isset($_POST['deletesong'])){
    $id = $_POST['ID'];
    $p = new PlaylistDB;
    $playlist = $p->deleteSongFromPlaylist($id);
    header("Location: index.php");
}