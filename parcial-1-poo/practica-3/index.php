<?php

    spl_autoload_register(function ($clase){
        $ruta = __DIR__ . "/clases/" . str_replace("\\", "/", $clase) . ".php";
        
        if(file_exists($ruta)){
            require($ruta);
        }
    });

    $adm = new Admin();

    $adm->setNombre("Hector Manuel Padilla Osuna");
    $adm->setCorreo("hpadilla@uas.edu.mx");

    echo "Nombre: " . $adm->getNombre() . "<br>";
    echo "Correo: " . $adm->getCorreo() . "<br>";
    echo "Rol: " . $adm->getRol() . "<br>";
?>