<?php
//Modela cuadrados por medio de cuatro puntos (vértices)
//Arreglos asociativos: implementar c/u de los vértices
/** Métodos: 
 * 1. __construct(coordenasPuntos)
 * 2. get y set de cada atributo
 * 3. area: calcula el área del cuadrado
 * desplazar($d): método que recibe por parámetro un punto y desplaza el cuadrado en el plano desde su punto mas inferior izquierdo.
 * aumentarTamaño($t): recibe el tamaño que debe aumentar el cuadrado
 * __toString: retorna la información de los atributos de la clase.
 */

    class Cuadrado {
        private $vertice1;
        private $vertice2;
        private $vertice3;
        private $vertice4;

        public function __construct($v1, $v2, $v3, $v4) {
            $this->vertice1= $v1;
            $this->vertice2= $v2;
            $this->vertice3= $v3;
            $this->vertice4= $v4;
        }

        public function getVertice1() {
            return $this->vertice1;
        }
        public function getVertice2() {
            return $this->vertice2;
        }
        public function getVertice3() {
            return $this->vertice3;
        }
        public function getVertice4() {
            return $this->vertice4;
        }

        public function setVertice1($vertice1) {
            $this->vertice1 = $vertice1;
            return $this;
        }
        public function setVertice2($vertice2) {
            $this->vertice2 = $vertice2;
            return $this;
        }
        public function setVertice3($vertice3) {
            $this->vertice3 = $vertice3;
            return $this;
        }
        public function setVertice4($vertice4) {
            $this->vertice4 = $vertice4;
            return $this;
        }
        
        //Calcula el área del cuadrado.
        public function calcularArea() {
            $lado1 = ($this->getVertice2())["x"] - ($this->getVertice1())["x"];
            $calculoArea = $lado1 * $lado1; //pow($lado1, 2);
            return $calculoArea;
        }

        //desplazar($d):método que recibe por parámetro un punto y desplaza el cuadrado en el plano desde su punto mas inferior izquierdo.
        public function desplazar($d) {
            $distanciaX = $d["x"] - $this->getVertice1()["x"];
            echo "Punto x: ".$distanciaX."\n";
            $distanciaY = $d["y"] - $this->getVertice1()["y"];
            echo "Punto y: ".$distanciaY."\n";
            //Modifica coordenadas del vértice 1:
            $vertice1x = $this->getVertice1()["x"];
            $vertice1y = $this->getVertice1()["y"];
            $arrayV1 = ["x"=>($vertice1x + $distanciaX), "y"=>($vertice1y + $distanciaY)];
            $this->setVertice1($arrayV1);
        }

        /*//aumentarTamaño($t): recibe el tamaño que debe aumentar el cuadrado
        public function aumentarTamaño($t) {
            $this->setVertice2($this->getVertice1()["y"] + $t);
        }*/

        /*public function desplazarPrueba($punto) {
            $distanciaVertice1 = $this->getVertice3 - $this->getVertice1();
            $v1 = $this->setVertice1($punto);
            $xv2 = $this->getVertice1()[0] + $distanciaVertice;
            $yv2 = $this->getVertice1()[1] + $distanciaVertice;
            $nuevoPunto = ($xv2, $yv2);
            $v2 = $this->setVertice2($nuevoPunto);
            return $this->getVertice1().", ".$this->getVertice2();
        }*/

        public function __toString() {
        return "Vértice 1 (x): ".$this->getVertice1()["x"]." - (y): ".$this->getVertice1()["y"]."\n";
        }
    }
?>