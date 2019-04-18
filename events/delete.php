<?php
/* Author:          Bibek Shrestha
 * Feature:         Events
 * Description:     View page for deleting events.
 * Date Created:    March 4th, 2019
 * Last Modified:   April 17th, 2019
 * Recent Changes:  form to delete an event
 */
$pagetitle = $title . ' - Delete Event';
include($_SERVER['DOCUMENT_ROOT'].'/loggedin_header.php');
?>

<main class="events__container event-delete-container">
    <header class="container">
        <h1 class="display-4"><span class="heading-style">Are you sure you wanna delete '<?= $title ?>' event?</span></h1>
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

<?php include($_SERVER['DOCUMENT_ROOT'].'/loggedin_footer.php'); ?>