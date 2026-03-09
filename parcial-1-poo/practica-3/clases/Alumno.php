<?php
    /**
     * Clase Alumno que representa a un alumno del sistema, que hereda de la clase Admin.
     * 
     * @author Hector Manuel Padilla Osuna
     * @version 1.0.0
     */
    class Alumno extends Admin{
        
        /**
         * La matrícula del alumno
         * 
         * @var string $matricula
         */
        private $matricula;
        
        public function __construct()
        {
            parent::__construct();
            $this->matricula = "948524-36";
        }

        public function setMatricula($matricula){
            $this->matricula = $matricula;
        }
        public function getMatricula(){
            return $this->matricula;
        }
        public function getRol()
        {
            return "alumno";
        }
    }
?>