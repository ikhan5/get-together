<?php
require_once '../model/database.php';
require_once '../model/playlist_db.php';

if(isset($_POST['editplaylist'])){
    $id = $_POST['playlistID'];
    $p = new PlaylistDB;
    $playlist = $p->getPlaylistByID($id);
}

if (isset($_POST['edit_playlist'])) {
    $p = new PlaylistDB();
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $date = $_POST['date'];
    $playlist_id = $_POST['playlist_id'];
    $p->editPlaylist($name, $desc, $date, $playlist_id);
    header("Location: playlists.php");
    exit;
}
?>
<!-- Form for editting a payment -->
<h2>Edit Playlist: </h2>
<form method="post" action="">
    <input type="hidden" name="playlist_id" value="<?= htmlspecialchars($playlist->playlist_id); ?>" />
    <label for="name">Playlist Name: </label>
    <input type="text" name="name" value='<?= htmlspecialchars($playlist->name) ?>'><br />
    <label for="name">Playlist Description: </label>
    <input type="text" name="desc" value='<?= htmlspecialchars($playlist->description) ?>'><br />
    <input type="hidden" name="date" value='<?=htmlspecialchars(date("Y-m-d"))?>' /> <br />
    <input type="submit" name="edit_playlist" value="Update Playlist">
</form>