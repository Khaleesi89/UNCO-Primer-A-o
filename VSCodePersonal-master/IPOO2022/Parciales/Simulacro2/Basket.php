<?php
    class Basket extends Partido {
        private $cantInfracciones;

        //Métodos de acceso
        public function getCantInfracciones() {
            return $this->cantInfracciones;
        }
        public function setCantInfracciones($cantInfracciones) {
            $this->cantInfracciones = $cantInfracciones;
        }

        // Metodos
        public function __construct($idPartido, $fecha, $objEquipo1, $objEquipo2, $cantGolesE1, $cantGolesE2, $cantInfracciones) {
            parent::__construct($idPartido, $fecha, $objEquipo1, $objEquipo2, $cantGolesE1, $cantGolesE2);
            $this->cantInfracciones = $cantInfracciones;
        }

        /**
         * Método 1: coeficientePartido - 
         * Retorna el valor del coeficiente base - cant. infracciones.
         */
        public function coeficientePartido() {
            $coeficiente = parent::coeficienteBase();
            $coeficiente -= 0.75 * $this->getCantInfracciones();
            return $coeficiente;
        }

        public function __toString() {
            return parent::__toString().
            "  + Cantidad de infracciones: " . $this->getCantInfracciones()."\n";
        }
    }
?>