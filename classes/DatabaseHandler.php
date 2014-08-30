<?php
class DatabaseHandler
{
    var $connection;

    function __construct()
    {
        $this->connection = new mysqli(HOST, USER, PASSWORD, DATABASE);
    }

    function query($query)
    {
        return $this->connection->query($query);
    }

    function sanitize($str)
    {
        $str = $this->connection->real_escape_string($str);
        return htmlentities($str);
    }
}