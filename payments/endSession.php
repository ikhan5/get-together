<?php
session_start();
unset($_SESSION['event_id']);
unset($_SESSION['user_id']);
$_SESSION = [];
session_destroy();