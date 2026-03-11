<?php
    /**
     * Clase alumno que guarda la matricula del alumno y regresa el rol de alumno
     * 
     * @author HectorPOsuna
     * @version 1.0.0
     */
    class Alumno extends Usuario{
        /**
         * Matricula del alumno
         * 
         * @var string
         */
        private $matricula;

        public function __construct($nombre,$correo,$matricula){
            parent::__construct($nombre,$correo);
            $this->matricula = $matricula;
        }

        public function getRol(){
            return "alumno";
        }

        public function getMatricula(){
            return $this->matricula;
        }
    }
?>