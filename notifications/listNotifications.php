<?php
        require('../model/database.php');
        require('../model/event.php');
        require('../model/event_db.php');
        include "../model/notification_db.php";
        include "../dashboard/dashboard.php";
        require_once 'startSession.php';
        $error = '';
        $user_id = $_SESSION['user_id'];
        $u = new Notification();
        $notifs = $u->getAllNotificationsByUserID($user_id);
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="../CSS/notifications.css">

<div class="form-group w-50 mx-0 mx-auto">
    <h2 class="heading-style">View All Notifications</h2>
    <div class="mb-5 float-right">
        <a href="index.php">
            <i class="fas fa-paper-plane"> Send a Notification</i>
        </a>
    </div>
    <table class="table table-bordered table-striped mb-4">
        <tr>
            <th>Subject</th>
            <th>Time Sent</th>
            <th>Event</th>
            <th>Delete</th>
        </tr>
        <?php
              foreach($notifs as $notif)
                {
                    $eID = $notif->event_id;
                    $e = EventDB::getEvent($eID);
                 
                    echo '<tr>';                 
                            echo '<td><form action="viewNotification.php" method="post">' .
                            "<input type='hidden' value='$notif->id' name='id'/>" ;
                            echo "<input class='button-link' type='submit' value='$notif->notification_subject' name='view' /></form></td>";
                            echo '<td>'.$notif->time.'</td>';
                            echo '<td>'. $e->getTitle().'</td>';
                            echo "<td><form action='deleteNotification.php' method='post'>" .
                                 "<input type='hidden' value='$notif->id' name='id' />" .
                                 "<button class='button-link' style='color: grey;'type='submit' value='Delete' name='delete'><i class='fas fa-trash-alt'></i></button></form></td>";
                    echo '</tr>';
                }
         ?>
    </table>