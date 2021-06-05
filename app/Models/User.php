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

    public function validateEmail($email) {
        $this->conn->query("SELECT email FROM users WHERE email = ?");

        $this->conn->bind(1, $email);

        if ($this->conn->fetch())
            return true;
        else
            return true;
    }

    public function validateLogin($data) {
        $this->conn->query("SELECT email, password FROM users WHERE email = ?");

        $this->conn->bind(1, $data['email']);

        if ($this->conn->fetch()) {
            $result = $this->conn->fetch();

            if (password_verify($data['password'], $result->password)) {
                return true;
            }
        }
            
        return false;
    }
}