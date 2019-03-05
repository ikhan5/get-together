<?php
require_once "classes/Database.php";
require_once "classes/ToDo.php";

$pageTitle = "Edit a To Do List";

include 'inc/header.php';

if(isset($_GET['id'])){
    $tdid = $_GET['id'];

    $todo = new ToDo();
    $result = $todo->selectOne($tdid);

}

if (isset($_POST['editlist'])){

    $title = $_POST['title'];
    $status = $_POST['status'];
    $description = $_POST['description'];

    $input = [
        'title'=>$title,
        'status'=>$status,
        'description'=>$description
    ];

    $todo = new ToDo();

    $todo->insert($input);

    $id = $_POST['id'];

    $todo = new ToDo();
    $todo->update($input,$id);

}

?>
<h1>Edit To Do</h1>
<section class="feature-container">
    <form action="" method="post" class="form-container">
        <input type="hidden" name="id" value="<?php echo $result['id']?>" />
        <div class="form-group">
                <label for="title">Title:<span class="required">*</span></label>
                <input class="form-control" value="<?php echo $result['title']?>" type="text" id="title" name="title"/>
        </div>
        <div class="form-group">
            <!-- how do you keep value from a select, ask?? -->
                <label for="status">Status:<span class="required">*</span></label>
                <select class="form-control" name="status" id="status">
                    <option value="Y">Public</option>
                    <option value="N">Private</option>
                </select>
        </div>
        <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" value="" id="description" name="description"><?php echo $result['description']?></textarea> 
        </div>
        <input class="btn btn-outline-success" type="submit" name="editlist" value="Edit List">
    </form>
</section>
<?php
    include 'inc/footer.php';
?>