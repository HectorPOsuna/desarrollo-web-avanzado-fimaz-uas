<?php
namespace Models;

use Config\Database;
use PDO;
use PDOException;

/**
 * Clase que gestiona la bitacora de actividades del administrador.
 *
 * @package Models
 * @author Hector Manuel Padilla Osuna
 * @version 1.0.0
 */
class LogModel
{
    /**
     * Conexion a la base de datos.
     *
     * @var PDO
     */
    private PDO $conexion;

    public function __construct()
    {
        $db = new Database();
        $this->conexion = $db->connect();
    }

    /**
     * Registra una accion en la bitacora.
     *
     * @param  int         $adminId       ID del administrador
     * @param  string      $adminUsername Nombre de usuario del administrador
     * @param  string      $accion        Accion realizada
     * @param  string|null $detalles      Detalles adicionales de la accion
     * @return bool                       True si se registro correctamente, false en caso contrario
     */
    public function registrar(int $adminId, string $adminUsername, string $accion, ?string $detalles = null): bool
    {
        try {
            $sql = 'INSERT INTO bitacora (admin_id, admin_username, accion, detalles)
                    VALUES (:admin_id, :admin_username, :accion, :detalles)';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':admin_id', $adminId, PDO::PARAM_INT);
            $stmt->bindParam(':admin_username', $adminUsername);
            $stmt->bindParam(':accion', $accion);
            $stmt->bindParam(':detalles', $detalles);
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    
}
