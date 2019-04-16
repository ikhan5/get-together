<?php
require('../model/database.php');
require('../model/event.php');
require('../model/event_user.php');
require('../model/event_db.php');
require('startSession.php');

$userid = $_SESSION['userid'];
$userrole = $_SESSION['userrole'];

$user_role = EventDB::IsHost($userid,$event_id);

if($user_role){
    include 'MoneyPools/pool_list.php';
}else{
    include 'paymentsStatus.php';
}