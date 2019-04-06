<?php
// When the Notification subject hyperlink is clicked on the Notification List page
// the View page is directed to, and allows the user to View a notifications's info
// from the 'notifications' table based on the row ID passed by the listnotification page
require_once '../model/database.php';
require_once '../model/notification_db.php';
if(isset($_POST['id'])){
    if (isset($_POST['view'])) {
        $db_handler = Database::getDB();
        $p = new Notification();
        $id = $_POST['id'];
        $notification = $p->getNotificationById($id);
    }
}else{
    header("Location: listNotifications.php");
    exit();
}
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="../CSS/notifications.css">

<!-- Display for Viewing a payment  -->
<div id="container-fluid" class="mx-0 mx-auto">
    <div id="notification" class="border border-dark rounded p-5">
        <div class="mb-5">
            <a href="listNotifications.php">
                <i class="fas fa-arrow-left"> View All Notifications</i>
            </a>
        </div>
        <h1 class="heading-style2 mb-5">Viewing Notification</h1>
        <div class="notif-detail border-info border-bottom pb-2 pl-3">
            <span id="title" class="display-inline h2">
                <?=htmlspecialchars($notification->notification_subject) ?></span>

        </div>
        <div class="notif-detail mt-3">
            <div id="message">
                <?=htmlspecialchars($notification->notification_message) ?>
            </div>
        </div>
        <span class="float-right"><i class="far fa-clock"></i> <?=htmlspecialchars($notification->time)?></span>
    </div>
</div>