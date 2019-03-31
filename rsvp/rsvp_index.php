<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Invite Guest</title>
    <link rel="stylesheet" type="text/css" href="style/rsvp_style.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="inputform">
        <h2 class="heading-style">Who would you like to invite?</h2>
        <form method="post" action="rsvp_function/addguest.php">
        <label>Name : </label><input type="text" name="name"/> <br/>
        <label>Email : </label><input type="text" name="email"/><br/>
        <button type="submit" name="save" class='btn'>Save</button>
        </form>
    </div>
    <div class="display">
        <h2 class="heading-style2">Guest List</h2>
    <?php 
        include "rsvp_function/listguests.php";
    ?>
    </div>
    <div class="sendtoguest">
    <?php 
        //include "rsvp_function/sendinvites.php";
    ?>
    <h2 class="heading-style3">Are you ready to send invitations?</h2>
    <form method="post" action="rsvp_function/sendinvites.php">
        <button type="submit" name="sendinvite" class='btn'>Yes, send now!</button>
    </form>
    </div>
    </div>
</body>
</html>