<?php
    class Partido {
        private $idPartido;
        private $fecha;
        private $objEquipo1;
        private $objEquipo2;
        private $cantGolesE1;
        private $cantGolesE2;

        //Métodos de acceso
        public function getIdPartido() {
            return $this->idPartido;
        }
        public function getFecha() {
            return $this->fecha;
        }
        public function getObjEquipo1() {
            return $this->objEquipo1;
        }
        public function getObjEquipo2() {
            return $this->objEquipo2;
        }
        public function getCantGolesE1() {
            return $this->cantGolesE1;
        }
        public function getCantGolesE2() {
            return $this->cantGolesE2;
        }

        public function setIdPartido($idPartido) {
            $this->idPartido = $idPartido;
        }
        public function setFecha($fecha) {
            $this->fecha = $fecha;
        }
        public function setObjEquipo1($objEquipo1) {
            $this->objEquipo1 = $objEquipo1;
        }
        public function setObjEquipo2($objEquipo1) {
            $this->objEquipo1 = $objEquipo1;
        }
        public function setCantGolesE1($cantGolesE1) {
            $this->cantGolesE1 = $cantGolesE1;
        }
        public function setCantGolesE2($cantGolesE2) {
            $this->cantGolesE2 = $cantGolesE2;
        }

        //Métodos
        public function __construct($idPartido, $fecha, $objEquipo1, $objEquipo2, $cantGolesE1, $cantGolesE2) {
            $this->idPartido = $idPartido;
            $this->fecha = $fecha;
            $this->objEquipo1 = $objEquipo1;
            $this->objEquipo2 = $objEquipo2;
            $this->cantGolesE1 = $cantGolesE1;
            $this->cantGolesE2 = $cantGolesE2;
        }

        /**
         * Método 1: coeficientePartido - 
         * Retorna el valor del coeficiente base * cant. goles * cant. jugadores.
         */
        public function coeficienteBase() {
            $coefBase = 0.5;
            /*$cantidadGoles = $this->getCantGolesE1() + $this->getCantGolesE2();
            $cantidadJugadores = $this->getObjEquipo1()->getCantJugadores() + $this->getObjEquipo2()->getCantJugadores();
            $coeficienteFinal = $coefBase * $cantidadGoles * $cantidadJugadores;*/
            $coefEquipo1 = $coefBase * $this->getObjEquipo1()->getCantJugadores() * $this->getCantGolesE1();
            $coefEquipo2 = $coefBase * $this->getObjEquipo2()->getCantJugadores() * $this->getCantGolesE2();
            $coeficienteFinal = $coefEquipo1 * $coefEquipo2;
            return $coeficienteFinal;
        }

        public function darGanadorPartido() {
            $datosGanador = null;
            $cantGolesjEquipo1 = $this->getCantGolesE1();
            $cantGolesjEquipo2 = $this->getCantGolesE2();
            /*if ($cantGolesjEquipo1 < $cantGolesjEquipo2) {
                $unGanador = $this->getObjEquipo1();
            } elseif ($cantGolesjEquipo1 > $cantGolesjEquipo2) {
                $unGanador = $this->getObjEquipo2();
            }*/
            if ($cantGolesjEquipo1 < $cantGolesjEquipo2) {
                $datosGanador = ["equipo" => $this->getObjEquipo1(),
                                "goles" => $cantGolesjEquipo1];
            } elseif ($cantGolesjEquipo1 > $cantGolesjEquipo2) {
                $datosGanador = ["equipo" => $this->getObjEquipo2(),
                                "goles" => $cantGolesjEquipo2];
            }
            return $datosGanador;
        }

        public function __toString() {
            $cadena = "  + ID Partido: ".$this->getIdPartido()."\n"
                    ."  + Fecha del partido: ".$this->getFecha()."\n"
                    ."  + Cantidad de goles EQUIPO 1: ".$this->getCantGolesE1()."\n"
                    ."  + Cantidad de goles EQUIPO 2: ".$this->getCantGolesE2()."\n";
            return $cadena;
        }
    }
?>