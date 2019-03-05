<?php include('../header.php') ?>

    <main class="container">
        <div class="row py-3">
            <div class="col-sm py-4 pr-5" id="registration-block">
                <h2 class="display-4 text-center mb-4">Registration</h2>
                <form action="" method="post">
                    <div class="form-group row">
                      <label for="user-name" class="col-sm-4 col-form-label">Name</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="user-name" id="user-name" placeholder="Full name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="user-email" class="col-sm-4 col-form-label">Email</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="user-email" id="user-email" placeholder="Your email">
                      </div>
                    </div>
                    <div class="form-group row mt-4">
                      <label for="user-username" class="col-sm-4 col-form-label">Username</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="user-sername" id="user-sername" placeholder="Choose username">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="user-password" class="col-sm-4 col-form-label">Password</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="user-password" id="user-password" placeholder="Choose password">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="user-confirm-password" class="col-sm-4 col-form-label">Confirm password</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="user-confirm-password" id="user-confirm-password" placeholder="Repeat password">
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 offset-sm-4">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm py-4 pl-5">
                <h2 class="display-4 text-center mb-4">Login</h2>
                <div class="form-group row mt-4">
                    <label for="user-username" class="col-sm-4 col-form-label">Username</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" name="user-sername" id="user-sername" placeholder="Your username">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user-password" class="col-sm-4 col-form-label">Password</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" name="user-password" id="user-password" placeholder="Your password">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 offset-sm-4">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php include('../footer.php') ?>