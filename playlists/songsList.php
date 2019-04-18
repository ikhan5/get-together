<?php
/* Author: Imzan Khan
 * Feature: Playlists
 * Description: Displays all the songs from the database
 *              and allows the users to add songs to the 
 *              select playlist. A success message is displayed 
 *              when a song is added to the playlist, and the user
 *              can either select more songs or go back to index
 *              page.
 * 
 *              Note: For future implentation, I would use the 
 *              YouTube API to get more songs in the database
 *              as well as allow the songs to play in order of
 *              position. Songs are currently added manually.
 * Date Created: March 20th, 2019
 * Last Modified: April 15th, 2019
 * Recent Changes: Refactored Code, added comments
*/
session_start();
require_once '../model/database.php';
require_once '../model/playlist_db.php';

$event_id = $_POST['eid'];
$playlist_id = $_POST['pid'];
$p = new PlaylistDB();
$playlist = $p->getPlaylistByID($playlist_id);

$pagetitle = "Add Songs To Your Playlist";
include($_SERVER['DOCUMENT_ROOT'].'/loggedin_header.php');
?>

<body class="songs_body">
    <section id="song_listings">
        <a href="index.php?eid=<?=$event_id?>">
            <i class="fas fa-arrow-left"> Back to Playlists</i>
        </a>
        <p class="confirmation"></p>
        <h1 class="heading-style" id="song-listings__header">Add songs to your playlist!</h1>
        <h2>Playlist: <?=$playlist->name?></h2>
        <p><?=$playlist->description?></p>
        <form action="" method="POST" id="addToPlaylist">
            <input type="hidden" id="pid" value="<?=$playlist_id?>" />
            <button type="submit" class='btn1 float-right'>Add Songs</button>
        </form>

        <table class="songs_table">
            <thead>
                <tr>
                    <th>Add to Playlist</th>
                    <th>Track Name</th>
                    <th>Artist</th>
                    <th>Length</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </section>


    <?php
    include($_SERVER['DOCUMENT_ROOT'].'/loggedin_footer.php');
?>