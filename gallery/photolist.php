<?php

require_once "database.php";
$db = Database::getDB();

$stmt = $db->prepare('SELECT * from gallery ORDER BY DESC');
$stmt->execute();
if($stmt->rowCount()>0)
{
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
    {
        extract($row);
    }
}

echo "<p>". $filetitle ."</p>";
echo "<img src='photos/'". $row['']."/>";