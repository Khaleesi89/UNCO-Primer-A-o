<?php

class Cuadrado{


    /*
    A---------B

    C---------D

    */

    //ATRIBUTOS

    private $arrayDePuntos = ["PuntoA" => [],
                              "PuntoB" => [],
                              "PuntoC" => [],
                              "PuntoD" => []];
    
    public function __construct($A,$B,$C,$D){
        $this->arrayDePuntos = ["PuntoA" => $A,
                                "PuntoB" => $B,
                                "PuntoC" => $C,
                                "PuntoD" => $D];   
    }
    
    public function getPuntoA(){
        return $this->PuntoA;
    }
    
    public function setPuntoA($A){
        $this->PuntoA = $A;
    } 
    
    public function getPuntoB(){
        return $this->PuntoB;
    }
    
    public function setPuntoB($B){
        $this->PuntoB = $B;
    }
    
    public function getPuntoC(){
        return $this->PuntoC;
    }
    
    public function setPuntoC($C){
        $this->PuntoC = $C;
    } 
    
    public function getPuntoD(){
        return $this->PuntoD;
    } 
    
    public function setPuntoD($D){
        $this->PuntoD = $D;
    } 
    

    
    

}    