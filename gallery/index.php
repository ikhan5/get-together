<?php
/* Author:          Jennifer Wong
 * Feature:         Photo Gallery
 * Description:     User are able to upload and share photos for the event.
 *                  Users can upload max 10 photos at a time and add a title
 *                  for each photo after upload. Title, edit and delete button
 *                  will show when mouse hover.
 * Date Created:    April 6th, 2019
 * Last Modified:   April 19th, 2019
 * Recent Changes:  organized the style
 */

session_start();

$eid = $_GET['eid'];
$userid = $_SESSION['userid'];
$userrole = $_SESSION['userrole'];

if(!isset($userid)) {
  $return_url = urlencode($_SERVER['REQUEST_URI']);
  header('Location: /account/?action=show_add_form&return_url=' . $return_url);
}

$pagetitle = 'Invite Guest';
include($_SERVER['DOCUMENT_ROOT'].'/loggedin_header.php');

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
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
            <input type="hidden" name="event_id" value="<?= $eid ?>" id="eventid">
            <input type="file" name="multiple_files" id="multiple_files" multiple />
        </div>
        <div class="gallery_upload-msg">
            <span id="multiple_files_error"></span>
        </div>
    </div>
</div>
<div class="gallery_display" id="image_table">

</div>
</body>


<div id="imageModal" class="gallery_modal">
    <div class="gallery_modal-content">
        <form method="POST" id="edit_image_form">
                <button type="button" class="gallery_close" id="closebtn" data-dismiss="modal">&times;</button>
                <div class="gallery_editbody">
                    <h3 class="gallery_heading-style3">Edit Photo Details</h3>
                    <label>Title</label>
                    <input type="text" name="title" id="title" class="gallery_form-control" /><br/>
                    <input type="hidden" name="id" id="id" value="" />
                    <input type="submit" name="submit" class="btn btn-info" id="gallery_savebtn" value="Save" />
                </div>
        </form>
    </div>
</div>