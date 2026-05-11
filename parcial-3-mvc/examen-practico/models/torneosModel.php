<?php
require_once ("../config/DataBase.php");

class TorneosModel
{
    private $PDO;

    public function __construct() {
        $connection = new DataBase();
        $this->PDO = $connection->connect();
    }

    public function insert($nombreTorneo, $organizador, $patrocinadores, $sede, $categoria, 
    $premio1, $premio2, $premio3, $usuario, $contraseña)
    {
        
    }
}
?>