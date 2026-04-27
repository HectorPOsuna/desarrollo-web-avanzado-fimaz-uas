<?php
namespace examen\model;

class ProductModel {
    private $id;
    private $nombre;
    private $descripcion;
    private $existencia;
    private $precio;

    public function __construct($id = null, $nombre = "", $descripcion = "", $existencia = 0, $precio = 0.0) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->existencia = $existencia;
        $this->precio = $precio;
    }

    
}
?>