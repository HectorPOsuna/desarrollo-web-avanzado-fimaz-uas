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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = !empty($_POST['id']) ? $_POST['id'] : null;
    $nombre = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);
    $existencia = (int) $_POST['existencia'];
    $precio = (float) $_POST['precio'];

    $producto = new ProductModel();
    $producto->setId($id);
    $producto->setNombre($nombre);
    $producto->setDescripcion($descripcion);
    $producto->setExistencia($existencia);
    $producto->setPrecio($precio);

    if ($id) {
        if ($controller->actualizar($producto)) {
            $mensaje = "Producto actualizado correctamente.";
        } else {
            $mensaje = "Error al actualizar el producto.";
        }
    } else {
        if ($controller->crear($producto)) {
            $mensaje = "Producto agregado correctamente.";
        } else {
            $mensaje = "Error al agregar el producto.";
        }
    }
}

?>