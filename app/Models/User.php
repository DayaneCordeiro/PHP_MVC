<?php

class User {
    private $conn;

    public function __construct() {
        $this->conn = new Connection();
    }

    public function store($data) {
        $this->conn->query("INSERT INTO users(name, email, password) VALUES (?, ?, ?)");

        $this->conn->bind(1, $data['name']);
        $this->conn->bind(2, $data['email']);
        $this->conn->bind(3, $data['password']);

        if ($this->conn->execute())
            return true;
        else
            return false;
    }
}