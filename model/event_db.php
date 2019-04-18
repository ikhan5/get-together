<?php
/* Author:          Bibek Shrestha
 * Feature:         Events
 * Description:     A model class to handle all requests from event controller to the db
 * Date Created:    March 4th, 2019
 * Last Modified:   April 17th, 2019
 * Recent Changes:  fix bugs
 */

class EventDB
{
  public static function getAllEvents() {
      $dbcon = Database::getDb();
      $sql = "SELECT * FROM events";
      $pdostm = $dbcon->prepare($sql);
      $pdostm->execute();
      $rows = $pdostm->fetchAll();
      $pdostm->closeCursor();
      // $events = $pdostm->fetchAll(PDO::FETCH_OBJ);
      $events = array();
      foreach($rows as $row){
          $event = new Event($row['title'],$row['description'], $row['location'], $row['date'], $row['start_time'], $row['end_time']);
          $event->setId($row['id']);
          $events[] = $event;
      }
      return $events;
  }

  public static function addEvent($event) {
      $dbcon = Database::getDb();

      $title = $event->getTitle();
      $description = $event->getDescription();
      $location = $event->getLocation();
      $date = $event->getDate();
      $start_time = $event->getStartTime();
      $end_time = $event->getEndTime();

      $sql = "INSERT INTO events (title, description, location, date, start_time, end_time) 
            VALUES (:title, :description, :location, :date, :start_time, :end_time) ";
      $pdostm = $dbcon->prepare($sql);
      $pdostm->bindParam(':title', $title);
      $pdostm->bindParam(':description', $description);
      $pdostm->bindParam(':location', $location);
      $pdostm->bindParam(':date', $date);
      $pdostm->bindParam(':start_time', $start_time);
      $pdostm->bindParam(':end_time', $end_time);
      $pdostm->execute();
      $eid = $dbcon->lastInsertId();
      $pdostm->closeCursor();
      return $eid;
  }

  public static function addEventUser($event_user) {
    $dbcon = Database::getDb();

    $uid = $event_user->getUserId();
    $eid = $event_user->getEventId();
    $ishost = $event_user->getIsHost();
    $hasrsvp = $event_user->getHasRsvp();

    $sql = "INSERT INTO events_users (user_id, event_id, is_host, has_rsvp)
          VALUES (:uid, :eid, :ishost, :hasrsvp)";

    $pdostm = $dbcon->prepare($sql);
    $pdostm->bindParam(':uid', $uid);
    $pdostm->bindParam(':eid', $eid);
    $pdostm->bindParam(':ishost', $ishost);
    $pdostm->bindParam(':hasrsvp', $hasrsvp);
    $pdostm->execute();
    $pdostm->closeCursor();
  }

  public static function getEvent($id) {
      $dbcon = Database::getDb();

      $sql = "SELECT * FROM events WHERE id = :id";
      $pdostm = $dbcon->prepare($sql);
      $pdostm->bindParam(':id', $id);
      $pdostm->execute();
      $row = $pdostm->fetch();
      $pdostm->closeCursor();

      $event = new Event($row['title'], $row['description'], $row['location'], $row['date'], $row['start_time'], $row['end_time']);
      $event->setId($id);
      return $event;
  }

  public static function getEventsByUser($uid) {
    $dbcon = Database::getDb();

    $sql = "SELECT * 
        FROM events_users eu
        JOIN events e ON e.id = eu.event_id
        WHERE eu.user_id = :uid";
    $pdostm = $dbcon->prepare($sql);
    $pdostm->bindParam(':uid', $uid);
    $pdostm->execute();
    $rows = $pdostm->fetchAll();
    $pdostm->closeCursor();

    $events = array();
    foreach($rows as $row){
        $event = new Event($row['title'],$row['description'], $row['location'], $row['date'], $row['start_time'], $row['end_time']);
        $event->setId($row['id']);
        $events[] = $event;
    }
    return $events;
  }

  public static function updateEvent($event) {
      $dbcon = Database::getDb();

      $id = $event->getId();
      $title = $event->getTitle();
      $description = $event->getDescription();
      $location = $event->getLocation();
      $date = $event->getDate();
      $start_time = $event->getStartTime();
      $end_time = $event->getEndTime();

      $sql = "UPDATE events SET title = :title, description = :description, location = :location, date = :date, start_time = :start_time, end_time = :end_time WHERE id = :id";
      $pdostm = $dbcon->prepare($sql);
      $pdostm->bindParam(':title', $title);
      $pdostm->bindParam(':description', $description);
      $pdostm->bindParam(':location', $location);
      $pdostm->bindParam(':date', $date);
      $pdostm->bindParam(':start_time', $start_time);
      $pdostm->bindParam(':end_time', $end_time);
      $pdostm->bindParam(':id', $id);
      $pdostm->execute();
      $pdostm->closeCursor();
  }

  public static function deleteEvent($id) {
      $dbcon = Database::getDb();

      $sql = "DELETE FROM events WHERE id = :id";
      $pdostm = $dbcon->prepare($sql);
      $pdostm->bindParam(':id', $id);
      $pdostm->execute();
      $pdostm->closeCursor();
  }

  public static function IsHost($user_id, $event_id){
    $dbcon = Database::getDB();
    $sql =  "SELECT is_host FROM events_users WHERE user_id=:user_id AND event_id=:event_id";
    $pdostm = $dbcon->prepare($sql);
    $pdostm->bindParam(":user_id",$user_id);
    $pdostm->bindParam(":event_id",$event_id);
    $pdostm->execute();
    $row = $pdostm->fetch();
    if ($row["is_host"]) {
      return true;
    } else {
      return false;
    }
  }

  public static function validateUserEvent($uid, $eid) {
    $dbcon = Database::getDb();

    $sql = "SELECT * FROM events_users WHERE user_id = :uid and event_id = :eid";
    $pdostm = $dbcon->prepare($sql);
    $pdostm->bindParam(":uid", $uid);
    $pdostm->bindParam(":eid", $eid);
    $pdostm->execute();
    $row = $pdostm->fetch();
    $pdostm->closeCursor();
    if($row){
      return true;
    } else {
      return false;
    }
  }
}