<?php include('header.php') ?>

<main class="container">
    <header>
        <h1 class="display-4 text-center"><?= $event->getTitle() ?></h1>
    </header>
    <div class="row container justify-content-end">
            <a href=".?action=show_update_form&id=<?= $event->getId() ?>" class="btn btn-sm btn-outline-primary">Update</a>
            <a href="." class="btn btn-sm btn-outline-primary">Go to event list</a>
        </div>
    <div class="container event-detail">
        <div class="d-flex justify-content-between">
            <div>Venue: <?= $event->getLocation() ?></div>
            <div>Date: <?= $event->getDate() ?></div>
        </div>
        <div class="d-flex justify-content-between">
            <div>Start Time: <?= $event->getStartTimeDisp() ?></div>
            <div>End Time: <?= $event->getEndTimeDisp() ?></div>
        </div>
    </div>
    
</main>

<?php include('footer.php') ?>