<?php
require_once '../model/database.php';
require_once '../model/playlist_db.php';

if(isset($_POST['deleteplaylist'])){
    $id = $_POST['playlistID'];
    $p = new PlaylistDB;
    $playlist = $p->getPlaylistByID($id);
}

if (isset($_POST['delete_playlist'])) {
    $p = new PlaylistDB();
    $playlist_id = $_POST['playlist_id'];
    $p->deletePlaylist($playlist_id);
    header("Location: playlists.php");
    exit;
}
?>
<!-- Form for editting a payment -->
<h2>Delete Playlist: </h2>
<form method="post" action="">
    <input type="hidden" name="playlist_id" value="<?= $playlist->playlist_id; ?>" />
    <p>Are you sure you want to delete the following playlist? </p>
    <label for="name">Playlist Name: </label>
    <input type="text" name="name" value='<?= $playlist->name ?>'><br />
    <input type="submit" name="delete_playlist" value="Delete Playlist">
</form>