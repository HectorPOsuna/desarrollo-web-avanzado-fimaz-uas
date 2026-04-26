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

/********************************
 * PROCESAR FORMULARIO
 ********************************/
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Datos del formulario
    $nombre   = trim($_POST["nombre"]   ?? "");
    $apellido = trim($_POST["apellido"] ?? "");
    $correo   = trim($_POST["correo"]   ?? "");

    // Checkbox: simular error
    $simularError = isset($_POST["simular_error"]);

    // Validación mínima (didáctica)
    if ($nombre === "" || $apellido === "" || $correo === "") {
        $mensaje = "⚠ Todos los campos son obligatorios.";
    } else {
        try {
            // 1) Iniciar transacción
            $pdo->beginTransaction();

            // 2) Insertar alumno (CREATE)
            $sqlAlumno = "INSERT INTO alumnos (nombre, apellido, correo)
                          VALUES (:nombre, :apellido, :correo)";
            $stmtAlumno = $pdo->prepare($sqlAlumno);
            $stmtAlumno->execute([
                "nombre"   => $nombre,
                "apellido" => $apellido,
                "correo"   => $correo
            ]);

            $idAlumno = (int)$pdo->lastInsertId();

            // 3) Insertar log (bitácora)
            // Si se marca simular error, forzamos una falla controlada
            if ($simularError) {
                // Forzamos rollback con una excepción intencional
                throw new Exception("Simulación de error activada: se fuerza rollback.");
                // Alternativa: usar una tabla inexistente para fallar
                // $sqlLog = "INSERT INTO logs_alumnos_X (idAlumno, accion) VALUES (:idAlumno, :accion)";
            } else {
                $sqlLog = "INSERT INTO logs_alumnos (idAlumno, accion)
                           VALUES (:idAlumno, :accion)";
                $stmtLog = $pdo->prepare($sqlLog);
                $stmtLog->execute([
                    "idAlumno" => $idAlumno,
                    "accion"   => "ALTA_ALUMNO"
                ]);
            }

            // 4) Confirmar transacción
            $pdo->commit();

            $mensaje = "✅ Transacción confirmada (COMMIT). Alumno registrado con ID: $idAlumno";

        } catch (Exception $e) {
            // Si algo falla, revertir TODO
            if ($pdo->inTransaction()) {
                $pdo->rollBack();
            }
            $mensaje = "✖ Ocurrió un error. Transacción revertida (ROLLBACK).";
            $detalle = $e->getMessage(); // mostrar solo en entorno de clase/desarrollo
        }
    }
}


?>