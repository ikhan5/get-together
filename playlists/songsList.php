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
require_once '../model/database.php';
require_once '../model/playlist_db.php';

$event_id = $_POST['eid'];
$playlist_id = $_POST['pid'];
$p = new PlaylistDB();
$playlist = $p->getPlaylistByID($playlist_id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Songs</title>
    <link rel="stylesheet" href="../CSS/songs.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script src="../scripts/songs.js"></script>
</body>

</html>