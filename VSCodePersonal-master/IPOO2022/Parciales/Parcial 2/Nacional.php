<?php
    class Nacional extends Viajes {
        private $porcentajeDescuento;

        //Métodos de acceso
        public function getPorcentajeDescuento() {
            return $this->porcentajeDescuento;
        }
        
        public function setPorcentajeDescuento($porcentajeDescuento) {
            $this->porcentajeDescuento = $porcentajeDescuento;
        }

        //Métodos
        public function __construct($destino, $horaPartida, $horaLlegada, $numero, $importe, $cantAsientos, $objResponsable, $porcentajeDescuento) {
            parent::__construct($destino, $horaPartida, $horaLlegada, $numero, $importe, $cantAsientos, $objResponsable);
            $this->porcentajeDescuento = $porcentajeDescuento;
        }

        /**
         * Método 1: calcularImporteViaje - 
         * Retorna el valor del coeficiente base - porcentajeDescuento.
         */
        public function calcularImporteViaje() {
            $importeViaje = parent::calcularImporteViaje();
            $porcentajeDescuento = $this->getPorcentajeDescuento();
            $importeViaje -= $importeViaje * $porcentajeDescuento;
            return $importeViaje;
        }

        public function __toString() {
            return parent::__toString().
            "   + Porcentaje de descuento: ".$this->getPorcentajeDescuento()."%\n";
        }
    }
?>