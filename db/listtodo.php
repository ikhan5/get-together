<?php

require_once "classes/Database.php";
require_once "classes/ToDo.php";

$pageTitle = "All Your To Do Lists";

if(isset($_GET['del'])){
    $id = $_GET['del'];

    $todo = new ToDo();
    $todo->delete($id);
}

include 'inc/header.php';
?>
<section id="todo-container">
    <div id="todo-title-container">
<h1>My To Dos</h1>
    <h3 id="add-list"><a href="addtodo.php">Add a list <i class="fa fa-plus" aria-hidden="true"></i></a></h3>
</div>
    <table class="lists">
        <thead class="list-container">
            <tr>
                <th class="hidden"></th>
                <th>Title</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody class="list-container" id="list-body">

            <?php 

            $todo = new ToDo();

            $rows = $todo->select();

            foreach($rows as $row){
                //only shows lists that are public
                if($row['status'] === 'Y'){
                ?>
                <tr id="list-row" class="test">
                    <td class="hidden"><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td id="todo-actions">
                        <a href="edittodo.php?id=<?php echo $row['id'];?>">Edit</a><a id="test" data-toggle="modal" data-target="#deleteModal" class="deleteList" href="listtodo.php?del=<?php echo $row['id']; ?>"><i class="fa fa-trash-o" aria-hidden="true" id="trash"></i></a>
                    </td>
                </tr>

<?php
                }
    }

?>

        </tbody>
        </table>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete <?php echo $row['title'] ?>?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo $row['description'] ?>
      </div>
      <div class="modal-footer">
        <h5>Please press delete again to confirm</h5>
        <button type="button" id="deleteMe" class="btn btn-primary">Okay</button>
      </div>
    </div>
  </div>
</div>
</section>
<script src="js/scripts.js"></script>