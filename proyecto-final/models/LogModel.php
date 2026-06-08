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

    
}
