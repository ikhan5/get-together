<!DOCTYPE html>
<html lang="en">
<?php
    include "playlistHeader.php";
?>

<body>
    <header>
        <div id="playlist-page__head">
            <h1 class="heading-style2">Playlists</h1>
            <span class="playlist-page__create">
                <i class="fas fa-plus-circle"></i>
                <h3>Create A Playlist</h3>
            </span>
        </div>
    </header>
    <div class="playlists__layout">
        <!--Playlist Listings-->
        <section id="playlists"></section>
        <div class="divider">
        </div>
        <!--Song Listings for each Playlist-->
        <h2 id="songs_header" class="heading-style">Songs</h2>
        <section id="songs" class="sortable"></section>
    </div>
    <!--Create a new Playlist Modal-->
    <section id="playlistForm">
        <div class="playlistForm">
            <div class="required">* Required Fields <span class="errorDisplay"></span></div>
            <span class="close">X</span>
            <h2>Create a New Playlist</h2>
            <form action="addPlaylist.php" method="post" id="createplaylist">
                <div class="form-field">
                    <span class="required">*</span>
                    <label for="playlist__name">Name: </label>
                    <input type="text" value="Playlist" id="playlist__name" name="playlist__name" maxlength="15">
                </div>
                <div class="form-field">
                    <span class="required">*</span>
                    <label for="playlist__desc">Description: </label>
                    <textarea name="playlist__desc" id="playlist__desc" cols="16" rows="5"></textarea>
                </div>
                <input type="hidden" name="playlist__date" value="<?=date('Y-m-d H:i:s')?>" />
                <input type="hidden" name="playlist__event" value="2" />

                <div class="form-submit">
                    <input type="submit" value="Create" class="create_button">
                </div>
            </form>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script src="../scripts/playlists.js"></script>
</body>

</html>