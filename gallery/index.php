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
                <a href="#">
                    <div class="image"></div>
                    <h3>Title</h3>
                    <p>paragraph</p>
                </a>
                <a href="#">
                    <div class="image"></div>
                    <h3>Title</h3>
                    <p>paragraph</p>
                </a>
                <a href="#">
                    <div class="image"></div>
                    <h3>Title</h3>
                    <p>paragraph</p>
                </a>
                <a href="#">
                    <div class="image"></div>
                   <h3>Title</h3>
                    <p>paragraph</p>
                </a>
                <a href="#">
                    <div class="image"></div>
                    <h3>Title</h3>
                    <p>paragraph</p>
                </a>
                <a href="#">
                    <div class="image"></div>
                    <h3>Title</h3>
                    <p>paragraph</p>
                </a>
            </div>

            <div class="gallery-upload">
            <h2 class="heading-style2">Share your photos</h2>
                <form action="includes/gallery-upload.inc.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="filename" placeholder="File name">
                    <input type="text" name="filetitle" placeholder="Image title">
                    <input type="text" name="filedesc" placeholder="Image description">
                    <input type="file" name="file">
                    <button type="submit" name="submit" class="btn">Upload</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>