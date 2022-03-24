<?php

class Database
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'php_mvc';
    private $port = '3306';
    private $dbh;

    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->database;

        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->password, $options);
        } catch (PDOException $e) {
            print "Error!: "  . $e->getMessage() . "<br/>";
            die();
        }
    }
}