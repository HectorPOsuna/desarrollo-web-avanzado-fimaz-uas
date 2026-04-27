<?php
namespace App\model;

/**
 * The `ProductModel` class represents a product with properties such as id, name, description, stock, and price. It
 * 
 * @author Hector Manuel Padilla Osuna
 * @version 1.0.0
 */
class ProductModel {
    /**
     * The `id` property in the `ProductModel` class is a private variable that represents the unique identifier of a
     * @var int $id
     */
    private $id;
    
    /**
     * The `nombre` property in the `ProductModel` class is a private variable that represents the name of a
     * @var string $nombre
     */
    private $nombre;
    
    /**
     * The `descripcion` property in the `ProductModel` class is a private variable that represents the
     * @var string $descripcion
     */
    private $descripcion;
    
    /**
     * The `existencia` property in the `ProductModel` class is a private variable that represents the quantity
     * @var int $existencia
     */
    private $existencia;
    
    /**
     * The `precio` property in the `ProductModel` class is a private variable that represents the price of a
     * @var double $precio
     */
    private $precio;

    public function __construct($id = null, $nombre = "", $descripcion = "", $existencia = 0, $precio = 0.0) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->existencia = $existencia;
        $this->precio = $precio;
    }

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getExistencia() {
        return $this->existencia;
    }
    public function setExistencia($existencia) {
        $this->existencia = $existencia;
    }

    public function getPrecio() {
        return $this->precio;
    }
    public function setPrecio($precio) {
        $this->precio = $precio;
    }
}
?>