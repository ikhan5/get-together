<?php
/* Author: Imzan Khan
 * Feature: Playlists
 * Description: Gets desired Playlist information
 *              and confirms whether or not the user
 *              wants to delete the playlist.           
 * Date Created: March 20th, 2019
 * Last Modified: April 15th, 2019
 * Recent Changes: Refactored Code, added comments
 */
require_once '../model/database.php';
require_once '../model/playlist_db.php';

if(isset($_POST['deleteplaylist'])){
    $event_id =  $_POST['eid'];
    $id = $_POST['playlistID'];
    $p = new PlaylistDB;
    $playlist = $p->getPlaylistByID($id);
}

if (isset($_POST['delete_playlist'])) {
    $p = new PlaylistDB();
    $playlist_id = $_POST['playlist_id'];
    $event_id =  $_POST['event_id'];
    $p->deletePlaylist($playlist_id);
    header("Location: index.php?eid=$event_id");
    exit;
}
include "playlistHeader.php";
?>
<!-- Form for deleting a payment -->

<div id="playlists_container">
    <a href="index.php?eid=<?=$event_id?>">
        <i class="fas fa-arrow-left" id="to-playlists"> Back to Playlists</i>
    </a>
    <h2 class="heading-style3">Delete Playlist: </h2>
    <form method="post" action="">
        <input type="hidden" name="event_id" value="<?= htmlspecialchars($event_id); ?>" />
        <input type="hidden" name="playlist_id" value="<?= $playlist->playlist_id; ?>" />
        <p>Are you sure you want to delete the following playlist? </p>
        <div>
            <label for="name">Playlist Name: </label>
            <?= htmlspecialchars($playlist->name) ?>
        </div>
        <input class="btn1 form-action" type="submit" name="delete_playlist" value="Delete Playlist">
    </form>
</div>