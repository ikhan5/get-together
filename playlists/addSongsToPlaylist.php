<?php
/* Author: Imzan Khan
 * Feature: Playlists
 * Description: Gets all the songs selected and enters them
 *              into the desired playlist.           
 * Date Created: March 20th, 2019
 * Last Modified: April 15th, 2019
 * Recent Changes: Refactored Code, added comments
 */
require_once '../model/database.php';
require_once '../model/playlist_db.php';

    $playlist_id = $_POST['pid'];
    
    $songs = $_POST['songs'];
    $p = new PlaylistDB();
    foreach($songs as $song){
        $p->addSongsToPlaylist($song, $playlist_id);
    }
    header("Location: index.php");