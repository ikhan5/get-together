<?php 
/* Author: Imzan Khan
 * Feature: Playlists
 * Description: Deleted a single song from 
 *              the specific playlist.          
 * Date Created: March 20th, 2019
 * Last Modified: April 15th, 2019
 * Recent Changes: Refactored Code, added comments
 */
require_once '../model/database.php';
require_once '../model/playlist_db.php';

if(isset($_POST['deletesong'])){
    $id = $_POST['ID'];
    $p = new PlaylistDB;
    $playlist = $p->deleteSongFromPlaylist($id);
    header("Location: index.php");
}