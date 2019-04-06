<?php
    include "../model/database.php";
    include "../model/notification_db.php";

if (isset($_POST['delete'])) {
    $p = new Notification();
    $id = $_POST['id'];
    $p->deleteNotification($id);
    header("Location: listNotifications.php");
}