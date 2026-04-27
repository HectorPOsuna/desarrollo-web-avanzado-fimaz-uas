<?php
spl_autoload_register(function ($clase) {
    $ruta = __DIR__ . "/" . str_replace("\\", "/", $clase) . ".php";
    if (file_exists($ruta)) {
        require_once $ruta;
    }
});

use Controller\ProductController;
use Model\ProductModel;

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

if (isset($_GET['editar'])) {
    $idEditar = $_GET['editar'];
    $productoEditar = $controller->obtenerPorId($idEditar);
}

?>