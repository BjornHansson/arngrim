<?php
require "../config.php";
$db = new DatabaseHandler();

$id = $_GET["id"];
if(!is_numeric($id))
    die("Hey, stop playing with the URL...");

$query = "DELETE FROM issues WHERE id = $id LIMIT 1";
$result = $db->query($query);

header("Location: ../index.php");
exit;