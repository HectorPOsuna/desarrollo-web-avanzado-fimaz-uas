<?php
namespace App\Config;

/**
 * The `Database` class is responsible for establishing a connection to a MySQL database using PDO (PHP
 * 
 * @author Hector Manuel Padilla Osuna
 * @version 1.0.0
 */
class Database {
    private $host = "localhost";
    private $dbname = "dwebavanzado";
    private $username = "root";
    private $password = "";
    private $connection;

    public function __construct() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4";
            $this->connection = new \PDO($dsn, $this->username, $this->password);
            
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }catch (\PDOException $e){
            die("Error de conexion: " . $e->getMessage());
        }
    }

    /**
     * The getConnection function returns the connection object.
     * 
     * @return The `getConnection` function is returning the `connection` property of the current
     * object.
     */
    public function getConnection() {
        return $this->connection;
    }
}
?>