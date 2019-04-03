<?php

class Notification 
{
    public function insertNotification()
    {
        $dbcon = Database::getDb();
        $sql = "INSERT INTO funds (money_pool_id, amount, payment_method, user_id) 
        values(:pool_id,:amount,:payment_method, :user_id)";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':pool_id', $pool_id);
        $pst->bindParam(':amount', $amount);
        $pst->bindParam(':payment_method', $payment_method);
        $pst->bindParam(':user_id', $user_id);
        $count = $pst->execute();

        if ($count) {
            $message = 'Payment Successful!';
        } else {
            $message = 'Payment Failed...';
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