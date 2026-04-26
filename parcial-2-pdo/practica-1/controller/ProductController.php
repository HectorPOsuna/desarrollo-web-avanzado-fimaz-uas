<?php
    require_once __DIR__ . '/../config/Database.php';
    require_once __DIR__ . '/../model/ProductModel.php';

    class ProductController {
        private $connection;

        public function __construct() {
            $database = new Database();
            $this -> connection = $database -> getConnection();
        }

        public function crear(Producto $producto){
            $sql = "INSERT INTO productos (nombre, descripcion, existencia, precio)
            VALUES (:nombre, :descripcion, :existencia, :precio)";
            $stmt = $this->connection->prepare($sql);

            $stmt->bindValue(':nombre', $producto->getNombre());
            $stmt->bindValue(':descripcion', $producto->getDescripcion());
            $stmt->bindValue(':existencia', $producto->getExistencia(), PDO::PARAM_INT);
            $stmt->bindValue(':precio', $producto->getPrecio());

            return $stmt->execute();
        }

        public function listar(){
            $sql = "SELECT * FROM productos ORDER BY id DESC";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }
?>