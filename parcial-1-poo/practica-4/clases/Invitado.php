<?php
    /**
     * Clase Invitado que representa a un invitado del sistema, que hereda de la clase Usuario.
     * 
     * @author Hector Manuel Padilla Osuna
     * @version 1.0.0
     */
    class Invitado extends Usuario{
        
        /**
         * La empresa del invitado
         * 
         * @var string $empresa
         */
        private $empresa;

        public function __construct(){
            $this->empresa = "Empresa XYZ";
        }
        
        public function getEmpresa(){
            return $this->empresa;
        }

        public function getRol(){
            return "invitado";
        }
        
    }
?>