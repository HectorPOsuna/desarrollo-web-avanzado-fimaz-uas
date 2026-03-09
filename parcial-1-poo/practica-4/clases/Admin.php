<?php
    /**
     * Clase Admin que representa a un administrador del sistema, que hereda de la clase Usuario.
     * 
     * @author Hector Manuel Padilla Osuna
     * @version 1.0.0
     */
    class Admin extends Usuario{
        
        public function getRol(){
            return "administrador";
        }
    }
?>