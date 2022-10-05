<?php
    //una fecha, una hora de llegada, una hora de partida y el conductor responsable del viaje
    class Viajes {
        private $destino;
        private $horaPartida;
        private $horaLlegada;
        private $numero;
        private $importe;
        private $fecha = "Sin asignar.";
        private $cantAsientos;
        private $cantAsientosLibres = 0;
        private $objResponsable;

        //Métodos de acceso:
        public function getDestino() {
            return $this->destino;
        }
        public function getHoraPartida() {
            return $this->horaPartida;
        }
        public function getHoraLlegada() {
            return $this->horaLlegada;
        }
        public function getNumero() {
            return $this->numero;
        }
        public function getImporte() {
            return $this->importe;
        }
        public function getFecha() {
            return $this->fecha;
        }
        public function getCantAsientos() {
            return $this->cantAsientos;
        }
        public function getCantAsientosLibres() {
            return $this->cantAsientosLibres;
        }
        public function getObjResponsable() {
            return $this->objResponsable;
        }

        public function setDestino($destino) {
            $this->destino = $destino;
        }
        public function setHoraPartida($horaPartida) {
            $this->horaPartida = $horaPartida;
        }
        public function setHoraLlegada($horaLlegada) {
            $this->horaLlegada = $horaLlegada;
        }
        public function setNumero($numero) {
            $this->numero = $numero;
        }
        public function setImporte($importe) {
            $this->importe = $importe;
        }
        public function setFecha($fecha) {
            $this->fecha = $fecha;
        }
        public function setCantAsientos($cantAsientos) {
            $this->cantAsientos = $cantAsientos;
        }
        public function setCantAsientosLibres($cantAsientosLibres) {
            $this->cantAsientosLibres = $cantAsientosLibres;
        }
        public function setObjResponsable($objResponsable) {
            $this->objResponsable = $objResponsable;
        }
        
        //Métodos
        public function __construct($destino, $horaPartida, $horaLlegada, $numero, $importe, $cantAsientos, $objResponsable) {
            $this->destino = $destino;
            $this->horaPartida = $horaPartida;
            $this->horaLlegada = $horaLlegada;
            $this->numero = $numero;
            $this->importe = $importe;
            $this->cantAsientos = $cantAsientos;
            $this->objResponsable = $objResponsable;
        }

        /**
         * Método 1: calcularImporteViaje - 
         * Retorna el valor del coeficiente base * cant. goles * cant. jugadores.
         */
        public function calcularImporteViaje() {
            $importeBase = $this->getImporte();
            $cantMaxAsientos = $this->getCantAsientos();
            $cantAsientosLibres = $cantMaxAsientos;
            $cantAsientosVendidos = $cantMaxAsientos - $cantAsientosLibres;
            $importeFinal = $importeBase + ($importeBase * ($cantAsientosVendidos/$cantMaxAsientos));
            return $importeFinal;
        }

        public function __toString() {
            $objResponsable = $this->getObjResponsable();
            $cadena =
                    "\n   + Destino: ".$this->getDestino()."\n".
                    "   + Hora de Partida: ".$this->getHoraPartida()."\n".
                    "   + Hora de llegada: ".$this->getHoraLlegada()."\n".
                    "   + Número: ".$this->getNumero()."\n".
                    "   + Importe: ".$this->calcularImporteViaje()."\n".
                    "   + Fecha: ".$this->getFecha()."\n".
                    "   + Cantidad de Asientos: ".$this->getCantAsientos()."\n".
                    "   + Asientos Disponibles: ".$this->getCantAsientosLibres()."\n".
                    "   + Responsable del Viaje: \n".$objResponsable;
            return $cadena;
        }
    }
?>