<?php
/* Author: Imzan Khan
 * Feature: Notifications
 * Description: Allows guests to delete notifications that were
 *              sent to them.              
 * Date Created: April 1st, 2019
 * Last Modified: April 12th, 2019
 * Recent Changes: Update redirect URL's
 */

    include "../model/database.php";
    include "../model/notification_db.php";
    require "header.php";

if (isset($_POST['delete'])) {
    $p = new Notification();
    $id = $_POST['id'];
    $p->deleteNotification($id);
    header("Location: listAllNotifications.php");
}else{
    header("Location: listAllNotifications.php");
}