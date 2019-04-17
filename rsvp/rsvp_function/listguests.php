<?php 
require_once '../model/database.php';
require_once 'Guest.php';

$eid = $_GET['eid'];

$dbcon = Database::getDB();
$g = new Guest();
$myguest = $g->getAllGuests(Database::getDB(),$eid);

echo "<table id='rsvp_table'><tr>
        <th>Name</th>
        <th>Email</th>
        <th> </th>
        <th> </th>
        <th> </th>
    </tr>";
foreach($myguest as $guest){
    echo "<tr><td>".$guest->guest_name."</td>".
        "<td>".$guest->guest_email."</td>".
        "<td><form action='rsvp_function/updateguest.php?eid=$eid' method='post'>" .
        "<input type='hidden' value='$guest->guest_id' name='id' />".
        "<input type='submit' value='Update' name='update' class='rsvp_btn1'/>".
        "</form></td>" .
        "<td><form action='rsvp_function/deleteguest.php?eid=$eid' method='post'>" .
        "<input type='hidden' value='$guest->guest_id' name='id' />".
        "<input type='submit' value='Delete' name='delete' class='rsvp_btn2' />".
        "</form></td></tr>";
}
echo "</table>";



?>