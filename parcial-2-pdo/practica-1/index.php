<?php
    require_once 'controller/ProductController.php';
    $controller = new ProductController();

    $mensaje = "";
    $productoEditar = null;

    $terminoBusqueda = isset($_GET['buscar']) ? trim($_GET['buscar']) : '';
?>