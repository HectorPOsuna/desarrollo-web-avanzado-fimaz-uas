<?php
    require  'Usuario.php';
    require  'Admin.php';
    require  'Alumno.php';

    $usuario = [];

    try {
        $usuario[] = new Alumno(
            "Roy Mustang",
            "roymustan@gmail.com",
            "150014-18"
        );

        $usuario[] = new Admin(
            "Jacob Frie",
            "Jacobo@outlook.com"
        );

        $usuario[] = new Usuario(
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
foreach($usuario as $u)
    {
        $matricula = method_exists($u, 'getMatricula') ? $u->getMatricula() : "—";
        $rol = method_exists($u, 'getRol') ? $u->getRol() : "—";

        echo "<tr>";
        echo "<td>".$u->getNombre() ."</td>";
        echo "<td>".$u->getCorreo() ."</td>";
        echo "<td>".$rol."</td>";
        echo "<td>".$matricula."</td>";
        echo "<tr>";
    }
?>
</table>