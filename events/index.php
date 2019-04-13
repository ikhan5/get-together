<?php
session_start();
require('../model/database.php');
require('../model/event.php');
require('../model/event_db.php');

$userid = $_SESSION['userid'];
$userrole = $_SESSION['userrole'];

if(!isset($userid)) {
  $return_url = urlencode($_SERVER['REQUEST_URI']);
  header('Location: /account/?action=show_add_form&return_url=' . $return_url);
}

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_events';
    }
}

if ($action == 'list_events') {
  if($_SESSION['userrole'] == 'superadmin' || $_SESSION['userrole'] == 'admin') {
    $events = EventDB::getAllEvents();
  }
  
	include('list.php');
} else if ($action == 'show_add_form') {
    header('Location: ./add.php');
    // header('Location: ./addplus.php');
} else if ($action == 'add_event') {
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $date = filter_input(INPUT_POST, 'date');
    $start_time = filter_input(INPUT_POST, 'start-time');
    $end_time = filter_input(INPUT_POST, 'end-time');

    if ($title == false || $description == false || $location == false || $date == false || $start_time == false || $end_time == false) {
        $error = "Incomplete data. Please enter information on all fields.";
        include($_SERVER['DOCUMENT_ROOT'].'/errors/customError.php');
    } else {
        $event = new Event($title, $description, $location, $date, $start_time, $end_time);
        EventDB::addEvent($event);
        header('Location: .');
    }
} else if ($action == 'show_update_form') {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    $event = EventDB::getEvent($id);
    // $json_event = json_encode($event);
    // header('Location: update.php?id='.$id.'&json_event='.$json_event);
    include('update.php');
} else if ($action == 'update_event') {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $title = filter_input(INPUT_POST, 'title');
    $description = filter_input(INPUT_POST, 'description');
    $location = filter_input(INPUT_POST, 'location');
    $date = filter_input(INPUT_POST, 'date');
    $start_time = filter_input(INPUT_POST, 'start-time');
    $end_time = filter_input(INPUT_POST, 'end-time');

    if ($id == null || $description == null || $id == false || $title == null || $location == null || $date == null || $start_time == null || $end_time == null) {
        $error = "Incomplete data. Please enter information on all fields.";
        include($_SERVER['DOCUMENT_ROOT'].'/errors/customError.php');
    } else {
        $event = new Event($title, $description, $location, $date, $start_time, $end_time);
        $event->setId($id);
        EventDB::updateEvent($event);
        header('Location: .');
    }
} else if ($action == 'confirm_delete') {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $title = filter_input(INPUT_GET, 'title');
    include('delete.php');
} else if ($action == 'delete_event') {
    $id = filter_input(INPUT_POST, 'id');
    EventDB::deleteEvent($id);
    header('Location: .');
} else if ($action == 'show_event') {
    $eid = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    if($_SESSION['userrole'] == 'superadmin' || $_SESSION['userrole'] == 'admin') {
      $event = EventDB::getEvent($eid);
      include('detail.php');
    }
}