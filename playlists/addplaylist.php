<?php
/* Author: Imzan Khan
 * Feature: Playlists
 * Description: When the '+ Create a Playlist' link is 
 *              clicked on the Playlists index page the Create 
 *              Modal is directed to. The inputs are validated 
 *              and allows the user to insert a new playlist into
 *              the 'playlists' table.            
 * Date Created: March 20th, 2019
 * Last Modified: April 15th, 2019
 * Recent Changes: Refactored Code, added comments
 */
require_once '../model/database.php';
require_once '../model/playlist_db.php';

$name = filter_input(INPUT_POST, 'playlist__name');
$desc = filter_input(INPUT_POST, 'playlist__desc', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$date = $_POST['playlist__date'] ?? date('Y-m-d H:i:s');
$event = $_POST['playlist__event'];

if ($name == null || $desc == null) {
    $error = "Incomplete data. Please enter information in all fields.";
    include('errorHandler.php');
}elseif(strlen($name) > 15){
    $error = "Playlist name must be less than 20 Characters";
    include('errorHandler.php');
}elseif(strlen($desc > 250)){
    $error = "Description must be less than 250 Characters";
    include('errorHandler.php');
}elseif($event == null){
    $error = "Error with event. Please select the event you wish to create the playlist for";
    include('errorHandler.php');
}
else{
    $p = new PlaylistDB();
    $c = $p->addPlaylist($name, $desc, $date, $event);
    header("Location: index.php");
}