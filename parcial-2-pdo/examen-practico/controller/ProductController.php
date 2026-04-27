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
}
?>