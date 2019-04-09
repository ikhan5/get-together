<?php
class CarpoolChatDB
{
  public static function getAllChats() {
    $dbcon = Database::getDb();
    $sql = "SELECT * FROM carpool_chats";
    $pdostm = $dbcon->prepare($sql);
    $pdostm->execute();
    $rows = $pdostm->fetchAll();
    $pdostm->closeCursor();
    $chats = array();
    foreach($rows as $row) {
      $chat = new CarpoolChat($row['event_id'], $row['file_name']);
      $chat->setId($row['id']);
      $chats[] = $chat;
    }
    return $chats;
  }

  public static function getChat($id) {
    $dbcon = Database::getDb();
      $sql = "SELECT * FROM carpool_chats WHERE id = :id";
      $pdostm = $dbcon->prepare($sql);
      $pdostm->bindParam(':id', $id);
      $pdostm->execute();
      $row = $pdostm->fetch();
      $pdostm->closeCursor();

      if ($row) {
        $chat = new CarpoolChat($row['event_id'], $row['file_name']);
        $chat->setId($id);
        return $chat;
      } else {
        return false;
      }
  }

  public static function getChatByEventId($event_id) {
    $dbcon = Database::getDb();

        $sql = "SELECT * FROM carpool_chats WHERE event_id = :event_id";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':event_id', $event_id);
        $pdostm->execute();
        $row = $pdostm->fetch();
        $pdostm->closeCursor();

        if ($row) {
          $chat = new CarpoolChat($row['event_id'], $row['file_name']);
          $chat->setId($row['id']);
          return $chat;
        } else {
          return false;
        }
  }

  public static function addCarpoolChat($chat) {
    $dbcon = Database::getDb();

    $event_id = $chat->getEventId();
    $file_name = $chat->getFileName();

    $chat = CarpoolChatDB::getChatByEventId($event_id);
    if ($chat) {
      $error_message = 'A carpool chat for the provided event already exists';
      include('add.php');
      exit();
    }

    $sql = "INSERT INTO carpool_chats (event_id, file_name) 
          VALUES (:event_id, :file_name) ";
    $pdostm = $dbcon->prepare($sql);
    $pdostm->bindParam(':event_id', $event_id);
    $pdostm->bindParam(':file_name', $file_name);
    $pdostm->execute();
    $pdostm->closeCursor();
  }
}