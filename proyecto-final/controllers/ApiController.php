<?php
namespace Controllers;

use Models\ProductoModel;

/**
 * Clase que gestiona la API REST de productos.
 *
 * @package Controllers
 * @author Hector Manuel Padilla Osuna
 * @version 1.0.0
 */
class ApiController
{
    /**
     * Instancia del modelo de productos.
     *
     * @var ProductoModel
     */
    private ProductoModel $productoModel;

    public function __construct()
    {
        $this->productoModel = new ProductoModel();
    }

}
