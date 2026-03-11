<?php
    /**
     * Clase usuario que guarda el nombre y correo de los usuarios
     * 
     * Esta clase permite obtener los nombres y correo de los usuarios que guarden en ella
     * 
     * @author Hector Manuel Padilla Osuna
     * @version 1.0.0
     */
    
    class Usuario{
        /**
         * Nombre del usuario
         * 
         * @var string
         */
        protected $nombre;

        /**
         * Correo del usuario
         * 
         * @var string
         */
        protected $correo;

        public function __construct($correo,$nombre)
        {
            if(!filter_var($correo,FILTER_VALIDATE_EMAIL )){
                throw new Exception("El correo ingresado no es valido");
            }

            $this->nombre = $nombre;
            $this->correo = $correo;
        }

        public function getNombre(){
            return $this->nombre;
        }
        public function getCorreo(){
            return $this->correo;
        }

    }
?>