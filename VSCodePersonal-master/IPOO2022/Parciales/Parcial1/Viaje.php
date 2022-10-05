<?php
/**
 * Se registra la siguiente información:
 * destino, hora de partida, hora de llegada, número, importe, fecha,
 * cantidad de asientos totales, cantidad de asientos disponibles,
 * y una referencia a la persona responsable del viaje
 */
    class Viaje {
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
         * Método 1: asignarLugaresDisponibles - 
         * Retorna TRUE si se pueden asignar la cant. de asientos ingresada.
         * FALSE en caso contrario.
         * @return boolean
         */
        public function asignarLugaresDisponibles($cantAsientos) {
            $boolean = true;
            $cantMaxAsientos = $this->getCantAsientos();
            $cantAsientosLibres = $this->setCantAsientosLibres($cantMaxAsientos);
            if ($cantMaxAsientos <= $cantAsientos && $cantAsientosLibres < $cantAsientos) {
                $boolean = false;
            } else {
                $this->setCantAsientosLibres($cantMaxAsientos - $cantAsientos);
                $this->setFecha(getdate());
                $boolean = true;
            }
            return $boolean;
        }

        public function __toString() {
            $objResponsable = $this->getObjResponsable();
            $cadena = "+ Destino: ".$this->getDestino()."\n".
                    "+ Hora de Partida: ".$this->getHoraPartida()."\n".
                    "+ Hora de llegada: ".$this->getHoraLlegada()."\n".
                    "+ Número: ".$this->getNumero()."\n".
                    "+ Importe: ".$this->getImporte()."\n".
                    "+ Fecha: ".$this->getFecha()."\n".
                    "+ Cantidad de Asientos: ".$this->getCantAsientos()."\n".
                    "+ Asientos Disponibles: ".$this->getCantAsientosLibres()."\n".
                "+ Responsable del Viaje: \n".$objResponsable."\n";
            return $cadena;
        }
    }
?>