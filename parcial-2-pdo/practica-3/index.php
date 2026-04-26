<?php
/********************************
* CONFIGURACIÓN
********************************/

$host    = "localhost";
$db      = "dwebavanzado";
$user    = "root";
$pass    = "";
$charset = "utf8mb4";

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

/********************************
 * CONEXIÓN PDO (con excepciones)
 ********************************/
try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // clave: errores como excepciones
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

/********************************
 * MENSAJES PARA MOSTRAR EN PANTALLA
 ********************************/
$mensaje = "";
$detalle = "";

?>