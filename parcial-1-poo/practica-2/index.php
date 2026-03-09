<?php
    spl_autoload_register(function ($clase){
        $ruta = __DIR__ . "/" . str_replace("\\", "/", $clase) . ".php";
        
        if(file_exists($ruta)){
            require($ruta);
        }
    });

    $admin = new Admin();

    $admin->setNombre("Hector Manuel Padilla Osuna");
    $admin->setCorreo("hpadilla@uas.edu.mx");

    echo "Nombre: " . $admin->getNombre() . "<br>";
    echo "Correo: " . $admin->getCorreo() . "<br>";
    echo "Rol: " . $admin->getRol() . "<br>";
?>