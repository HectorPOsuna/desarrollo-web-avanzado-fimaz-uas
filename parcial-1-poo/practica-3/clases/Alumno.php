<?php
    class Alumno extends Admin{
        private $matricula;
        
        public function __construct()
        {
            return parent::__construct();
            $this->matricula = "";
        }

        public function setMatricula($matricula){
            $this->matricula = $matricula;
        }
        public function getMatricula(){
            return $this->matricula;
        }
    }
?>