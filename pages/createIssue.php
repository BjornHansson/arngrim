<?php
if(!empty($_POST))
{
    require "../config.php";
    $db = new DatabaseHandler();

    $date = date("Y-m-d");
    $formData = array();
    $formData[] = $date;
    foreach($_POST as $key => $value)
    {
        $formData[] = $db->sanitize($value);
    }
    $formData[] = "1";
    $sqlValues = implode("', '", $formData);

    $query = "INSERT INTO issues (date, title, description, writer, category, open) VALUES ('{$sqlValues}');";
    $result = $db->query($query);
}

header("Location: ../index.php");
exit;