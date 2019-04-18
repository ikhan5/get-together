<?php
/* Author:          Bibek Shrestha
 * Feature:         Carpool chat
 * Description:     Controller for carpool chat feature.
 *                  All requests for the feature goes through this page.
 * Date Created:    April 6th, 2019
 * Last Modified:   April 17th, 2019
 * Recent Changes:  creates a chatroom record on db if there is none for specific event.
 */
session_start();
require_once('../model/database.php');
require_once('../model/carpool/carpool_db.php');
require_once('../model/carpool/carpool.php');
require_once('../model/event_db.php');
require_once('../model/event.php');

$userid = $_SESSION['userid'];
$userrole = $_SESSION['userrole'];

if(!isset($userid)) {
  $return_url = urlencode($_SERVER['REQUEST_URI']);
  header('Location: /account/?action=show_add_form&return_url=' . $return_url);
}


$action = filter_input(INPUT_POST, 'action');
if ($action == null) {
  $action = filter_input(INPUT_GET, 'action');
  if ($action == null) {
    if (filter_input(INPUT_GET, 'id')) {
      $action = 'show_chat';
    } else {
      $action = 'list_chats';
    }
  }
}

if ($action == 'list_chats') {
  if($_SESSION['userrole'] == 'superadmin' || $_SESSION['userrole'] == 'admin') {
    $chats = CarpoolChatDB::getAllChats();
  } else {
    $chats = CarpoolChatDB::getChatsByUser($userid);
  }
  include('list.php');
} else if ($action == 'show_add_form') {
  header('Location: ./add.php');
} else if ($action == 'add_chat') {
  $event_id = filter_input(INPUT_POST, 'event_id');
  $chatid = addNewChat($event_id);
  header('Location: .');
} else if ($action == 'show_chat') {
  $eid = filter_input(INPUT_GET, 'eid');
  $isValid = EventDB::validateUserEvent($userid, $eid);

  if($isValid || $_SESSION['userrole'] == 'superadmin' || $_SESSION['userrole'] == 'admin') {
    $chat = CarpoolChatDB::getChatByEventId($eid);
    if(!$chat){
      $chatid = addNewChat($eid);
    }
    $event = EventDB::getEvent($eid);
    include('chatroom.php');
  } else {
    include($_SERVER['DOCUMENT_ROOT'].'/errors/404Error.php');
  }
}

function addNewChat($eid) {
  $file_name = 'carpoolchat_n' . str_pad($eid, 5, '0', STR_PAD_LEFT);
  $chat = new CarpoolChat($eid, $file_name);
  $chatid = CarpoolChatDB::addCarpoolChat($chat);
  return $chatid;
}