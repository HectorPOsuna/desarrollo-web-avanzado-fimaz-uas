<?php
    namespace Parcial1\Practica1;


    /**
     * Clase Usuario que representa a un usuario del sistema
     * 
     * @package Parcial1\Practica1
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
        public function __destruct(){
            echo "El usuario {$this->nombre} ha sido destruido.";
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