<?php

class Notification 
{
    public static function getAllNotifications() {
        $dbcon = Database::getDb();
        $sql = "SELECT * FROM notifications";
        $pst = $dbcon->prepare($sql);
        $pst->execute();
        $notifications = $pst->fetchAll(PDO::FETCH_OBJ);
        return $notifications;
    }

    public function insertNotification($subject,$message,$user_id, $event_id, $time)
    {
        $dbcon = Database::getDb();
        $sql = "INSERT INTO notifications (notification_subject,notification_message, user_id, event_id, time) 
        values(:subject,:message,:user_id,:event_id, :time)";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':subject', $subject);
        $pst->bindParam(':message', $message);
        $pst->bindParam(':user_id', $user_id);
        $pst->bindParam(':event_id', $event_id);
        $pst->bindParam(':time', $time);
        $count = $pst->execute();

        if ($count) {
            $message = 'Insert Successful!';
        } else {
            $message = 'Insert Failed...';
        }
        return $message;
    }

    public function getUsersByEventID($event_id){
        $dbcon = Database::getDB();
        $sql = "SELECT * from users
         INNER JOIN events_users on users.id = events_users.user_id 
        WHERE events_users.event_id = :event_id AND events_users.has_rsvp =1 AND events_users.allow_notif =1";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':event_id', $event_id);
        $pst->execute();
        $users = $pst->fetchAll(PDO::FETCH_OBJ);
        $pst->closeCursor();
        return $users;
    }
}