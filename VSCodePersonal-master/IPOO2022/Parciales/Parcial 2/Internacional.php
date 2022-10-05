<?php
    class Internacional extends Viajes {
        private $documentacion;
        private $porcentajeImpuestos;

        //Métodos de acceso
        public function getDocumentacion() {
            return $this->documentacion;
        }
        public function getPorcentajeImpuestos() {
            return $this->porcentajeImpuestos;
        }

        public function setDocumentacion($documentacion) {
            $this->documentacion = $documentacion;
        }
        public function setPorcentajeImpuestos($porcentajeImpuestos) {
            $this->porcentajeImpuestos = $porcentajeImpuestos;
        }
        
        //Métodos
        public function __construct($destino, $horaPartida, $horaLlegada, $numero, $importe, $cantAsientos, $objResponsable, $documentacion, $porcentajeImpuestos) {
            parent::__construct($destino, $horaPartida, $horaLlegada, $numero, $importe, $cantAsientos, $objResponsable);
            $this->documentacion = $documentacion;
            $this->porcentajeImpuestos = $porcentajeImpuestos;
        }

        /**
         * Método 1: calcularImporteViaje - 
         * Retorna el valor del coeficiente base - porcentajeDescuento.
         */
        public function calcularImporteViaje() {
            $importeViaje = parent::calcularImporteViaje();
            $importeViaje += $importeViaje * 0.45;
            return $importeViaje;
        }

        public function __toString() {
            return parent::__toString()
            ."  + Documentación requerida: ".$this->getDocumentacion()."\n"
            ."  + Porcentaje por Impuestos: ".$this->getPorcentajeImpuestos()."%\n";
        }
    }
?>