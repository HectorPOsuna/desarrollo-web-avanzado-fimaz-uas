<?php
    /**
     * Clase Alumno que representa a un alumno del sistema, que hereda de la clase Admin.
     * 
     * @author Hector Manuel Padilla Osuna
     * @version 1.0.0
     */
    class Alumno extends Usuario{
        
        /**
         * La matrícula del alumno
         * 
         * @var string $matricula
         */
        private $matricula;
        
        public function __construct($nombre, $correo, $matricula){
        parent::__construct($nombre, $correo);
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