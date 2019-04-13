<?php
/* Author: Imzan Khan
 * Feature: Notifications
 * Description: Allows hosts and guests to view all the notifications
 *              sent to their email via the website. Guests will not 
 *              be able to send notifications; thus, this will be their
 *              index page.              
 * Date Created: April 1st, 2019
 * Last Modified: April 11th, 2019
 * Recent Changes: Refactored Code, moved PHP code to separate file, 
 *                 added Navigation Bar.
 */
    require "header.php";
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="../CSS/notifications.css">
<div id="notification" class="py-5">
    <div class="form-group w-75 mx-0 mx-auto">
        <h2 class="heading-style">View All Notifications</h2>
        <div class="mb-5 float-right">
            <a href="index.php">
                <i class="fas fa-paper-plane"> Send a Notification</i>
            </a>
        </div>
        <table class="table table-hover mb-4">
            <thead class="thead-light">
                <tr>
                    <th>Subject</th>
                    <th>Time Sent</th>
                    <th>Event</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <?php
             include "getNotificationsByEventID.php";
         ?>
        </table>
    </div>
</div>