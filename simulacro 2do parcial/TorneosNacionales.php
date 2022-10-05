<?php


 /* y si se trata de un torneo Nacional el premio económico esta
formado por: el premio base mas el 10% del premio económico por la cantidad de partidos ganados.*/

class TN extends Torneo{


    //public function __construct($codigo,$arrayPartidos,$cashPremios)

    public function __construct($codigo,$arrayPartidos,$cashPremios,$localidad){
        parent::__construct($codigo,$arrayPartidos,$cashPremios,$localidad);

    }


    public function __toString(){
        
        $info = parent::__toString();
        return $info;
    }

    






}