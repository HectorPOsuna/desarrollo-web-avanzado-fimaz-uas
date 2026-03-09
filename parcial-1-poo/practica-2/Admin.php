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

        public function setRol($rol){
            $this->rol = $rol;
        }
        public function getRol(){
            return $this->rol;
        }
    }
?>