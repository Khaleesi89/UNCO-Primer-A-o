<?php


//Los torneos Provinciales almacenan además el nombre de la Provincia en la que serán jugados sus partidos.

//El premio es otorgado al equipo que ha ganado mas partidos,

class TP extends Torneo{
    private $provinciaJuegos;

    public function __construct($codigo, $arrayPartiditos,$money, $localidad,$provincia){
        parent::__construct($codigo, $arrayPartiditos,$money,$localidad);
        $this->provinciaJuegos = $provincia;
        
    }


    public function getProvinciaJuegos(){
        return $this->provinciaJuegos;
    }

    public function setProvinciaJuegos($provincia){
        $this->provinciaJuegos = $provincia;
    }

    public function __toString(){
        $info = "TORNEO". "\n";
        $info .= parent::__toString() . "\n";
        $info .= "PROVINCIA DONDE SE JUGARÁ: ".$this->getProvinciaJuegos()."\n";
        return $info;
    }


}
