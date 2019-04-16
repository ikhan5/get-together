<?php
/* Author: Imzan Khan
 * Feature: Playlists
 * Description: Gets all the songs in the database
 * Date Created: March 20th, 2019
 * Last Modified: April 15th, 2019
 * Recent Changes: Refactored Code, added comments
*/
require_once '../model/database.php';
require_once '../model/playlist_db.php';

$p = new PlaylistDB();
$songs = $p->getAllSongs();
$jsonprod = json_encode($songs);

header('Content-Type: Application/json');
echo $jsonprod;