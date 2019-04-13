<?php
/* Author: Imzan Khan
 * Feature: Notifications
 * Description: When the Notification subject hyperlink 
 *              is clicked on the Notification List page the View page 
 *              is directed to, and allows the user to View a 
 *              notifications's info from the 'notifications' table based 
 *              on the row ID passed by the listnotification page.
 * Date Created: April 1st, 2019
 * Last Modified: April 12th, 2019
 * Recent Changes: Redirect URL updated
 */
require_once '../model/database.php';
require_once '../model/notification_db.php';
if(isset($_POST['id'])){
    if (isset($_POST['view'])) {
        $p = new Notification();
        $id = $_POST['id'];
        $notification = $p->getNotificationById($id);
    }
}else{
    header("Location: listAllNotifications.php");
    exit();
}