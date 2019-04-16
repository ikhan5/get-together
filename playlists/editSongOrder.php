<?php
/* Author: Imzan Khan
 * Feature: Playlists
 * Description: Allows the user to update the order of the
 *              songs in the desired playlist. 
 * 
 *              Note: This feature is currently not working
 *              and will continued to be worked on in the 
 *              future.         
 * Date Created: March 20th, 2019
 * Last Modified: April 15th, 2019
 * Recent Changes: Refactored Code, added comments
 */

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