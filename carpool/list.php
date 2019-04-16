<?php
require_once('../model/database.php');
require_once('../model/event.php');
require_once('../model/event_db.php');
$pagetitle = 'Carpool Chats';
include('header.php');
?>

<main class="carpoolchats__container">
    <header class="container">
        <h1 class="display-4 text-center"><span class="heading-style">Carpool Chats</span></h1>
    </header>
    <div class="container">
        <a href="?action=show_add_form" class="btn btn-outline-secondary btn-sm float-right">Add new carpoolchat</a>
    </div>
    <div class="container pt-5 my-5">
      <table class="table container">
          <thead class="event-thead">
              <tr>
                  <th scope="col">Event</th>
                  <th scope="col">File Name</th>
                  <th scope="col"></th>
              </tr>
          </thead>
          <tbody>
          <?php foreach($chats as $chat) : ?>
              <tr>
                  <td>
                      <a href="/events/?action=show_event&id=<?= $chat->getEventId() ?>">
                          <?php
                          $event = EventDB::getEvent($chat->getEventId());
                          echo $event->getTitle();
                          ?>
                      </a>
                  </td>
                  <td>
                    <a href="?action=show_chat&eid=<?= $chat->getEventId() ?>"><?= $chat->getFileName() ?></td></a>
                  <td>
                      <a href=".?action=show_update_form&id=<?= $chat->getId() ?>" class="chat-action-link">Edit</a>
                      <a href=".?action=confirm_delete&id=<?= $chat->getId() ?>&title=<?= $chat->getEventId() ?>" class="event-action-link">Delete</a>
                  </td>
              </tr>
          <?php endforeach; ?>
          </tbody>
      </table>
    </div>
</main>

<?php include('footer.php') ?>