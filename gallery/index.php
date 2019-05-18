<?php
/* Author:          Jennifer Wong
 * Feature:         Photo Gallery
 * Description:     User are able to upload and share photos for the event.
 *                  Users can add a title for each photo while upload. Title, 
 *                  delete button will show when mouse hover.
 * Date Created:    April 6th, 2019
 * Last Modified:   May 18th, 2019
 * Recent Changes:  organized the style
 */

session_start();

require_once '../model/database.php';

$eid = $_GET['eid'];
$userid = $_SESSION['userid'];
$userrole = $_SESSION['userrole'];

if(!isset($userid)) {
  $return_url = urlencode($_SERVER['REQUEST_URI']);
  header('Location: /account/?action=show_add_form&return_url=' . $return_url);
}

$pagetitle = 'Gallery';
include($_SERVER['DOCUMENT_ROOT'].'/loggedin_header.php');


/* upload image */

if(isset($_FILES['images'])){
    if($_FILES['images']['error'] == 0){
       $file = base64_encode(file_get_contents($_FILES['images']['tmp_name']));
    }else{
        $file = '';
    }
    $eid = $_GET['eid'];
    
    $dbcon = Database::getDb();
    $query = "INSERT INTO gallery(title,photo_name,event_id) values (?,?,?)";
    $result = $dbcon->prepare($query);
    $result->execute ([$_POST['title'], $file,$eid]);

    header('Location: index.php?eid='.$eid);
    die();
}

?>

<link rel="stylesheet" type="text/css" href="style/gallery.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/script.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <body class="gallery_page">
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
            <form method="post" enctype="multipart/form-data">
                <label>Title: </label>
                <input type="text" name="title">
                <i class="fas fa-arrow-circle-right"></i>
                <input type="file" name="images">
                <i class="fas fa-arrow-circle-right"></i>
                <input type="hidden" name="eid" value="<?= $eid; ?>">
                <input type="submit" value="submit">
            </form>
        </div>
        <div class="upload-msg">
            <span id="multiple_files_error"></span>
        </div>
    </div>
    </div>
    <div class="gallery_display" id="image_table">
        <?php
            include "listimages.php";
        ?>
    </div>
    </div>
    </body>