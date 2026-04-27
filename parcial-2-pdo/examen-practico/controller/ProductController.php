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

    public function listar() {
        try {
            $sql = "SELECT * FROM productos ORDER BY id DESC";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (PDOException $e) {
            die("Error al listar los productos: " . $e->getMessage());
        }
    }

    public function obtenerPorId($id) {
        try {
            $sql = "SELECT * FROM productos WHERE id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();

        } catch (PDOException $e) {
            die("Error al obtener el producto: " . $e->getMessage());
        }
    }

    public function actualizar(Producto $producto) {
        try {
            $sql = "UPDATE productos
                    SET nombre = :nombre, descripcion = :descripcion,
                        existencia = :existencia, precio = :precio
                    WHERE id = :id";

            $stmt = $this->connection->prepare($sql);

            $stmt->bindValue(':id', $producto->getId(), \PDO::PARAM_INT);
            $stmt->bindValue(':nombre', $producto->getNombre());
            $stmt->bindValue(':descripcion', $producto->getDescripcion());
            $stmt->bindValue(':existencia', $producto->getExistencia(), \PDO::PARAM_INT);
            $stmt->bindValue(':precio', $producto->getPrecio());

            return $stmt->execute();

        } catch (\PDOException $e) {
            die("Error al actualizar el producto: " . $e->getMessage());
        }
    }
}
?>