<?php

class Connection {
    private $host     = DB['HOST'];
    private $user     = DB['USER'];
    private $password = DB['PASSWORD'];
    private $database = DB['DATABASE'];
    private $port     = DB['GATE'];
    private $dbh;
    private $stmt;

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
    
    public function query($sql) {
        $this->stmt = $this->dbh->prepare($sql);
    }

    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute() {
        return $this->stmt->execute();
    }

    public function fetch() {
        $this->execute();

        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function fetchAll() {
        $this->execute();

        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function rowsCount() {
        return $this->stmt->rowCount();
    }

    public function lastInsertId() {
        return $this->dbh->lastInsertId();
    }
}