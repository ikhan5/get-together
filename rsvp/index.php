<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Invite Guest</title>
    <link rel="stylesheet" type="text/css" href="style/style.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
</head>
<body>
    <div class="containter">
    <div class="inputform">
        <h2 class="heading-style">Who would you like to invite?</h2>
        <form method="post" action="function/addguest.php">
        <label name="gname">Name : </label><input type="text" name="name"/> <br/>
        <label name="gname">Email : </label><input type="text" name="email"/><br/>
        <button type="submit" name="save" class='btn'>Save</button>
        </form>
    </div>
    <div class="guestlistdisplay">
        <h2 class="heading-style">Guest List</h2>
    <?php 
        include "function/listguests.php";
    ?>
    </div>
    </div>
</body>
</html>