<?php
/* Author: Imzan Khan
 * Feature: Playlists
 * Description: Displays all the playlists from the event
 *              and provides the users with all the playlist
 *              options. When a playlist is selected, the 
 *              playlists respective songs are displayed 
 *              and can be played via the YouTube container 
 *              when a song is selected.
 * 
 *              Note: For future implentation, I would use the 
 *              YouTube API to get more songs in the database
 *              as well as allow the songs to play in order of
 *              position. 
 * Date Created: March 20th, 2019
 * Last Modified: April 15th, 2019
 * Recent Changes: Refactored Code, added comments
*/
session_start();
$pagetitle = 'Manage Your Playlists';
include($_SERVER['DOCUMENT_ROOT'].'/loggedin_header.php');
    
    $event_id =  $_GET['eid'];
?>

<div class="playlists_body">
    <div id="playlist-page__head">
        <h1 class="heading-style2">Playlists</h1>
        <input class="playlist__event" type="hidden" name="playlist__event" value="<?=$event_id?>" />
        <span class="playlist-page__create">
            <i class="fas fa-plus-circle"></i>
            <h3>Create A Playlist</h3>
        </span>
    </div>
    <section class="embed-container">
        <center> <iframe width="640" height="480" src="https://www.youtube.com/embed/" frameborder="0"
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe></center>
    </section>

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
            <form action="addplaylist.php" method="post" id="createplaylist">
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
                <input class="playlist__event" type="hidden" name="playlist__event" value="<?=$event_id?>" />
                <div class=" form-submit">
                    <input type="submit" value="Create" class="create_button">
                </div>
            </form>
        </div>
    </section>
</div>
<?php
    include($_SERVER['DOCUMENT_ROOT'].'/loggedin_footer.php');
?>