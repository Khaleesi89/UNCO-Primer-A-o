<?php

class Basket extends Partido{
    private $infracciones;



    public function __construct($codPartido,$date,$goles1,$goles2,$equipo1,$equipo2,$infrax){
        parent::__construct($codPartido,$date,$goles1,$goles2,$equipo1,$equipo2);
        $this->infracciones = $infrax;
        
    }
       

    public function getInfracciones(){
        return $this->infracciones;
    }

    public function setInfracciones($infrax){
        $this->infracciones = $infrax;
    }

    public function coeficientePartido(){
        $coeficiente = parent::coeficientePartido();
        $coeficiente = $coeficiente - 0.75 * $this->getInfracciones();
        return $coeficiente;
        
    }
    
    public function __toString()
    {
        $info = "partido de basket "."\n";
        $info .= parent::__toString() . "\n";
        $info .= "infracciones: ". $this->getInfracciones()."\n";
        return $info; 
    }
}

