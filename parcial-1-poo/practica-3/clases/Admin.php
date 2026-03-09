<?php
    /**
     * Clase Admin que representa a un administrador del sistema, que hereda de la clase Usuario.
     * 
     * @author Hector Manuel Padilla Osuna
     * @version 1.0.0
     */
    class Admin extends Usuario{
        
        /**
         * El rol del administrador
         * 
         * @var string $rol
         */
        private $rol;

        public function __construct()
        {
            parent::__construct();
            $this->rol = "";
        }

        public function setRol($rol){
            $this->rol = $rol;
        }
        public function getRol(){
            return $this->rol = "administrador";
        }
    }
?>