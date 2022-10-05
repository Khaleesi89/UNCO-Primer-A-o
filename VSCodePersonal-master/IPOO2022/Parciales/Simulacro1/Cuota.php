<?php
//número, monto_cuota, monto_interes y cancelada (atributo que va a contener un valor true, si la cuota esta paga y false en caso contrario).
    class Cuota {
        private $numero;
        private $monto_cuota;
        private $monto_interes;
        private $cancelada;

        //Métodos de acceso
        public function getNumero() {
            return $this->numero;
        }
        public function getMonto_Cuota() {
            return $this->monto_cuota;
        }
        public function getMonto_Interes() {
            return $this->monto_interes;
        }
        public function getCancelada() {
            return $this->cancelada;
        }

        public function setNumero($numero) {
            $this->numero = $numero;
        }
        public function setMonto_Cuota($monto_cuota) {
            $this->monto_cuota = $monto_cuota;
        }
        public function setMonto_Interes($monto_interes) {
            $this->monto_interes = $monto_interes;
        }
        public function setCancelada($cancelada) {
            $this->cancelada = $cancelada;
        }

        //Métodos
        public function __construct($numero, $monto_cuota, $monto_interes) {
            $this->numero = $numero;
            $this->monto_cuota = $monto_cuota;
            $this->monto_interes = $monto_interes;
            $this->cancelada = false;
        }

        public function darMontoFinalCuota() {
            $montoCuota = $this->getMonto_Cuota();
            $montoInteres = $this->getMonto_Interes();
            $MontoFinal = $montoCuota + $montoInteres;
            return $this->setMonto_Cuota($MontoFinal);
        }

        private function estadoCuota(){
            if ($this->getCancelada() == true){
                $cadena = "Pagada";
            }else{
                $cadena = "Sin pagar";
            }
            return $cadena;
        }

        public function __toString() {
            $cadena = "\n+| Cuota N°: ".$this->getNumero()."\n"
                    ."+| Monto cuota final: ".$this->getMonto_Cuota()."\n"
                    ."+| Monto interés (incluido en el monto final): ".$this->getMonto_Interes()."\n"
                    ."+| Estado: ".$this->estadoCuota()."\n";
            return $cadena;
        }
    }
?>