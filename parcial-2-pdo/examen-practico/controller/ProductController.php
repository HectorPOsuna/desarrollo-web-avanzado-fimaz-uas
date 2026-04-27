<?php
namespace App\Controller;

use App\Model\ProductModel;
use App\Config\Database;

class ProductController {
    private $connection;
    
    public function __construct() {
        $database = new Database();
        $this->connection = $database->getConnection();
    }

    public function crear(Producto $producto) {
        try {
            $sql = "INSERT INTO productos (nombre, descripcion, existencia, precio)
                    VALUES (:nombre, :descripcion, :existencia, :precio)";

            $stmt = $this->connection->prepare($sql);

            $stmt->bindValue(':nombre', $producto->getNombre());
            $stmt->bindValue(':descripcion', $producto->getDescripcion());
            $stmt->bindValue(':existencia', $producto->getExistencia(), \PDO::PARAM_INT);
            $stmt->bindValue(':precio', $producto->getPrecio());

            return $stmt->execute();

        } catch (PDOException $e) {
            die("Error al crear el producto: " . $e->getMessage());
        }
    }
}
?>