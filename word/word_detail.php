<?php
include_once '../db/db.php';

$statement = $db -> query("SELECT * FROM word");
$row = $statement -> fetch(PDO::FETCH_ASSOC);
echo htmlentities($row['name'] . "," . $row['meaning']);
?>
