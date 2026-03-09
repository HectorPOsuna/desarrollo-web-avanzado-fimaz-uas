<?php
    spl_autoload_register(function ($clase){
        $ruta = __DIR__ . "/" . str_replace("\\", "/", $clase) . ".php";
        
        if(file_exists($ruta)){
            require($ruta);
        }
    });

    use Parcial1\Practica1\Usuario;

    $usuario = new Usuario();

    $usuario->setNombre("Hector Manuel Padilla Osuna");
    $usuario->setCorreo("gamerspy2003@gmail.com");

    echo "Nombre: " . $usuario->getNombre() . "<br>";
    echo "Correo: " . $usuario->getCorreo() . "<br>";
?>