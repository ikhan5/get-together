<?php
require_once '../model/database.php';
require_once '../model/playlist_db.php';
$errormsg ='';
if(isset($_POST['editplaylist'])){
    $id = $_POST['playlistID'];
    $p = new PlaylistDB;
    $playlist = $p->getPlaylistByID($id);
}

if (isset($_POST['edit_playlist'])) {
    $p = new PlaylistDB();
    $name = filter_input(INPUT_POST, 'name');
    $desc = filter_input(INPUT_POST, 'desc', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $date = $_POST['date'];
    $playlist_id = $_POST['playlist_id'];

    if ($name == null || $desc == null) {
        $errormsg = "Incomplete data. Please enter information in all fields.";
    }
    else{
        $p->editPlaylist($name, $desc, $date, $playlist_id);
        header("Location: index.php");
    }
}
include "playlistHeader.php";
?>
<!-- Form for editting a payment -->
<div id="container">
    <a href="index.php" id="to-playlists">
        <i class="fas fa-arrow-left"> Back to Playlists</i>
    </a>
    <h2 class="heading-style2">Edit Playlist: </h2>
    <div class="required">* Required Fields <span class="errorDiplay"><?=$errormsg?></span></div>
    <form method="post" action="">
        <input type="hidden" name="playlist_id" value="<?= htmlspecialchars($playlist->playlist_id); ?>" />
        <label for="name">Playlist Name: </label>
        <span class="required">*</span>
        <input type="text" name="name" value='<?= htmlspecialchars($playlist->name) ?>'><br />
        <label for="name">Playlist Description: </label>
        <input type="text" name="desc" value='<?= htmlspecialchars($playlist->description) ?>'><br />
        <input type="hidden" name="date" value='<?=htmlspecialchars(date("Y-m-d"))?>' /> <br />
        <input class="btn2 form-action" type="submit" name="edit_playlist" value="Update Playlist">
    </form>
</div>