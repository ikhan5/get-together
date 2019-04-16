<!DOCTYPE html>
<html>
    <head>
        <title>Gallery</title>
        <link rel="stylesheet" type="text/css" href="style/gallery.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/script.js"></script>
    </head>
    <body>
    <br/>
    <div class="container">
    <div class="header">
        <h2 class="heading-style">Gallery</h2>
    </div>
    <div id="uploadModal" class="inputform">
        <div class="upload-header">
            <h3 class="heading-style2">Upload photos</h3>
        </div>
        <div class="upload-form">
            <input type="file" name="multiple_files" id="multiple_files" multiple />
        </div>
        <div class="upload-msg">
            <span id="multiple_files_error"></span>
        </div>
    </div>
    </div>
    <div class="display" id="image_table">

    </div>
    </div>
    </body>
</html>

<div id="imageModal" class="modal">
    <div class="modal-content">
        <form method="POST" id="edit_image_form">
                <button type="button" class="close" id="closebtn" data-dismiss="modal">&times;</button>
                <div class="editbody">
                    <h3 class="heading-style3">Edit Photo Details</h3>
                    <label>Title</label>
                    <input type="text" name="title" id="title" class="form-control" /><br/>
                    <div id="validerror"><div>
                    <input type="hidden" name="photo_name" id="photo_name" />
                    <input type="hidden" name="id" id="id" value="" />
                    <input type="submit" name="submit" class="btn btn-info" id="savebtn" value="Save" />
                </div>
        </form>
    </div>
</div>