<?php
class Database {
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "music-course";
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}