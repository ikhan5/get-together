<?php
        include "../model/database.php";
        include "../model/notification_db.php";
        require_once 'startSession.php';
    $error = '';
    $user_id = $_SESSION['user_id'];
    $event_id = $_SESSION['event_id'];
    $u = new Notification();
    $notifications = $u->getAllNotifications();

?>

<div class="form-group">
    <label for="notifications__guests">Select which guests to notify:</label>
    <table class="table table-bordered table-striped">
        <tr>
            <th>Subject</th>
            <th>Content</th>
            <th>Time Sent</th>
        </tr>
        <?php
              foreach($users as $user)
                {
                    echo '
                        <tr>';                 
                            echo '<td>'.$notifications->title.'</td>';
                            echo '<td>'.$user->email.'</td>
                            <td>
                                 <input type="checkbox" name="single_email" class="single_email" data-event="'.$event_id.'" data-email="'.$user->email.'" data-name="'.$user->first_name.'" />
                            </td>
                            <td><button type="button" name="send_email" class="btn btn-primary btn-xs email_button single_buttons" id="'.$user->id.'" data-event="'.$event_id.'" data-email="'.$user->email.'" data-name="'.$user->first_name.'" data-action="single">Send</button></td>
                            </tr>
                            ';
                }
         ?>
    </table>