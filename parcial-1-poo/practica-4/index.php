<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    spl_autoload_register(function ($clase){
        $ruta = __DIR__ . "/clases/" . str_replace("\\", "/", $clase) . ".php";
        
        if(file_exists($ruta)){
            require($ruta);
        }
    });

    $usuarios = [];

    try {

    $usuarios[] = new Admin(
        "Roy Mustang",
        "rmustang@uas.edu.mx"
    );

    $usuarios[] = new Alumno(
        "Hector Padilla",
        "hpadilla@uas.edu.mx",
        "948524-36"
    );

    $usuarios[] = new Invitado(
        "Leroy Jenkins",
        "ljenkins@empresxyz.com",
        "Empresa XYZ"
    );

    // Usuario inválido
    $usuarios[] = new Admin(
        "Jacobo Mitchell",
        "jcob@uas"
    );

}
catch(Exception $e){
    echo "<p>Error controlado: " . $e->getMessage() . "</p>";
}
?>