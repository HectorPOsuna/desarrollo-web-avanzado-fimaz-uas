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

?>