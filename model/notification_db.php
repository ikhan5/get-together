<?php
/* Author: Imzan Khan
 * Feature: Notifications
 * Description: The Notification Class acts as the interface 
 *              between the Notification Views and the Database. 
 *              The queries in each function are prepared, binded,
 *              and executed to prevent sql injections            
 * Date Created: April 1st, 2019
 * Last Modified: April 11th, 2019
 * Recent Changes: Refactored Code, added Comments
 */
class Notification 
{
/* Description: Gets all the User's Notifications from All Events they are
                apart, showing the latest notification first
 * Input: User_ID , Optional: Limit sets the Number of Notifications to be 
 *        pulled from the Database, i.e if 
 * Output: All Notifications matching that Notification ID
 */
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
/* Description: Inserts a single Notification based on the Input Parameters 
 * Input: Notification Subject, Notification Message/Content,
 *        Notification Recepient (User_ID), Event ID, and the Timestamp of
 *        the Notification is sent
 * Output: All Notifications matching that Notification ID
 */
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
/* Description: Get a single Notification based on that notification ID 
 * Input: Notification ID
 * Output: All Notifications matching that Notification ID
 */
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
/* Description: Delete a notification  
 * Input: Notification ID
 * Output: None
 */
    public function deleteNotification($id){
        $dbcon = Database::getDB();
        $sql = "DELETE from notifications where id=:id";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(":id",$id);
        $pst->execute();
        $pst->closeCursor();
    }
/* Description: Gets all the Events guests(users) based on that event ID 
 * Input: Event ID
 * Output: All Users that have RSVP'd to the event and
 *         allow Notifications
 */
    public function getUsersByEventID($event_id){
        $dbcon = Database::getDB();
        $sql = "SELECT * from users
         INNER JOIN events_users on users.id = events_users.user_id 
        WHERE events_users.event_id = :event_id AND events_users.has_rsvp =1 AND users.allow_notif =1";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':event_id', $event_id);
        $pst->execute();
        $users = $pst->fetchAll(PDO::FETCH_OBJ);
        $pst->closeCursor();
        return $users;
    }
}