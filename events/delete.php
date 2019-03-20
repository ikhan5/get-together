<?php include('header.php') ?>

<main class="container event-delete-container">
    <header>
        <h1 class="display-4">Are you sure you wanna delete '<?= $title ?>' event?</h1>
    </header>
    <form action="index.php" method="post" class="container" id="form-delete-event">
        <input type="hidden" name="action" value="delete_event">
        <input type="hidden" name="id" value="<?= $id ?>">
        
        <div class="row container">
            <button type="submit" class="btn btn-primary">Yes</button>
            <a href="." class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</main>

<?php include('footer.php') ?>