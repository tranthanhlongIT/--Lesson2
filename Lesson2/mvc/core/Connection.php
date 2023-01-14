<?php

// Connect to the database 
abstract class Connection
{
    public $mysqli;
    public $hostname = "localhost";
    public $username = "root";
    public $password = null;
    public $database = "lesson2";

    function __construct()
    {
        $this->mysqli = new mysqli($this->hostname, $this->username, $this->password, $this->database);
    }
}
