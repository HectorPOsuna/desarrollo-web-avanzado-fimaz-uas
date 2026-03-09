<?php
    /**
     * Clase Usuario que representa a un usuario del sistema
     * 
     * @author Hector Manuel Padilla Osuna
     * @version 1.0.0
     */
    class Usuario{
        
        /**
         * El nombre del usuario
         * 
         * @var string $nombre
         */
        private $nombre;
        
        /**
         * El correo del usuario
         * 
         * @var string $correo
         */
        private $correo;

        public function __construct($nombre, $correo){
            if(empty($nombre)){
                throw new Exception("El nombre del usuario no puede estar vacío.");
            }

            if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
                throw new Exception("El correo electrónico no tiene un formato válido.");
            }

            $this->nombre = $nombre;
            $this->correo = $correo;
        }
        public function __destruct(){}

        public function getNombre(){
            return $this->nombre;
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function getCorreo(){
            return $this->correo;
        }
        public function setCorreo($correo){
            $this->correo = $correo;
        }
    }
?>