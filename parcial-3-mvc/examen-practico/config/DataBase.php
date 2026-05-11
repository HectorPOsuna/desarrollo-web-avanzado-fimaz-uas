<?php
class DataBase
{
    private $host = "localhost";
    private $dbname = "dwebavanzado";
    private $user = "root";
    private $password = "";

    public function __construct()
    {

    }

    public function connect() 
    {
        try {
            $PDO = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->password);
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $PDO;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
?>