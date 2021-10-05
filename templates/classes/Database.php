<?php

require_once("config.php");

class Database
{
    private $host = "localhost";
    private $user = "vighnesh";
    private $pass = "Vighnesh.123";
    private $database = "blog";

    private $connection;

    private $stmt;


    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->database;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            $this->connection = new PDO($dsn, $this->user, $this->pass, $options);
            $this->dbconnected = true;
        } catch (PDOException $e) {
            $this->error = $e->getMessage() . PHP_EOL;
            $this->dbconnected = false;
        }
    }
    // prepare statements with query
    public function query($query)
    {
        $this->stmt = $this->connection->prepare($query);
    }

    public function execute()
    {
        $this->stmt->execute();
       return $this->stmt;
    }

    public function resultset()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function bind($param, $value, $type = null)
    {
       
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
            $this->stmt->bindValue($param, $value, $type);
        }
    }
}
