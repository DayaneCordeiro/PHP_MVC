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

    public function read() {
        $this->conn->query("
                            SELECT *,
                            posts.id   AS id_post,
                            posts.date AS date_post,
                            users.id   AS id_user,
                            users.date AS date_users
                            FROM posts
                            INNER JOIN users ON posts.id_user = users.id
                            ORDER BY id_post DESC
                        ");

        return $this->conn->fetchAll();
    }

    public function readById($id) {
        $this->conn->query("
                            SELECT *,
                            posts.id   AS id_post,
                            posts.date AS date_post,
                            users.id   AS id_user,
                            users.date AS date_users
                            FROM posts
                            INNER JOIN users ON posts.id_user = users.id
                            WHERE posts.id = ?
                        ");

        $this->conn->bind(1, $id);

        return $this->conn->fetch();
    }

    public function update($data) {
        $this->conn->query("UPDATE posts SET title = ?, text = ? WHERE id = ?");

        $this->conn->bind(1, $data['title']);
        $this->conn->bind(2, $data['text']);
        $this->conn->bind(3, $data['id']);

        if ($this->conn->execute())
            return true;
        else
            return false;
    }

    public function delete($id) {
        $this->conn->query("DELETE FROM posts WHERE id = ?");

        $this->conn->bind(1, $id);
        if ($this->conn->execute())
            return true;
        else
            return false;
    }
}