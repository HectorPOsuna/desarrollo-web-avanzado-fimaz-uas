<?php

    spl_autoload_register(function ($clase){
        $ruta = __DIR__ . "/clases/" . str_replace("\\", "/", $clase) . ".php";
        
        if(file_exists($ruta)){
            require($ruta);
        }
    });

    $admin = new Admin();
    $alumno = new Alumno();
    $invitado = new Invitado();

    try{
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

    try{
        $admin->setNombre("Leroy Jenkins");
        $admin->setCorreo("ljenkins@uas.edu");
        $alumno->setMatricula("123456-78");

        echo "Nombre: " . $admin->getNombre() . "<br>";
        echo "Correo: " . $admin->getCorreo() . "<br>";
        echo "Rol: " . $alumno->getRol() . "<br>";
        echo "Matrícula: " . $alumno->getMatricula() . "<br>";
    }
    catch(Exception $e){
        echo "Error: " . $e->getMessage();
    }

    try{
        $admin->setNombre("Roy Mustang");
        $admin->setCorreo("rmustang@uas");

        echo "Nombre: " . $admin->getNombre() . "<br>";
        echo "Correo: " . $admin->getCorreo() . "<br>";
        echo "Rol: " . $admin->getRol() . "<br>";
    }
    catch(Exception $e){
        echo "Error: " . $e->getMessage();
    }

    try{
        $admin->setNombre("Roy Mustang");
        $admin->setCorreo("rmustang@uas");

        echo "Nombre: " . $admin->getNombre() . "<br>";
        echo "Correo: " . $admin->getCorreo() . "<br>";
        echo "Rol: " . $admin->getRol() . "<br>";
    }
    catch(Exception $e){
        echo "Error: " . $e->getMessage();
    }
?>