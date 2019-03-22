<?php
require_once '../model/database.php';
require_once '../model/playlist_db.php';

$name = $_POST['playlist__name'];
$desc = $_POST['playlist__desc'];
$date = $_POST['playlist__date'];
$event = $_POST['playlist__event'];

$p = new PlaylistDB();
$c = $p->addPlaylist($name, $desc, $date, $event);

header("Location: index.php");