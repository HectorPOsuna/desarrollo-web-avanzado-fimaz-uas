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
        $contraseña = $this->passwordEncrypt($contraseña);
        
        $statement = $this->PDO->prepare("INSERT INTO torneos VALUES (NULL, :nombre, :organizador, 
        :patrocinadores, :sede, :categoria, :premio1, :premio2, :premio3, :usuario, :password)");

        $statement->bindParam(":nombre", $nombreTorneo);
        $statement->bindParam(":organizador", $organizador);
        $statement->bindParam(":patrocinadores", $patrocinadores);
        $statement->bindParam(":sede", $sede);
        $statement->bindParam(":categoria", $categoria);
        $statement->bindParam(":premio1", $premio1);
        $statement->bindParam(":premio2", $premio2);
        $statement->bindParam(":premio3", $premio3);
        $statement->bindParam(":usuario", $usuario);
        $statement->bindParam(":password", $hash);

        return ($statement->execute()) ? $this->PDO->lastInsertId() : false;
    }

    public function passwordEncrypt($contraseña)
    {
        $passwordEncrypt = password_hash($contraseña, PASSWORD_DEFAULT);
        return $passwordEncrypt;
    }

    public function passwordDencrypt($passwordEncrypt, $passwordCandidate)
    {
        (password_verify($passwordCandidate, $passwordEncrypt)) ? true : false;
    }
}
?>