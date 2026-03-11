<?php
    /**
     * Clase administrador que asigna el rol de administrador
     * 
     * @author HectorPOsuna
     * @version 1.0.0
     */
    class Admin extends Usuario{

        /**
         * Metodo que devuelve el rol de administrador
         * 
         * @return string Devuelve la cadena de caracteres de administrador como rol
         */
        public function getRol(){
            return "administrador";
        }

    }
?>