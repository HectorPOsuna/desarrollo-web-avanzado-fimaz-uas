<?php
    class Alumno extends Usuario{
        private $matricula;

        public function __construct($matricula){
            $this->matricula = $matricula;
        }

        
    }
?>