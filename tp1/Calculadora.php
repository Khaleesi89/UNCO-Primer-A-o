<?php

class Calculadora{

    //atributos

    private $primerNumero;
    private $segundoNumero;

    public function __construct($numeroA , $numeroB){
        $this->primerNumero = $numeroA;
        $this->segundoNumero = $numeroB;
    }
    
    // metodos
    public function getPrimerNumero(){
        return $this->primerNumero;
    }

    public function getSegundoNumero(){
        return $this->segundoNumero;
    }

    public function setPrimerNumero($numeroUno){
        $this->primerNumero=$numeroUno;
    }

    public function setSegundoNumero($numeroDos){
        $this->segundoNumero=$numeroDos;
    }

    // operaciones

    public function sumando(){
        $suma = $this-> getPrimerNumero() + $this->getSegundoNumero();
        return $suma;
    }

    public function restando(){
        $resta = $this-> getPrimerNumero()- $this->getSegundoNumero();
        return $resta;
    }

    public function multiplicando(){
        $producto = $this-> getPrimerNumero() * $this->getSegundoNumero();
        return $producto;
    }

    public function dividiendo(){
        $cociente = $this-> getPrimerNumero() / $this->getSegundoNumero();
        return $cociente;
    }

   public function __toString(){
        $cadena = "valor1 es " . $this->getPrimerNumero(). "y el valor2 es " . $this->getSegundoNumero(). ".";
        return $cadena; 
    }

}