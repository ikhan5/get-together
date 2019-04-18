<?php
session_start();
$event_id = $_GET['eid'];
$uid = $_SESSION['userid'];
$uname = $_SESSION['username'];
setcookie('userid', $uid);
setcookie('username', $uname);

// $chatroom_url = '/views/chatrooms.php';

$doc = new DOMDocument();
$file_name = 'carpoolchat_n' . str_pad($event_id, 5, '0', STR_PAD_LEFT) . '.xml';
$doc->load("./chats/" . $file_name);
if(!($doc->documentURI)){
  $chatfile = fopen("chats/$file_name", "w");
  $roomid = str_pad($event_id, 5, '0', STR_PAD_LEFT);
  $starttext = "<?xml version='1.0' encoding='utf-8'?>
  <chats xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' roomId='$roomid'
    xsi:noNamespaceSchemaLocation='chatroom.xsd'></chats>";
  fwrite($chatfile, $starttext);
  fclose($chatfile);
}


if(isset($_POST['submit'])){
  $doc = new DOMDocument();
  $doc->preserveWhiteSpace = false;
  $file_name = 'carpoolchat_n' . str_pad($event_id, 5, '0', STR_PAD_LEFT) . '.xml';
  $doc->load("./chats/" . $file_name);
  var_dump($doc);
  exit();
  if(!($doc->documentURI)){
    $chatfile = fopen("chats/$file_name", "w");
    $roomid = str_pad($event_id, 5, '0', STR_PAD_LEFT);
    $starttext = "<?xml version='1.0' encoding='utf-8'?>
    <chats xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' roomId='$roomid'
      xsi:noNamespaceSchemaLocation='chatroom.xsd'></chats>";
    fwrite($chatfile, $starttext);
    fclose($chatfile);
    $doc->load("./chats/" . $file_name);
  }
  $message_input = $_POST['chat-input'];

  date_default_timezone_set('America/Toronto');
  $curr_date = date("d/m/Y");
  $curr_time = date("Hi");

  $date = $doc->createElement('date', $curr_date);
  $time = $doc->createElement('time', $curr_time);

  $userid = $doc->createAttribute('userId');
  $userid->value = $uid;
  $user = $doc->createElement('user', $uname);
  $user->appendChild($userid);
  
  $message = $doc->createElement('message', $message_input);

  $chat = $doc->createElement('chat');
  $chat->appendChild($date);
  $chat->appendChild($time);
  $chat->appendChild($user);
  $chat->appendChild($message);

  $chats = $doc->getElementsByTagName('chats')[0];
  $chats->appendChild($chat);
  $doc->save("./chats/" . $file_name);
  header("Refresh: 0");
}

?>

<?php 
$pagetitle = 'Carpool Chat Page';
include($_SERVER['DOCUMENT_ROOT'].'/loggedin_header.php');

?>
<h3 class="text-center display-4">Carpool Chat - <?= $event->getTitle(); ?></h3>
<main class="container-fluid d-flex flex-row p-0 mb-5 mt-1" id="carpool-chat-container">
        <!-- <div id="chats" class="col-sm-3 p-0">
            <ul class="list-unstyled list-group components">
                <li class="list-group-item" id="chats-header">
                    <h4>Chats</h4>
                </li>
                <li class=" list-group-item active">
                    <a href="#">General</a>
                </li>
                <li class="list-group-item">
                    <a href="#">Imzan Khan</a>
                </li>
                <li class="list-group-item">
                    <a href="#">Alex Leroux</a>
                </li>
            </ul>
        </div> -->
        <div class="chat col-sm-8 p-0 d-flex flex-column" id="chat-container">
            <!-- <div id="chat-header">
                <h4>General</h4>
            </div> -->
            <div id="chat-content" class="d-flex flex-column justify-content-end">
                <div id="chat-display">

                </div>
                <div id="chat-input">
                    <form action="" method="post" id="chat_form">
                        <input type="hidden" name="id" value="2">
                        <div class="form-group d-flex flex-row mb-0">
                            <input type="text"
                            class="form-control" name="chat-input" id="chat-input-box" placeholder="Write your message">
                            <button type="submit" class="btn btn-outline-success ml-1 mr-0" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- <div class="member-list col-sm-3 p-0" id="member-list">
            <ul class="list-unstyled list-group components">
                <li class="list-group-item" id="member-list-header">
                    <h4>Carpool Members</h4>
                </li>
                <li class="list-group-item">
                    <a href="#">Alex Leroux</a>
                </li>
                <li class="list-group-item">
                    <a href="#">Bibek Shrestha</a>
                </li>
                <li class="list-group-item">
                    <a href="#">Imzan Khan</a>
                </li>
                <li class="list-group-item">
                    <a href="#">Jenifer Wong</a>
                </li>
                <li class="list-group-item">
                    <a href="#">Maria Koronleko</a>
                </li>
            </ul>
        </div> -->
</main>

<?php include($_SERVER['DOCUMENT_ROOT'].'/loggedin_footer.php'); ?>