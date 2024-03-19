<?php
class Database {
    public $conn;

    /**
     * Contructor for Databse class
     * 
     * @param array $config
     */
    public function __construct($config){
        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        try {
            $this->conn = new PDO($dsn, $config['username'], $config['password'], $options);
            echo 'connected';

        } catch (PDOException $e) {
            throw new Exception(("Database connection failed: {$e->getMessage()}"));
        }
    }
    /**
     * Query the datebase
     * 
     * @param string $query
     * @return PDOStatement
     * @throws PDOException
     */
    public function query($query){
        try {
            $sth = $this->conn->prepare($query);
            $sth->execute();
            return $sth;

        } catch (PDOException $e){
            throw new Exception("Query failed to execute: {$e->getMessage()}");
        }
    }
};