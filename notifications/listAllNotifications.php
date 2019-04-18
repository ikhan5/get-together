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
session_start();
$pagetitle = 'List Notification';
include($_SERVER['DOCUMENT_ROOT'].'/loggedin_header.php');
?>

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

<?php include($_SERVER['DOCUMENT_ROOT'].'/loggedin_footer.php'); ?>