<?php
/* Author:          Bibek Shrestha
 * Feature:         Carpool chat
 * Description:     View page for adding carpool chat page. Only admins can add carpool chat pages.
 * Date Created:    April 6th, 2019
 * Last Modified:   April 17th, 2019
 * Recent Changes:  form to add carpool chat page
 */
require_once('../model/database.php');
require_once('../model/event_db.php');
require_once('../model/event.php');
$pagetitle = 'Create Carpool Chat';
include($_SERVER['DOCUMENT_ROOT'].'/loggedin_header.php');
$events = EventDB::getAllEvents();
?>

<main class="chats__container">
    <header class="container">
        <h1 class="display-4 text-center"><span class="heading-style">Create a new carpool chat</span></h1>
    </header>
    <form action="index.php" method="post" class="container py-5" id="form-add-chat">
        <input type="hidden" name="action" value="add_chat">
        <div class="form-group">
            <label for="event-id">Event</label>
            <select name="event_id" id="event-id">
              <?php foreach($events as $event): ?>
                <option value="<?= $event->getId() ?>"><?= $event->getTitle() ?></option>
              <?php endforeach;?>
            </select>
        </div>
        <div class="row container">
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="." class="btn btn-secondary">Cancel</a>
        </div>
        <?php if ($error_message): ?>
          <div class="error_message"><?= $error_message?></div>
        <?php endif;?>
    </form>
</main>

<?php include($_SERVER['DOCUMENT_ROOT'].'/loggedin_footer.php'); ?>