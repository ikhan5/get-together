<?php
/* Author: Imzan Khan
 * Feature: Notifications
 * Description: Gets User ID of the user signed in, and stores it
 *              into a session variable.           
 * Date Created: April 1st, 2019
 * Last Modified: April 1st, 2019
 * Recent Changes: Created session variables.
 */
session_start();

$user_id = $_SESSION['userid'];
$event_id = $_GET['eid'];