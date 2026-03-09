<?php
    class Admin extends Usuario{
        private $rol;

        public function __construct()
        {
            parent::__construct();
            $this->rol = "admininstrador";
        }
        public function __destruct()
        {
            return parent::__destruct();
        }

        
    }
?>