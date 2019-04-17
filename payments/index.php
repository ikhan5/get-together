<?php
require('../model/database.php');
require('../model/event.php');
require('../model/event_user.php');
require('../model/event_db.php');
require('startSession.php');

$userid = $_SESSION['userid'];
$userrole = $_SESSION['userrole'];
$event_id = $_GET['eid'];

$user_role = EventDB::IsHost($userid,$event_id);
var_dump($user_role);
if($user_role){
    header("Location: MoneyPools/pool_list.php?eid=$event_id");
}else{
    header("Location: paymentsStatus.php?eid=$event_id");
}