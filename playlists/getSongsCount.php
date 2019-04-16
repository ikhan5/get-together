<?php
/* Author: Imzan Khan
 * Feature: Playlists
 * Description: Gets the amount of songs within playlist
 * 
 *              Note: Works, but not currently used anywhere
 *              in the feature.
 * Date Created: March 20th, 2019
 * Last Modified: April 15th, 2019
 * Recent Changes: Refactored Code, added comments
*/
require_once '../model/database.php';
require_once '../model/playlist_db.php';

$pid = $_POST['pid'];
$p = new PlaylistDB();
$song_count = $p->getSongCount($pid);

$jsonprod = json_encode($song_count);

header('Content-Type: Application/json');
echo $jsonprod;