<?php

class Reloj{

    private $horas;
    private $minutos;
    private $segundos;


    public function __construct($hs,$min,$seg){

        $this->horas = $hs;
        $this->minutos = $min;
        $this->segundos = $seg;
        
    }

    public function getHs(){
        return $this->horas;
    }
    public function setHs($hs){
        $this->horas = $hs;
    }


    public function getMin(){
        return $this->minutos;
    }
    public function setMin($min){
        $this->minutos = $min;
    }



    public function getSeg(){
        return $this->segundos;
    }



    public function setSeg($seg){
        $this->segundos = $seg;
    }

    //otros metodos

    public function puestaEnCero(){
        $this->horas = 0 ;
        $this->minutos = 0 ;
        $this->segundos = 0 ;
    }

    public function incremento(){
        if($this->segundos >59){
            $this->segundos = 0;
            if ($this->minutos > 59){
                $this->minutos = 0;
                if($this->horas = 24){
                    $this->horas = 0;
                }else{
                    $this->horas += 1;
                };
            }else{
                $this->minutos += 1;
            };
        }else{
            $this->segundos += 1;
        }
    }
// PREGUNTAR A MAX PORQUE LOS VALORES DE INCREMENTO SON DIFERENTES AL MIO

    public function __toString()
    {
       
        $hs =  $this->getHs();
        $min = $this->getMin();
        $seg = $this->getSeg();
        //return ". $hs ":" .$min":" .$seg";    PORQUE NO ME DEJA PONERLO LOS DOS PUNTOS?
       // return ". $hs .$min .$seg";
       echo "La hora ingresada es $hs:$min:$seg";
    }

}   