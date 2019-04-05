<?php

class Notification 
{
    public static function getAllNotificationsByUserID($user_id, $limit = 0) {
        $dbcon = Database::getDb();
        $sql = "SELECT * FROM notifications where user_id =:user_id order by time desc ";
        if($limit){
            $sql .= " LIMIT :limit";
            $pst = $dbcon->prepare($sql);
            $pst->bindValue(":limit",$limit,PDO::PARAM_INT);
        }
        else{
            $pst = $dbcon->prepare($sql);
        }
        $pst->bindParam(":user_id", $user_id);
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

    public function getNotificationById($id){
        $dbcon = Database::getDB();
        $sql =  "SELECT * from notifications where 
        id=:id";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(":id",$id);
        $pst->execute();
        $notification = $pst->fetch(PDO::FETCH_OBJ);
        return $notification;
    }

    public function deleteNotification($id){
        $dbcon = Database::getDB();
        $sql = "DELETE from notifications where id=:id";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(":id",$id);
        $pst->execute();
        $pst->closeCursor();
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