<?php
    class Database {
        private $host = "localhost";
        private $dbname = "dwebavanzado";
        private $username = "root";
        private $password = "";
        private $connection;

        public function __construnct() {
            try {
                $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4";
                $this->connection = new PDO($dsn, $this->username, $this->password);
                
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FECTCH_ASSOC);
            }catch
        }
    }
?>