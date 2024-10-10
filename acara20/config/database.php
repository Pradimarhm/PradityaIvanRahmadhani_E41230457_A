<?php

class database
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "inventory";

    public $connection;
    public function getConnection()
    {
        try {
            $this->connection = null;
            $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db, $this->user, $this->pass);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $this->connection;
    }
}