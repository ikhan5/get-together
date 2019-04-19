<?php
/* Author:          Jennifer Wong
 * Feature:         RSVP/Guestlist
 * Description:     Users are able to invite guests by adding their names and
 *                  emails. A link (with eventid & guestid) will send to guest's email.
 *                  Guests will have to register/login to join the event.
 * Date Created:    April 6th, 2019
 * Last Modified:   April 19th, 2019
 * Recent Changes:  finalized the link from the email
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
<body>
    <div class="rsvp_container">
    <div class="rsvp_inputform">
        <h2 class="rsvp_heading-style">Who would you like to invite?</h2>
        <form method="post" action="rsvp_function/addguest.php?eid=<?= $eid ?>">
        <div class="rsvp_input">
        <label>Name : </label><input type="text" name="name"/> <br/>
        <label>Email : </label><input type="text" name="email"/><br/>
        <button type="submit" name="save" class='rsvp_btn'>Save</button>
        </div>
        </form>
    </div>
    <div class="rsvp_display">
        <h2 class="rsvp_heading-style2">Guest List</h2>
    <?php 
        include "rsvp_function/listguests.php";
    ?>
    </div>
    <div class="rsvp_sendtoguest">
    <h2 class="rsvp_heading-style3">Are you ready to send invitations?</h2>
    <form method="post" action="rsvp_function/sendinvites.php">
    <input type="hidden" name="eventid" value="<?= $eid ?>">
        <button type="submit" name="sendinvite" class='rsvp_btn'>Yes, send now!</button>
    </form>
    </div>
    </div>
</body>
</html>