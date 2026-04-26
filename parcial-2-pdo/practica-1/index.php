<?php
    require_once 'controller/ProductController.php';
    $controller = new ProductController();

    $mensaje = "";
    $productoEditar = null;

    $terminoBusqueda = isset($_GET['buscar']) ? trim($_GET['buscar']) : '';

    if (isset($_GET['eliminar'])) {
        $idEliminar = $_GET['eliminar'];
        if ($controller->eliminar($idEliminar)) {
            $mensaje = "Producto eliminado correctamente.";
        } else {
            $mensaje = "Error al eliminar el producto.";
        }
    }
?>