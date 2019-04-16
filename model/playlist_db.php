<?php
/* Author: Imzan Khan
 * Feature: Playlists
 * Description: The Playlist Class acts as the interface between the Playlist
 *              Views and the Database. The queries in each function are prepared, binded,
 *              and executed to prevent sql injections            
 * Date Created: March 20th, 2019
 * Last Modified: April 15th, 2019
 * Recent Changes: Refactored Code, added Comments
 */
class PlaylistDB
{
/* Description: Used to add songs to a specific playlist
 * Input: Song ID, Playlist ID
 * Output: None
*/
    public static function addSongsToPlaylist($song, $playlist_id){
        $dbcon = Database::getDb();
        $sql = "INSERT INTO playlists_songs (song_id, playlist_id) 
        VALUES (:song_id, :playlist_id)";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':song_id', $song);
        $pst->bindParam(':playlist_id', $playlist_id);
        $count = $pst->execute();
        return $count;
    }
/* Description: Used to get all songs from the database
 * Input: None
 * Output: All songs
*/
    public static function getAllSongs() {
        $dbcon = Database::getDb();
        $sql = "SELECT * FROM songs";
        $pst = $dbcon->prepare($sql);
        $pst->execute();
        $songs = $pst->fetchAll(PDO::FETCH_OBJ);
        return $songs;
    }
/* Description: Used to get the song count from 
                a specific playlist
 * Input: Playlist ID
 * Output: Number of songs in the Playlist
*/
    public static function getSongCount($playlist_id) {
        $dbcon = Database::getDb();
        $sql = "SELECT COUNT(playlists_songs.song_id) as Song_Count FROM playlists_songs 
        WHERE playlists_songs.playlist_id =:playlist_id";
        
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':playlist_id', $playlist_id);
        $pst->execute();

        $song_count =  $pst->fetch(PDO::FETCH_OBJ);
        return $song_count;
    }
/* Description: Used to get all the songs from 
                a specific playlist
 * Input: Playlist ID
 * Output: All songs in that Playlist
*/
    public static function getAllSongsByID($playlist_id)
    {
        $dbcon = Database::getDb();
        
        $sql = "SELECT songs.*, playlists_songs.playlist_song_id from songs inner join playlists_songs 
        on songs.song_id = playlists_songs.song_id 
        where playlists_songs.playlist_id = :playlist_id
        order by playlists_songs.position";

        $pst = $dbcon->prepare($sql);
        $pst->bindParam('playlist_id', $playlist_id);
        $pst->execute();

        $songs = $pst->fetchAll(PDO::FETCH_OBJ);
        return $songs;
    }
/* Description: Used to update the order of the songs in
                a specific playlist
 * Input: Playlist ID, Song ID, Song Position in Playlist
 * Output: None
*/
    public function editSongOrder($playlist_id,$song_id ,$position)
    {
        $dbcon = Database::getDb();
        $sql = "UPDATE playlists_songs set playlists_songs.position=:position 
        WHERE playlist_id = :playlist_id AND song_id= :song_id";
        $pst = $dbcon->prepare($sql);

        $pst->bindParam(':position', $position);
        $pst->bindParam(':song_id', $song_id);
        $pst->bindParam(':playlist_id', $playlist_id);

        $count = $pst->execute();
        return $count;
    }
/* Description: Delete a song from a specific playlist
 * Input: Playlists_Songs ID
 * Output: None
*/
    public function deleteSongFromPlaylist($id)
    {
        $dbcon = Database::getDB();
        $sql = "DELETE FROM playlists_songs WHERE playlists_songs.playlist_song_id= :id";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();
        return $count;
    }
/* Description: Gets all the playlists for a certain event
 * Input: Event ID
 * Output: All Playlists
*/
    public static function getAllPlaylists($event_id) {
        $dbcon = Database::getDb();
        $sql = "SELECT * FROM playlists where event_id =:event_id;";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':event_id', $event_id);
        $pst->execute();
        $playlists = $pst->fetchAll(PDO::FETCH_OBJ);
        return $playlists;
    }
/* Description: Gets a specific playlist from the database
 * Input: Playlist ID
 * Output: Playlist based on ID
*/
    public static function getPlaylistByID($playlist_id)
    {
        $dbcon = Database::getDb();
        $sql = "SELECT * FROM playlists WHERE playlist_id=:playlist_id";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam('playlist_id', $playlist_id);
        $pst->execute();

        $playlist =  $pst->fetch(PDO::FETCH_OBJ);
        return $playlist;
    }
/* Description: Adds a new Playlist to the database
 * Input: Playlist Name, Playlist Description, Date Created
 *        Event ID
 * Output: None
*/
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
/* Description: Edits an existing Playlist from the database
 * Input: Playlist Name, Playlist Description, Date Created
 *        Playlist ID
 * Output: None
*/
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
/* Description: Deletes an existing Playlist from the database
 * Input: Playlist ID
 * Output: None
*/
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