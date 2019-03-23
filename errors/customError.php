<?php include($_SERVER['DOCUMENT_ROOT'].'/events/header.php');  ?>

<div class="events__container">
  <div class="container">
    <h2>Error</h2>
    <span class="error_message"><?php if (isset($error)) echo $error ?></span>
  </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'].'/events/footer.php') ?>