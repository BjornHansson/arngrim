<?php
class DatabaseHandler
{
    private $connection;

    public function __construct()
    {
        $this->connection = new mysqli(HOST, USER, PASSWORD, DATABASE);
        $this->connection->set_charset(CHARSET);
    }

    public function query($query)
    {
        return $this->connection->query($query);
    }

    public function sanitize($str)
    {
        $str = $this->connection->real_escape_string($str);
        return htmlspecialchars($str);
    }

    public function __destruct()
    {
        $this->connection->close();
    }
}