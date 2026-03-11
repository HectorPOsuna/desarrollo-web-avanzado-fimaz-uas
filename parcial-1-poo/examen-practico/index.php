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
    <table border="1">
    <tr>
    <th>Nombre</th>
    <th>Correo</th>
    <th>Rol</th>
    <th>Matricula</th>
    </tr>
    
    <?php
    foreach($usuarios as $u)
        {
            $matricula = method_exists($u, 'getMatricula') ? $u->getMatricula() : "-";
            $rol = method_exists($u, 'getRol') ? $u->getRol() : "-";

            echo "<tr>";
            echo "<td>".$u->getNombre() ."</td>";
            echo "<td>".$u->getCorreo() ."</td>";
            echo "<td>".$rol()."</td>";
            echo "<td>".$matricula()."</td>";
        }
    ?>

?>