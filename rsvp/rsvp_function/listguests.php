<?php 
require_once '../model/database.php';
require_once 'Guest.php';

$dbcon = Database::getDB();
$g = new Guest();
$myguest = $g->getAllGuests(Database::getDB());

echo "<table id='table'><tr>
        <th>Name</th>
        <th>Email</th>
        <th> </th>
        <th> </th>
        <th> </th>
    </tr>";
foreach(g){
    echo "<tr><td>".$guest->guest_name."</td>".
        "<td>".$guest->guest_email."</td>".
        "<td><form action='rsvp_function/updateguest.php' method='post'>" .
        "<input type='hidden' value='$guest->guest_id' name='id' />".
        "<input type='submit' value='Update' name='update' class='btn1'/>".
        "</form></td>" .
        "<td><form action='rsvp_function/deleteguest.php' method='post'>" .
        "<input type='hidden' value='$guest->guest_id' name='id' />".
        "<input type='submit' value='Delete' name='delete' class='btn2' />".
        "</form></td></tr>";
}
echo "</table>";



?>