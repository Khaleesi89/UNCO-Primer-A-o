<?php

class Futbol extends Partido{


    public function __construct($codPartido,$date,$goles1,$goles2,$equipo1,$equipo2){
        parent::__construct($codPartido,$date,$goles1,$goles2,$equipo1,$equipo2);

    }

    public function __toString(){
        $info = "PARTIDO DE FUTBOL". "\n";
        $info .=parent::__toString()."\n";
        return $info;
    }

    public function coeficientePartido(){
        $coeficiente = parent::coeficientePartido();
        $coeficiente = $coeficiente + $coeficiente * $this->getObjEquipos()[0]->getObjCategoria()
                    + $coeficiente + $coeficiente * $this->getObjEquipos()[1]->getObjCategoria();
        return $coeficiente;
    }    
    
    
}