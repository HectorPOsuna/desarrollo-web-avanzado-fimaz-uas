<?php
    class Alumno extends Admin{
        private $matricula;
        
        public function __construct()
        {
            return parent::__construct();
            $this->matricula = "";
        }
    }
?>