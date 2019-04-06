<?php
$pagetitle = $event->getTitle() . ' - Update Event';
include('header.php');
?>

<main class="events__container">
    <header class="container">
        <h1 class="display-4 text-center"><span class="heading-style">Update '<?= $event->getTitle() ?>'</span></h1>
    </header>
    <form action="index.php" method="post" class="container py-5" id="form-update-event">
        <input type="hidden" name="action" value="update_event">
        <input type="hidden" name="id" value="<?= $event->getId() ?>">
        <div class="form-group">
            <label for="event-title">Title</label>
            <input type="text" class="form-control" id="event-title" name="title" value="<?= $event->getTitle() ?>">
        </div>
        <div class="form-group">
            <label for="event-description">Detail</label>
            <textarea name="description" id="event-description" class="form-control"><?= $event->getDescription() ?></textarea>
        </div>
        <div class="form-group">
            <label for="event-location">Location</label>
            <input type="text" class="form-control" id="event-location" name="location" value="<?= $event->getLocation() ?>">
        </div>
        <div class="form-group">
            <label for="event-date">Date</label>
            <input type="date" class="form-control" id="event-date" name="date" value="<?= $event->getDate() ?>">
        </div>
        <div class="form-group">
          <label for="event-start-time">Start Time</label>
          <input type="time" name="start-time" id="event-start-time" class="form-control" value="<?= $event->getStartTime() ?>">
        </div>
        <div class="form-group">
          <label for="event-end-time">End Time</label>
          <input type="time" name="end-time" id="event-end-time" class="form-control" value="<?= $event->getEndTime() ?>">
        </div>
        <div class="row container">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="." class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</main>

<?php include('footer.php') ?>