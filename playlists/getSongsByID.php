<?php
/* Author: Imzan Khan
 * Feature: Playlists
 * Description: Gets all the songs from a specific playlist
 * Date Created: March 20th, 2019
 * Last Modified: April 15th, 2019
 * Recent Changes: Refactored Code, added comments
*/
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