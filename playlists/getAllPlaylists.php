<?php
/* Author: Imzan Khan
 * Feature: Playlists
 * Description: Gets all the playlists based on event id
 * Date Created: March 20th, 2019
 * Last Modified: April 15th, 2019
 * Recent Changes: Refactored Code, added comments, added Event ID
 *                 GET parameter
*/
require_once '../model/database.php';
require_once '../model/playlist_db.php';

$event_id = $_GET['eventid'];
$p = new PlaylistDB();
$playlists = $p->getAllPlaylists($event_id);
$jsonprod = json_encode($playlists);

header('Content-Type: Application/json');
echo $jsonprod;