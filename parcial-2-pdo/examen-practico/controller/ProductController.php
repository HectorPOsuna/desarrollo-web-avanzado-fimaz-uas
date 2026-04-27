<?php
namespace Controller;

use Model\ProductModel;
use Config\Database;

/**
 * The `ProductController` class is responsible for handling CRUD operations (Create, Read, Update, Delete)
 * 
 * @author Hector Manuel Padilla Osuna
 * @version 1.0.0
 */
class ProductController {
    private $connection;
    
    public function __construct() {
        $database = new Database();
        $this->connection = $database->getConnection();
    }

    /**
     * The function creates a new record in the database table for a product with the provided
     * information.
     * 
     * @param ProductModel producto The `crear` function you provided is a method that inserts a new
     * product into a database table named `productos`. It takes a `ProductModel` object as a parameter and
     * uses its properties (nombre, descripcion, existencia, precio) to populate the database fields.
     * 
     * @return The `execute()` method is being called on the prepared statement ``, and it returns
     * a boolean value indicating whether the execution of the SQL query was successful or not. This
     * method returns `true` on success and `false` on failure.
     */
    public function crear(ProductModel $producto) {
        try {
            $sql = "INSERT INTO productos (nombre, descripcion, existencia, precio)
                    VALUES (:nombre, :descripcion, :existencia, :precio)";

            $stmt = $this->connection->prepare($sql);

            $stmt->bindValue(':nombre', $producto->getNombre());
            $stmt->bindValue(':descripcion', $producto->getDescripcion());
            $stmt->bindValue(':existencia', $producto->getExistencia(), \PDO::PARAM_INT);
            $stmt->bindValue(':precio', $producto->getPrecio());

            return $stmt->execute();

        } catch (\PDOException $e) {
            die("Error al crear el producto: " . $e->getMessage());
        }
    }

    /**
     * The function "listar" retrieves all products from a database table and returns them in
     * descending order by their ID.
     * 
     * @return The `listar()` function is returning an array of all rows from the "productos" table in
     * descending order based on the "id" column.
     */
    public function listar() {
        try {
            $sql = "SELECT * FROM productos ORDER BY id DESC";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (\PDOException $e) {
            die("Error al listar los productos: " . $e->getMessage());
        }
    }

    /**
     * The function "obtenerPorId" retrieves a product from the database based on the provided ID.
     * 
     * @param id The `obtenerPorId` function is a PHP method that retrieves a product from a database
     * table named `productos` based on the provided `id`. The function uses a prepared statement to
     * prevent SQL injection by binding the `id` parameter to the query.
     * 
     * @return The function `obtenerPorId` is returning the result of the SQL query that selects all
     * columns from the `productos` table where the `id` matches the provided parameter ``. The
     * function fetches and returns the first row of the result set as an associative array.
     */
    public function obtenerPorId($id) {
        try {
            $sql = "SELECT * FROM productos WHERE id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();

        } catch (\PDOException $e) {
            die("Error al obtener el producto: " . $e->getMessage());
        }
    }

    /**
     * The function `actualizar` updates a product's information in a database using prepared
     * statements in PHP.
     * 
     * @param ProductModel producto The `actualizar` function is a method that updates a product in a
     * database table named `productos`. It takes a `ProductModel` object as a parameter, which contains
     * the information needed to update the product's details.
     * 
     * @return The `execute()` method is being called on the prepared statement ``, which will
     * execute the SQL query to update the product in the database. The `execute()` method returns a
     * boolean value indicating whether the query was successfully executed or not. This boolean value
     * is being returned by the `actualizar` function.
     */
    public function actualizar(ProductModel $producto) {
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

    /**
     * The function `eliminar` deletes a product from a database table based on the provided ID.
     * 
     * @param id The `eliminar` function is a PHP method that deletes a product from a database table
     * based on the provided `id` parameter. The `id` parameter is the unique identifier of the product
     * that you want to delete from the `productos` table.
     * 
     * @return The `execute()` method is being called on the prepared statement ``, and it returns
     * a boolean value indicating whether the execution was successful or not. This boolean value is
     * being returned by the `eliminar` function.
     */
    public function eliminar($id) {
        try {
            $sql = "DELETE FROM productos WHERE id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
            return $stmt->execute();

        } catch (\PDOException $e) {
            die("Error al eliminar el producto: " . $e->getMessage());
        }
    }

    /**
     * The function "buscar" searches for products in a database based on a given search term in the
     * product name or description.
     * 
     * @param termino The `termino` parameter in the `buscar` function is used to search for products
     * in the database based on the provided search term. The SQL query searches for products where the
     * product name or description contains the specified search term (using the `LIKE` operator with
     * `%` wildcards for pattern matching
     * 
     * @return The `buscar` function is returning the result of the SQL query executed on the
     * `productos` table based on the search term provided. It fetches all rows that have the search
     * term in either the `nombre` or `descripcion` columns, sorted by `id` in descending order. The
     * function returns an array containing all the matching rows fetched from the database.
     */
    public function buscar($termino) {
        try {
            $sql = "SELECT * FROM productos
                    WHERE nombre LIKE :termino
                        OR descripcion LIKE :termino
                    ORDER BY id DESC";

            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':termino', '%' . $termino . '%');
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (\PDOException $e) {
            die("Error al buscar productos: " . $e->getMessage());
        }
    }
}
?>