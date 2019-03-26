<?php include('header.php') ?>

<main class="accounts__container">
    <header class="container">
        <h1 class="display-4 text-center"><span class="heading-style">Users</span></h1>
    </header>
    <div class="container">
        <a href="?action=show_add_form" class="btn btn-outline-secondary btn-sm float-right user-action-btn">Add new user</a>
    </div>
    <div class="container pt-5 my-5">
      <table class="table container">
          <thead class="user-thead">
              <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Actions</th>
              </tr>
          </thead>
          <tbody>
          <?php foreach($users as $user) : ?>
              <tr>
                  <td>
                      <a href="?action=show_user&id=<?= $user->getId() ?>">
                          <?php echo $user->getFirstName()." ".$user->getLastName()?>
                      </a>
                  </td>
                  <td><?= $user->getEmail() ?></td>
                  <td>
                      <a href=".?action=show_update_form&id=<?= $user->getId() ?>" class="user-action-link">Edit</a>
                      <a href=".?action=confirm_delete&id=<?= $user->getId() ?>&name=<?= $user->getFirstName()." ".$user->getLastName() ?>" class="user-action-link">Delete</a>
                  </td>
              </tr>
          <?php endforeach; ?>
          </tbody>
      </table>
    </div>
</main>

<?php include('footer.php') ?>