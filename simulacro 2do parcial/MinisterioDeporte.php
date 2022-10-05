<?php

/*Cómo el ministerio de Deporte de la Nación desea almacenar información de todos los torneos Nacionales y
Provinciales organizados cada año en el país, se modela la clase MinisterioDeporte que almacena el año y la
colección de torneos anuales y provinciales del País que serán llevados a cabo. */

class MinisterioDeporte{

    private $anioTorneo;
    private $colexTorneos;


    public function __construct($aniooTorn,$arrayTorneos){
        $this->anioTorneo = $aniooTorn;
        $this->colexTorneos = $arrayTorneos;
    }


    

    public function getAnioTorneo(){
        return $this->anioTorneo;
    }

    public function setAñoTorneo($aniooTorn){
        $this->añoTorneo = $aniooTorn;
    }

    public function getColexTorneos(){
        return $this->colexTorneos;
    }

    public function setColexTorneos($arrayTorneos){
        $this->colexTorneos = $arrayTorneos;
    }


    public function mostrarColeccion(){
        $str ="";
        $array = $this->getColexTorneos();
        foreach ($array as $key) {
            $str .= " ".$key;
        }
        return $str;
    }



    

    public function __toString(){
        $colec = $this->getColexTorneos();
        $torneos = $colec->mostrarColeccion();
        $info= "
        AÑO DEL TORNEO: {$this->getAnioTorneo()}
        COLECCION DE TORNEOS: {$torneos}
        ";
        return $info;
    }



    /*  Implementar el método registrarTorneo($ColPartidos,$tipo,$ArrayAsociativo) en la clase
        MinisterioDeporte que recibe la colección de partidos que se van a jugar en el torneo, el tipo que indica si
        es nacional o provincial y un arreglo asociativo cuyas claves van a coincidir con la info necesaria para
        crear el torneo dependiendo su tipo. El método debe retornar la instancia de la clase Torneo creada
        según corresponda. */
       

        public function registrarTorneo($ColPartidos,$tipo,$ArrayAsociativo){
            if($tipo == "TN"){
                //($codigo,$arrayPartidos,$cashPremios)
                $nacional = new TN();

            }else{
                $provincial = new TP();
                //($codigo,$arrayPartidos,$cashPremios,$provincia)
            }
        }




         /* 7. Implementar el método otorgarPremioTorneo($idTorneo) en la clase MinisterioDeporte el cual debe
        retornar el objeto del equipo ganador y el importe correspondiente a su premio. Para la implementación
        del método debe invocar a/los métodos implementados. */


        public function otorgarPremioTorneo($idTorneo){

        }
}