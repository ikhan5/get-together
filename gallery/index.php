<?php
    require_once "database.php";
    include "validation.php";
    include "Gallery.php";

    $db = Database::getDB();
    $errors="";

    if(isset($_POST['submit']))
    {   
        $filetitle = $_POST['filetitle'];
        $filedes = $_POST['filedes'];
        $images = $_FILES['image']['name'];

        $errors = validateForm($filetitle,$images);

        if (empty($errors)){
            $g = new Gallery();
            $errors.=$g->addPhoto($filetitle,$filedes,$images,$db);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Photo Gallery</title>
    <link rel="stylesheet" type="text/css" href="style/gallery_style.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
</head>
<body>
    <section class="gallery-links">
        <div class="wrapper">
            <h2 class="heading-style">Photo Gallery</h2>
            <div class="gallery-container">
                <div class="images">
                <?php
                    
                ?>
                </div>
            </div>

            <div class="gallery-upload">
            <h2 class="heading-style2">Share your photos</h2>
                <form method="post" enctype="multipart/form-data">
                    <input type="text" name="filetitle" placeholder="Image title">
                    <input type="text" name="filedes" placeholder="Image description">
                    <input type="file" name="image" accept="*/image">
                    <button type="submit" name="submit" class="btn">Upload</button>
                    <p><?= $errors ?></p>
                </form>
            </div>

        </div>
    </section>
</body>
</html>