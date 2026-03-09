<?php

    spl_autoload_register(function ($clase){
        $ruta = __DIR__ . "/clases/" . str_replace("\\", "/", $clase) . ".php";
        
        if(file_exists($ruta)){
            require($ruta);
        }
    });

    try{
        $admin = new Admin();
        $alumno = new Alumno();

        $admin->setNombre("Hector Manuel Padilla Osuna");
        $admin->setCorreo("hpadilla@uas.edu.mx");

        echo "Nombre: " . $admin->getNombre() . "<br>";
        echo "Correo: " . $admin->getCorreo() . "<br>";
        echo "Rol: " . $alumno->getRol() . "<br>";
        echo "Matrícula: " . $alumno->getMatricula() . "<br>";
    }
    catch(Exception $e){
        echo "Error: " . $e->getMessage();
    }
?>