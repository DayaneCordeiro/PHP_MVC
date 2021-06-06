<?php

class Post {
    private $conn;

    public function __construct() {
        $this->conn = new Connection();
    }

    public function store($data) {
        $this->conn->query("INSERT INTO posts(id_user, title, text) VALUES (?, ?, ?)");

        $this->conn->bind(1, $_SESSION['user_id']);
        $this->conn->bind(2, $data['title']);
        $this->conn->bind(3, $data['text']);

        if ($this->conn->execute())
            return true;
        else
            return false;
    }
}