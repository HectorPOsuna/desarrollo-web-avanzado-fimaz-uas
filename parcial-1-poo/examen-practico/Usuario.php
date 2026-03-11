<?php
    class Usuario{
        protected $nombre;
        protected $correo;

        public function __construct($correo,$nombre)
        {
            if(!filter_var($correo,FILTER_VALIDATE_EMAIL )){
                throw new Exception("El correo ingresado no es valido");
            }

            $this->nombre = $nombre;
            $this->correo = $correo;
        }
        
    }
?>