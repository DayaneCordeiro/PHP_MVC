<?php

class Connection {
    private $host     = 'localhost';
    private $user     = 'root';
    private $password = '';
    private $database = 'php_mvc';
    private $port     = '3306';
    private $dbh;

    public function __construct() {
        $conn = 'mysql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->database;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION
        );
        
        try {
            $this->dbh = new PDO($conn, $this->user, $this->password, $options);    
                
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }    
}