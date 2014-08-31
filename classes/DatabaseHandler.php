<?php
class DatabaseHandler
{
    var $connection;

    function __construct()
    {
        $this->connection = new mysqli(HOST, USER, PASSWORD, DATABASE);
        $this->connection->set_charset("utf8");
    }

    function query($query)
    {
        return $this->connection->query($query);
    }

    function sanitize($str)
    {
        $str = $this->connection->real_escape_string($str);
        return htmlspecialchars($str);
    }
}