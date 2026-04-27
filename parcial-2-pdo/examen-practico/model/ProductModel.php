<?php
namespace examen\model;

class ProductModel {
    private $id;
    private $nombre;
    private $descripcion;
    private $existencia;
    private $precio;

    /**
     * The function is a PHP constructor that initializes object properties with default values if no
     * arguments are provided.
     * 
     * @param id The `id` parameter in the constructor function is used to set the unique identifier of
     * an object. It is typically used to uniquely identify an instance of a class. In the provided
     * constructor, the `id` parameter is optional (with a default value of `null`) and can be used to
     * initialize
     * @param nombre The `nombre` parameter in the constructor function is used to set the name of an
     * object or item. It is a string that represents the name or title of the object being created.
     * @param descripcion The `descripcion` parameter in the constructor function is used to set the
     * description of an object. It allows you to provide a brief explanation or details about the
     * object being created. In the context of the code snippet you provided, `descripcion` would be a
     * string that describes the object being instantiated.
     * @param existencia The parameter `existencia` in the constructor function represents the quantity
     * or stock level of the item. It is initialized with a default value of 0, but you can provide a
     * different value when creating an instance of the class. This parameter is used to store the
     * quantity of the item available in stock
     * @param precio The `precio` parameter in the constructor function is used to set the price of the
     * product. It is a floating-point number representing the cost of the product.
     */
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