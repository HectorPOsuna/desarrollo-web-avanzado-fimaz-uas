<?php
require_once ("../models/torneosModel.php");

class TorneosController
{
    private $model;

    public function __construct() 
    {
        $this->model = new TorneosModel();
    }
}
?>