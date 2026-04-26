<?php
    require_once __DIR__ . '/../config/Database.php';
    require_once __DIR__ . '/../model/ProductModel.php';

    class ProductController {
        private $connection;

        public function __construct() {
            $database = new Database();
            $this -> connection = $database -> getConnection();
        }
    }
?>