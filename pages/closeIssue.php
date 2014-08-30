<?php
require "../config.php";
$db = new DatabaseHandler();

$id = $_GET["id"];
if(!is_numeric($id))
    die("Hey, stop playing with the URL...");

$query = "UPDATE issues SET open = 0 WHERE id = $id";
$result = $db->query($query);

header("Location: ../index.php");
exit;