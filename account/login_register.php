<?php
if(!$_SESSION){
  session_start();
}
$successmess = $_SESSION['successmess']? $_SESSION['successmess'] : "";
$pagetitle = 'Register/Login Page';
include($_SERVER['DOCUMENT_ROOT'].'/loggedin_header.php');
?>

<main class="login_register__container">
  <div class="row p-4">
    <div class="col-sm p-5" id="registration-block">
      <h2 class="display-4 text-center mb-4">Registration</h2>
      <form action="index.php" method="post">
        <input type="hidden" name="action" value="register_user">
        <div class="form-group row">
          <label for="user-name" class="col-sm-4 col-form-label">Name</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="user-name" id="user-name" placeholder="First and last name">
          </div>
        </div>
        <div class="form-group row">
          <label for="user-email" class="col-sm-4 col-form-label">Email</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="user-email" id="user-email" placeholder="Your email">
          </div>
        </div>
        <div class="form-group row">
          <label for="user-password" class="col-sm-4 col-form-label">Password</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" name="user-password" id="user-password" placeholder="Password">
          </div>
        </div>
        <div class="form-group row">
          <label for="user-confirm-password" class="col-sm-4 col-form-label">Confirm password</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" name="user-confirm-password" id="user-confirm-password"
              placeholder="Confirm">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-8 offset-sm-4">
            <button type="submit" class="btn btn-primary">Register</button>
          </div>
        </div>
      </form>
      <?= $successmess ?>
    </div>
    <div class="col-sm p-5" id="login-block">
      <h2 class="display-4 text-center mb-4">Login</h2>
      <form action="index.php<?php if(isset($return_url)) echo('?return_url=' . urlencode($return_url)) ?>" method="post">
        <input type="hidden" name="action" value="login_user">
        <div class="form-group row">
          <label for="login-user-email" class="col-sm-4 col-form-label">Email</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="user-email" id="login-user-email" placeholder="Your email">
          </div>
        </div>
        <div class="form-group row">
          <label for="login-user-password" class="col-sm-4 col-form-label">Password</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" name="user-password" id="login-user-password"
              placeholder="Your password">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-8 offset-sm-4">
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</main>

<?php include($_SERVER['DOCUMENT_ROOT'].'/loggedin_footer.php'); ?>