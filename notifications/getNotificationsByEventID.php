<?php
/* Author: Imzan Khan
 * Feature: Notifications
 * Description: Gets all the notifications that were
 *              sent to the user from all events and 
 *              displays them with the Notification's
 *              subject, content, timestamp, and an 
 *              option to delete.
 * Date Created: April 1st, 2019
 * Last Modified: April 12th, 2019
 * Recent Changes: Refactored code, moved PHP code to 
 *                 separate function.
 */
require('../model/database.php');
require('../model/event.php');
require('../model/event_db.php');
include "../model/notification_db.php";
require_once 'startSession.php';
$error = '';
$u = new Notification();
$notifs = $u->getAllNotificationsByUserID($user_id);

foreach($notifs as $notif)
    {
        $eID = $notif->event_id;
        $e = EventDB::getEvent($eID);
                 
        echo '<tr>';                 
        echo '<td><form action="viewNotification.php" method="post">' .
        "<input type='hidden' value='$notif->id' name='id'/>" ;
        echo "<input class='button-link no-underline' type='submit' value='$notif->notification_subject' name='view' /></form></td>";
        echo '<td>'.$notif->time.'</td>';
        echo '<td>'. $e->getTitle().'</td>';
        echo "<td class='text-center'><form action='deleteNotification.php' method='post'>" .
            "<input type='hidden' value='$notif->id' name='id' />" .
            "<button class='button-link' style='color: grey;' type='submit' value='Delete' name='delete'><i class='fas fa-trash-alt'></i></button></form></td>";
        echo '</tr>';
    }