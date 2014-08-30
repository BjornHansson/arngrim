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
}