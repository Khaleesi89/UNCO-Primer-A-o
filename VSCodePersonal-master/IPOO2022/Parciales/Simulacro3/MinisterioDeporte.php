<?php
    class MinisterioDeporte {
        private $anioTorneo;
        private $arrayTorneos;

        //Métodos de acceso
        public function getAnioTorneo() {
            return $this->anioTorneo;
        }
        public function getarrayTorneos() {
            return $this->arrayTorneos;
        }

        public function setAnioTorneo($anioTorneo) {
            $this->anioTorneo = $anioTorneo;
        }
        public function setarrayTorneos($arrayTorneos) {
            $this->arrayTorneos = $arrayTorneos;
        }

        //Métodos
        public function __construct($anioTorneo, $arrayTorneos) {
            $this->anioTorneo = $anioTorneo;
            $this->arrayTorneos = $arrayTorneos;
        }
        
        /**
         * Método 1: mostrarDatosArreglos - 
         * Retorna una cadena de strings de un arreglo recibido por parámetro.
         * @return string
         */
        public function mostrarDatosArreglos($unArreglo) {
            $cantElementos = count($unArreglo);
            $cadena = "";
            for ($i=0; $i<$cantElementos; $i++) {
                $cadena .= $unArreglo[$i]."<<---------------------------->>\n";
            }
            return $cadena;
        }

        public function __toString() {
            $cadena = "| AÑO TORNEO: ".$this->getAnioTorneo()."\n"
                    ."| TORNEOS: ".$this->mostrarDatosArreglos($this->getarrayTorneos())."\n";
            return $cadena;
        }
    }
?>