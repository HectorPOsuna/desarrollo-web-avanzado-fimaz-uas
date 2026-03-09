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

        public function __construct(){
            $this->nombre = "";
            $this->correo = "";
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

        /**
         * Establece el correo del usuario, validando que sea un formato de correo electrónico válido.
         * 
         * @param string $correo El correo electrónico a establecer para el usuario.
         */
        public function setCorreo($correo){
            
            $correo = trim($correo);
            
            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                throw new InvalidArgumentException("El correo electrónico no es válido.");
            } else {
                $this->correo = $correo;
            }
        }
    }
?>