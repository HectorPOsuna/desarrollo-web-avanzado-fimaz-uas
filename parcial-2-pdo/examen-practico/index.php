<?php
spl_autoload_register(function ($clase) {
    $ruta = __DIR__ . "/" . str_replace("\\", "/", $clase) . ".php";
    if (file_exists($ruta)) {
        require_once $ruta;
    }
});

use App\Controller\ProductController;
use App\Model\ProductModel;

$controller = new ProductController();

?>