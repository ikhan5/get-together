<?php include('header.php') ?>

<main>
    <header class="container">
        <h1 class="display-4">Events</h1>
    </header>
    <div class="container">
        <a href="?action=show_add_form" class="btn btn-outline-secondary btn-sm float-right event-action-btn">Add new event</a>
    </div>
    <div class="container pt-5 my-5">
      <table class="table container">
          <thead class="event-thead">
              <tr>
                  <th scope="col">Title</th>
                  <th scope="col">Location</th>
                  <th scope="col">Date</th>
                  <th scope="col">Start Time</th>
                  <th scope="col">End Time</th>
                  <th scope="col">Actions</th>
              </tr>
          </thead>
          <tbody>
          <?php foreach($events as $event) : ?>
              <tr>
                  <td>
                      <a href="?action=show_event&id=<?= $event->getId() ?>">
                          <?php echo $event->getTitle() ?>
                      </a>
                  </td>
                  <td><?= $event->getLocation() ?></td>
                  <td><?= $event->getDate() ?></td>
                  <td><?= $event->getStartTimeDisp() ?></td>
                  <td><?= $event->getEndTimeDisp() ?></td>
                  <td>
                      <a href=".?action=show_update_form&id=<?= $event->getId() ?>" class="event-action-link">Edit</a>
                      <a href=".?action=confirm_delete&id=<?= $event->getId() ?>&title=<?= $event->getTitle() ?>" class="event-action-link">Delete</a>
                  </td>
              </tr>
          <?php endforeach; ?>
          </tbody>
      </table>
    </div>
</main>

<?php include('footer.php') ?>