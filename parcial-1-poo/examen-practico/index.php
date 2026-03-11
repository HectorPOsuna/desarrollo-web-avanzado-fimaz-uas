<?php
    require  'Usuario.php';
    require  'Admin.php';
    require  'Alumno.php';

    $usuarios = [];

    try {
        $usuarios[] = new Alumno(
            "Roy Mustang",
            "roymustan@gmail.com",
            "150014-18"
        );

        $usuarios[] = new Admin(
            "Jacob Frie",
            "Jacobo@uas.edu.mx"
        );

        $usuarios[] = new Usuario(
            "Hector Osuna",
            "hpadilla_@dscaa"
        );

    }
    catch(Exception $e){
        echo "<p> Error: " . $e->getMessage() . "<p>";
    }
?>