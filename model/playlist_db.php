<?php

class PlaylistDB
{
    public static function addSongsToPlaylist($items, $playlist_id){
        $dbcon = Database::getDB();
        $items = array();
        $sql='';
        foreach($items as $item){
            $sql .= "INSERT INTO playlists_songs (song_id, playlist_id) 
            VALUES (:song_id, :playlist_id);";
            $pst->bindParam(':song_id', $item);
            $pst->bindParam(':playlist_id', $playlist_id);
        }
        echo $sql;
        // $pst = $dbcon->prepare($sql);
        // $pst->bindParam(':song_id', $item);
        // $pst->bindParam(':event_id', $playlist_id);

        // $count = $pst->execute();
        // return $count;
    }

    public static function getAllSongs() {
        $dbcon = Database::getDb();
        $sql = "SELECT * FROM songs";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();
        $songs = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $songs;
    }

    public static function getAllSongsByID($playlist_id)
    {
        $dbcon = Database::getDb();
        
        $sql = "SELECT songs.* from songs inner join playlists_songs 
        on songs.song_id = playlists_songs.song_id 
        where playlists_songs.playlist_id = :playlist_id
        order by playlists_songs.position";

        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam('playlist_id', $playlist_id);
        $pdostm->execute();

        $songs = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $songs;
    }

    public function editSongOrder($playlist_id,$song_id ,$position)
    {
        $dbcon = Database::getDB();
        $sql = "UPDATE playlists_songs set playlists_songs.position=:position 
        WHERE playlist_id = :playlist_id AND song_id= :song_id";
        $pst = $dbcon->prepare($sql);

        $pst->bindParam(':position', $position);
        $pst->bindParam(':song_id', $song_id);
        $pst->bindParam(':playlist_id', $playlist_id);

        $count = $pst->execute();
        return $count;
    }

    public static function getAllPlaylists() {
        $dbcon = Database::getDb();
        $sql = "SELECT * FROM playlists";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();
        $playlists = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $playlists;
    }

    public static function getPlaylistByID($playlist_id)
    {
        $dbcon = Database::getDb();
        $sql = "SELECT * FROM playlists WHERE playlist_id=:playlist_id";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam('playlist_id', $playlist_id);
        $pdostm->execute();

        $playlist =  $pdostm->fetch(PDO::FETCH_OBJ);
        return $playlist;
    }

    public function addPlaylist($name, $desc, $date, $event_id)
    {
        $dbcon = Database::getDB();

        $sql = "INSERT INTO playlists (name, description, created, event_id) 
              VALUES (:name, :desc, :date, :event_id) ";
        $pst = $dbcon->prepare($sql);

        $pst->bindParam(':name', $name);
        $pst->bindParam(':desc', $desc);
        $pst->bindParam(':date', $date);
        $pst->bindParam(':event_id', $event_id);

        $count = $pst->execute();
        return $count;
    }

    public function editPlaylist($name, $description, $date, $playlist_id)
    {
        $dbcon = Database::getDB();
        $sql = "UPDATE playlists set name=:name, description=:desc, created=:date 
        WHERE playlist_id = :playlist_id";
        $pst = $dbcon->prepare($sql);

        $pst->bindParam(':name', $name);
        $pst->bindParam(':desc', $description);
        $pst->bindParam(':date', $date);
        $pst->bindParam(':playlist_id', $playlist_id);

        $count = $pst->execute();
        return $count;
    }

    public function deletePlaylist($playlist_id)
    {
        $dbcon = Database::getDB();
        $sql = "DELETE FROM playlists_songs WHERE playlists_songs.playlist_id = :playlist_id;";
        $sql .= "DELETE FROM playlists WHERE playlists.playlist_id = :playlist_id;";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':playlist_id', $playlist_id);
        $count = $pst->execute();

        return $count;
    }
}