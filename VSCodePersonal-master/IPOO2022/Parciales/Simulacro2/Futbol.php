<?php
    class Futbol extends Partido {
        // Métodos
        public function __construct($idPartido, $fecha, $objEquipo1, $objEquipo2, $cantGolesE1, $cantGolesE2) {
            parent::__construct($idPartido, $fecha, $objEquipo1, $objEquipo2, $cantGolesE1, $cantGolesE2);
        }
        
        /**
         * Método 1: coeficientePartido - 
         * Retorna el valor del coeficiente base * cant. goles * cant. jugadores.
         */
        public function coeficientePartido() {
            $coeficiente = parent::coeficienteBase();
            //Sólo se toma la categoría del primer equipo porque ambos tienen que ser de la misma categoría para poder jugar:
            $categoriaEquipo = $this->getObjEquipo1()->getCategoria();
            if ($categoriaEquipo == "Menores") {
                $coeficiente += $coeficiente * 0.11;
            } elseif ($categoriaEquipo == "Juveniles") {
                $coeficiente += $coeficiente * 0.17;
            } elseif ($categoriaEquipo == "Mayores") {
                $coeficiente += $coeficiente * 0.23;
            }
            return $coeficiente;
        }
}