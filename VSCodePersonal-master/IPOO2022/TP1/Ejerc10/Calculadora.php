<?php

class Calculadora {
    //Declaración de atributos (private)
    private $numero1;
    private $numero2;

    //Sección de métodos get
    public function getNumero1() {
        return $this->numero1;
    }
    public function getNumero2() {
        return $this->numero2;
    }

    //Sección de métodos set
    public function setNumero1($numero1) {
        $this->numero1 = $numero1;
    }
    public function setNumero2($numero2) {
        $this->numero2 = $numero2;
    }

    public function __construct($numero1, $numero2) {
        $this->numero1=$numero1;
        $this->numero2=$numero2;
    }

    //Sección de operaciones
    public function Sumar() {
        //echo $this->getNumero1()." + ".$this->getNumero2()." = ";
        $suma = $this->getNumero1() + $this->getNumero2();
        return $suma;
    }
    public function Restar() {
        //echo $this->getNumero1() . " - " . $this->getNumero2() . " = ";
        $resta = $this->getNumero1() - $this->getNumero2();
        return $resta;
    }
    public function Multiplicar() {
        //echo $this->getNumero1() . " x " . $this->getNumero2() . " = ";
        $multiplicacion = $this->getNumero1() * $this->getNumero2();
        return $multiplicacion;
    }
    public function Dividir() {
        //echo $this->getNumero1() . " / " . $this->getNumero2() . " = ";
        if ($this->getNumero2() == 0) {
            $division = "ERROR. No se puede dividir por 0.";
        } else {
            $division = $this->getNumero1() / $this->getNumero2();
        }
        return $division;
    }
    public function __toString() {
        $cadena = " + El valor del nro. 1 es ".$this->getNumero1()." y el del nro.2 es ".$this->getNumero2()."\n";
        return $cadena;
    }
}