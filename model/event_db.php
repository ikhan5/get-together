<?php

class EventDB
{
    public static function getAllEvents() {
        $dbcon = Database::getDb();
        $sql = "SELECT * FROM event";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();
        $rows = $pdostm->fetchAll();
        $pdostm->closeCursor();
        // $events = $pdostm->fetchAll(PDO::FETCH_OBJ);
        $events = array();
        foreach($rows as $row){
            $event = new Event($row['title'], $row['location'], $row['date'], $row['start_time'], $row['end_time']);
            $event->setId($row['id']);
            $events[] = $event;
        }
        return $events;
    }

    public static function addEvent($event) {
        $dbcon = Database::getDb();

        $title = $event->getTitle();
        $location = $event->getLocation();
        $date = $event->getDate();
        $start_time = $event->getStartTime();
        $end_time = $event->getEndTime();

        $sql = "INSERT INTO event (title, location, date, start_time, end_time) 
              VALUES (:title, :location, :date, :start_time, :end_time) ";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':title', $title);
        $pdostm->bindParam(':location', $location);
        $pdostm->bindParam(':date', $date);
        $pdostm->bindParam(':start_time', $start_time);
        $pdostm->bindParam(':end_time', $end_time);
        $pdostm->execute();
        $pdostm->closeCursor();
    }

    public static function getEvent($id) {
        $dbcon = Database::getDb();

        $sql = "SELECT * FROM event WHERE id = :id";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $pdostm->execute();
        $row = $pdostm->fetch();
        $pdostm->closeCursor();

        $event = new Event($row['title'], $row['location'], $row['date'], $row['start_time'], $row['end_time']);
        $event->setId($id);
        return $event;
    }

    public static function updateEvent($event) {
        $dbcon = Database::getDb();

        $id = $event->getId();
        $title = $event->getTitle();
        $location = $event->getLocation();
        $date = $event->getDate();
        $start_time = $event->getStartTime();
        $end_time = $event->getEndTime();

        $sql = "UPDATE event SET title = :title, location = :location, date = :date, start_time = :start_time, end_time = :end_time WHERE id = :id";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':title', $title);
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

        $sql = "DELETE FROM event WHERE id = :id";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $pdostm->execute();
        $pdostm->closeCursor();
    }
}