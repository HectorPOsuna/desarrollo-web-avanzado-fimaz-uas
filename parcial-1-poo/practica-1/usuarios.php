<?php
    namespace parcial1\practica1;

    class Usuario{
        private $nombre;
        private $correo;

        public function __construct(){

        }
        public function __destruct(){
                
        }

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