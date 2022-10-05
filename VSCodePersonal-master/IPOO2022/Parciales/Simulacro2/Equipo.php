<?php
    class Equipo {
        private $nombreEquipo;
        private $nombreCapitan;
        private $cantJugadores;
        private $categoria;

        //Métodos de acceso
        public function getNombreEquipo() {
            return $this->nombreEquipo;
        }
        public function getNombreCapitan() {
            return $this->nombreCapitan;
        }
        public function getCantJugadores() {
            return $this->cantJugadores;
        }
        public function getCategoria() {
            return $this->categoria;
        }

        public function setNombreEquipo($nombreEquipo) {
            $this->nombreEquipo = $nombreEquipo;
        }
        public function setNombreCapitan($nombreCapitan) {
            $this->nombreCapitan = $nombreCapitan;
        }
        public function setCantJugadores($cantJugadores) {
            $this->cantJugadores = $cantJugadores;
        }
        public function setCategoria($categoria) {
            $this->categoria = $categoria;
        }

        //Métodos
        public function __construct($nombreEquipo, $nombreCapitan, $cantJugadores, $categoria) {
            $this->nombreEquipo = $nombreEquipo;
            $this->nombreCapitan = $nombreCapitan;
            $this->cantJugadores = $cantJugadores;
            $this->categoria = $categoria;
        }

        public function __toString() {
            $cadena = "  + Nombre del equipo: ".$this->getNombreEquipo()."\n"
                    ."  + Nombre del capitán: ".$this->getNombreCapitan()."\n"
                    ."  + Cantidad de jugadores: ".$this->getCantJugadores()."\n"
                    ."  + Categoria: ".$this->getCategoria()."\n";
            return $cadena;
        }
    }
?>