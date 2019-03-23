<?php include('header.php') ?>

<main class="events__container">
  <header>
    <h1 class="display-4 text-center"><span class="heading-style"><?= $event->getTitle() ?></span></h1>
  </header>
  <div class="row container justify-content-end">
    <a href=".?action=show_update_form&id=<?= $event->getId() ?>" class="btn btn-sm btn-outline-primary">Update</a>
    <a href="." class="btn btn-sm btn-outline-primary">Go to event list</a>
  </div>
  <div class="event-description container text-center pt-3 px-5"><?= $event->getDescription() ?></div>
  <div class="container event-detail p-5">
    <div class="d-flex justify-content-between">
      <div class="ml-5">Venue: <em><?= $event->getLocation() ?></em></div>
      <div class="mr-5">Date: <em><?= $event->getDate() ?></em></div>
    </div>
    <div class="d-flex justify-content-between">
      <div class="ml-5">Start Time: <em><?= $event->getStartTimeDisp() ?></em></div>
      <div class="mr-5">End Time: <em><?= $event->getEndTimeDisp() ?></em></div>
    </div>
  </div>

</main>

<?php include('footer.php') ?>