<?php
require_once ("../config/DataBase.php");

class TorneosModel
{
    private $PDO;

    public function __construct() {
        $connection = new DataBase();
        $this->PDO = $connection->connect();
    }
}
?>