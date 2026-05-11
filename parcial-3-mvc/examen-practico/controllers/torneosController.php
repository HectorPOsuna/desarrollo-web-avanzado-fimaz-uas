<?php
require_once ("../models/torneosModel.php");

class TorneosController
{
    private $model;

    public function __construct() 
    {
        $this->model = new TorneosModel();
    }

    public function saveTorneo($nombreTorneo, $organizador, $patrocinadores, $sede, $categoria, 
    $premio1, $premio2, $premio3, $usuario, $contraseña)
    {
        $id = $this->model->insert($nombreTorneo, $organizador, $patrocinadores, $sede, $categoria, 
        $premio1, $premio2, $premio3, $usuario, $contraseña);
        return ($id != false) ? header("Location: mainTorneos.php") : 
        header("Location: frmTorneos.php");
    }
}
?>