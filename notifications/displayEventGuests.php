<?php
/* Author: Imzan Khan
 * Feature: Notifications
 * Description: Displays all of the guests from an event
 *              and displays their email, and name within 
 *              a table. Each row contains an option to 
 *              select that row to be sent as a bulk email, 
 *              or directly send an email to that user.              
 * Date Created: April 1st, 2019
 * Last Modified: April 11th, 2019
 * Recent Changes: Refactored code, PHP code moved to 
 *                 separate file.
 */
    include "../model/database.php";
    include "../model/notification_db.php";
    require_once 'startSession.php';

$u = new Notification();
$users = $u->getUsersByEventID($event_id);

foreach($users as $user)
    {
        
        if($user->is_host){
            echo '<tr>';  
                echo '<td id="host" style="color:green;">'.$user->first_name.' (host)</td>';
        }
        else{
            echo '<tr>';  
            echo '<td>'.$user->first_name.'</td>';
            echo '<td>'.$user->email.'</td><td>
            <input type="checkbox" name="single_email" class="single_email" data-event="'.$event_id.'" 
            data-email="'.$user->email.'" data-name="'.$user->first_name.'" />
            </td><td><button type="button" name="send_email" class="btn btn-primary btn-xs email_button single_buttons" 
            id="'.$user->id.'" data-event="'.$event_id.'" data-email="'.$user->email.'" data-name="'.$user->first_name.'"
             data-action="single">Send</button></td>';
        }
        echo '</tr>';
}