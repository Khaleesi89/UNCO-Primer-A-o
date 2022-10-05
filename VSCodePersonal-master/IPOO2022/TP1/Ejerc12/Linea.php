<?php
    class Linea {
        private $pA; //punto 1 x
        private $pB; //punto 1 y
        private $pC; //punto 2 x
        private $pD; //punto 2 y
        //punto 1 (1, 2) - punto 2 (4, 8)

        //Métodos de acceso
        public function getPA() {
            return $this->pA;
        }
        public function getPB() {
            return $this->pB;
        }
        public function getPC() {
            return $this->pC;
        }
        public function getPD() {
            return $this->pD;
        }

        public function setPA($pA) {
            $this->pA = $pA;
        }
        public function setPB($pB) {
            $this->pB = $pB;
        }
        public function setPC($pC) {
            $this->pC = $pC;
        }
        public function setPD($pD) {
            $this->pD = $pD;
        }

        //Métodos
        public function __construct($pA, $pB, $pC, $pD) {
            $this->puntoA = $pA;
            $this->puntoB = $pB;
            $this->puntoC = $pC;
            $this->puntoD = $pD;
        }

        //mueveDerecha($d): Desplaza la línea a la derecha la distancia(d) recibida por parámetro
        public function mueveDerecha($d) {
            $x1 = $this->getPC() + $d; //4 + 5 = 9
            $x2 = $this->getPA() + $d; //1 + 5 = 6
            $nuevoPunto = $x1
        }

        //mueveIzquierda($d): Desplaza la línea a la izquierda la distancia(d) recibida por parámetro
        public function mueveIzquierda($d) {

        }

        //mueveArriba($d): Desplaza la línea hacia arriba la distancia recibida por parámetro.
        public function mueveArriba($d) {

        }

        //mueveAbajo($d): Desplaza la línea hacia abajo la distancia recibida por parámetro
        public function mueveAbajo($d) {

        }

        public function __toString() {
            return "X = (".$this->getPA().", ".$this->getPB().") - Y = (".$this->getPC().", ".$this->getPD().")\n";
        }
    }
?>