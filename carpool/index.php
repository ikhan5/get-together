<?php
session_start();
require_once('../model/database.php');
require_once('../model/carpool/carpool_db.php');
require_once('../model/carpool/carpool.php');
require_once('../model/event_db.php');
require_once('../model/event.php');

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
  $chats = CarpoolChatDB::getAllChats();
  include('list.php');
} else if ($action == 'show_add_form') {
  header('Location: ./add.php');
} else if ($action == 'add_chat') {
  $event_id = filter_input(INPUT_POST, 'event_id');
  $file_name = 'carpoolchat_n' . str_pad($event_id, 5, '0', STR_PAD_LEFT);
  $chat = new CarpoolChat($event_id, $file_name);
  CarpoolChatDB::addCarpoolChat($chat);
  header('Location: .');
} else if ($action == 'show_chat') {
  $id = filter_input(INPUT_GET, 'eid');
  $chat = CarpoolChatDB::getChat($id);
  $event = EventDB::getEvent($chat->getEventId());
  include('chatroom.php');
}