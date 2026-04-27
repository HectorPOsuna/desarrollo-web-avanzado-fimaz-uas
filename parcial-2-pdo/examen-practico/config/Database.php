<?php
namespace App\Config;

class Database {
    private $host = "localhost";
    private $dbname = "dwebavanzado";
    private $username = "root";
    private $password = "";
    private $connection;

    /**
     * The function is a PHP constructor that establishes a connection to a MySQL database using PDO
     * and sets error handling and fetch mode attributes.
     */
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