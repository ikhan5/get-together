<?php
require_once '../model/database.php';
require_once '../model/playlist_db.php';
$playlist_id = $_GET['pid'] ?: 1;

if(isset($_POST['addsongs'])){
    $songs = $_POST['songs_added'];
    $p = new PlaylistDB();
    foreach($songs as $song){
        $c = $p->addSongsToPlaylist($song, $playlist_id);
        header("Location: playlists.php");
    exit;
    }
}
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
<body>
    <!--Search Bar and Header-->
    <header>
        <div class="searchbar">
            <a class="searchbar__button" href="#">
                <i class="fas fa-search"></i>
            </a>
            <input class="searchbar__input" type="search" placeholder="Search...">
        </div>
    </header>
    <section id="song_listings">
        <a href="playlists.php">
            <i class="fas fa-arrow-left"> Back to Playlists</i>
        </a>
        <h1 class="heading-style" id="song-listings__header">Add songs to your playlist!</h1>

        <form method="POST" id="addToPlaylist">
            <input type="submit" class='btn' value='Add Songs' />
        </form>

        <table>
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