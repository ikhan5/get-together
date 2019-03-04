<?php
session_start();
// in order to use sessions must have this as first line
require_once "classes/Database.php";
require_once "classes/ToDo.php";

$pageTitle = "Create a To Do List";

include 'inc/header.php';

if (isset($_POST['addlist'])){

    $title = $_POST['title'];
    $status = $_POST['status'];
    $description = $_POST['description'];

    // checking to see if fields are empty
    if(!empty($title) && !empty($description) && ($status !== "")){

        // input sanitization
        $title = filter_var($title, FILTER_SANITIZE_STRING);
        $status = filter_var($status, FILTER_SANITIZE_SPECIAL_CHARS);
        $description = filter_var($description, FILTER_SANITIZE_STRING);

        $input = [
            'title'=>$title,
            'status'=>$status,
            'description'=>$description
        ];
    
        $todo = new ToDo();
    
        $todo->insert($input);
    
    } else {

        //if fields are empty, we'll call the function in the ToDo class
        $todo = new ToDo();
        $todo->handleErrors();

    }
}
?>
<section class="feature-container">
    <form action="" method="post" class="form-container">
        <div class="form-group">
                <label for="title">Title:<span class="required">*</span></label>
                <input value="" type="text" id="title" class="form-control" name="title" placeholder="Give a title to this project"/>
                
                <?php 
                    if(isset($_SESSION['errors["titleError"]'])){
                ?>

                        <div class="alert alert-danger mt-2" role="alert">
                            <?php echo $_SESSION['errors["titleError"]']?>
                        </div>

                <?php
                    } 
                ?>
        </div>
        <div class="form-group">
                <label for="status">Status:<span class="required">*</span></label>
                <select name="status" id="status" class="form-control">
                    <option value="">Public or Private?</option>
                    <option value="Y">Public</option>
                    <option value="N">Private</option>
                </select>
                <?php 
                    if(isset($_SESSION['errors["statusError"]'])){
                ?>

                        <div class="alert alert-danger mt-2" role="alert">
                            <?php echo $_SESSION['errors["statusError"]']?>
                        </div>

                <?php
                    }
                ?>
        </div>
        <div class="form-group">
                <label for="description">Description:</label>
                <textarea value="" id="description" name="description" class="form-control" placeholder="Give some auditional information for this list"></textarea>
                
                <?php 
                    if(isset($_SESSION['errors["descriptionError"]'])){
                ?>

                        <div class="alert alert-danger mt-2" role="alert">
                            <?php echo $_SESSION['errors["descriptionError"]']?>
                        </div>

                <?php
                    }
                ?>
        </div>
        <?php 
            session_unset();
        ?>
        <input class="btn btn-outline-success" type="submit" name="addlist" value="Add List">
    </form>
</section>
<?php
    include 'inc/footer.php';
?>
