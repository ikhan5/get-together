<?php
/* Author: Imzan Khan
 * Feature: Playlists
 * Description: Gets Playlist information and 
 *              allows the user to edit the playlist
 *              name and/or description. New inputs
 *              are validated then updated in the database.          
 * Date Created: March 20th, 2019
 * Last Modified: April 15th, 2019
 * Recent Changes: Refactored Code, added comments
 */
require_once '../model/database.php';
require_once '../model/playlist_db.php';
$errormsg =$newname=$newdesc='';
if(isset($_POST['editplaylist'])){
    $id = $_POST['playlistID'];
    $p = new PlaylistDB;
    $playlist = $p->getPlaylistByID($id);
    $newid=$playlist->playlist_id;
    $newname = $playlist->name;
    $newdesc=$playlist->description;
}

if (isset($_POST['edit_playlist'])) {
    $p = new PlaylistDB();
    $name = filter_input(INPUT_POST, 'name');
    $desc = filter_input(INPUT_POST, 'desc', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $date = $_POST['date'];
    $playlist_id = $_POST['playlist_id'];

    if ($name == null || $desc == null) {
        $errormsg = ": Incomplete data. Please enter information in all fields.";
    }elseif(strlen($name) > 25){
        $errormsg = ": Playlist name must be less than 25 Characters";
    }elseif(strlen($desc) > 250){
        $errormsg = ": Description must be less than 250 Characters";
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
        <input type="hidden" name="playlist_id" value="<?= htmlspecialchars($newid); ?>" />
        <label for="name">Playlist Name: </label>
        <span class="required">*</span>
        <input type="text" name="name" value='<?= htmlspecialchars($newname) ?>' maxlength="15"><br />
        <label for="name">Playlist Description: </label>
        <span class="required">*</span>
        <input type="text" name="desc" value='<?= htmlspecialchars($newdesc) ?>'><br />
        <input type="hidden" name="date" value='<?=htmlspecialchars(date("Y-m-d"))?>' /> <br />
        <input class="btn2 form-action" type="submit" name="edit_playlist" value="Update Playlist">
    </form>
</div>