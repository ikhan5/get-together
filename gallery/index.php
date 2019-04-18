<?php

session_start();

$eid = $_GET['eid'];
$userid = $_SESSION['userid'];
$userrole = $_SESSION['userrole'];

if(!isset($userid)) {
  $return_url = urlencode($_SERVER['REQUEST_URI']);
  header('Location: /account/?action=show_add_form&return_url=' . $return_url);
}

$pagetitle = 'Photo Gallery';
include($_SERVER['DOCUMENT_ROOT'].'/loggedin_header.php');

?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/gallery.js"></script>

<body>
    <div class="gallery_container">
    <div class="gallery_header">
        <h2 class="gallery_heading-style">Gallery</h2>
    </div>
    <div id="uploadModal" class="gallery_inputform">
        <div class="gallery_upload-header">
            <h3 class="gallery_heading-style2">Upload photos</h3>
        </div>
        <div class="gallery_upload-form">
            <input type="file" name="multiple_files" id="multiple_files" multiple />
        </div>
        <div class="gallery_upload-msg">
            <span id="multiple_files_error"></span>
        </div>
    </div>
    </div>
    <div class="gallery_display" id="image_table">

    </div>
    </div>
</body>

<!-- supposed to edit the title for each photo
<div id="gallery_imageModal" class="gallery_modal">
    <div class="gallery_modal-content">
        <form method="POST" id="edit_image_form">
                <button type="button" class="close" id="gallery_closebtn" data-dismiss="gallery_modal">&times;</button>
                <div class="gallery_editbody">
                    <h3 class="gallery_heading-style3">Edit Photo Details</h3>
                    <label>Title</label>
                    <input type="text" name="title" id="title" class="form-control" /><br/>
                    <input type="hidden" name="photo_name" id="photo_name" />
                    <input type="hidden" name="id" id="id" value="" />
                    <input type="submit" name="submit" class="btn btn-info" id="gallery_savebtn" value="Save" />
                </div>
        </form>
    </div>
</div>
-->