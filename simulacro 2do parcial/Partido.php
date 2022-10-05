<?php

class Partido{
    private $idPartido;
    private $fecha;
    private $cantGolesE1;
    private $cantGolesE2;
    private $objEquipos;
    



    public function __construct($codPartido,$date,$goles1,$goles2,$equipo1,$equipo2){
        $this->idPartido = $codPartido;
        $this->fecha = $date;
        $this->cantGolesE1 = $goles1;
        $this->cantGolesE2 = $goles2;
        //AL HACER LO DE ABAJO, ES COMO UN ARRAY PUSH..AGREGA AL FINAL DEL ARRAY
        $this->objEquipos [] = $equipo1;
        $this->objEquipos [] = $equipo2;
        
    }

    public function getIdPartido(){
        return $this->idPartido;
    }

    public function setIdPartido($codPartido){
        $this->idPartido = $codPartido;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setFecha($date){
        $this->fecha = $date;
    }

    public function getCantGolesE1(){
        return $this->cantGolesE1;
    }

    public function setCantGolesE1($goles1){
        $this->cantGolesE1 = $goles1;
    }

    public function getCantGolesE2(){
        return $this->cantGolesE2;
    }

    public function setCantGolesE2($goles2){
        $this->cantGolesE2 = $goles2;
    }

    public function getObjEquipos(){
        return $this->objEquipos;
    }

    public function setObjEquipos($arrayEquipos){
        $this->objEquipos = $arrayEquipos;
    }

    
    public function mostrarEquipos($arrayCompleto){
        $stringObj = "";
        foreach ($arrayCompleto as $key) {
           
            $stringObj = " " .$key;
        }
        return $stringObj;
    }
    
    
    
    
    public function __toString(){
        //OTRA MANERA DE CONCATENAR
        $info = "CODIGO DEL PARTIDO ".$this->getIdPartido(). "\n";
        $info = "FECHA ".$this->getFecha()."\n";
        $info = "CANTIDAD DE GOLES EQUIPO 1 ".$this->getCantGolesE1()."\n";
        $info = "CANTIDAD DE GOLES EQUIPO 2 ".$this->getCantGolesE2()."\n";
        // se hace de esta manera para el string de cada equipo
        $info = "EQUIPO 1". $this->getObjEquipos()[0]."\n";
        $info = "EQUIPO 2". $this->getObjEquipos()[1]."\n";

    
        /*  ES UNA MANERA DE HACERLO
        $info = "
        CODIGO DEL PARTIDO: {$this->getIdPartido()}
        FECHA: {$this->getFecha()}
        CANTIDAD DE GOLES EQUIPO 1: {$this->getCantGolesE1()}
        CANTIDAD DE GOLES EQUIPO 2: {$this->getCantGolesE2()}
        EQUIPOS: {$this->getObjEquipos()}
        ";*/
        return $info; 
    }

    

    public function coeficientePartido(){
        $coeficiente = 0.5;
        // se toma la libertad de hacerlo como lo entendemos...esta manera de implementarlo qued como resultado el ultimo renglon
        $coeficiente = $coeficiente * $this->getCantGolesE1() * $this->getObjEquipos()[0]->getCantGolesE1();
        $coeficiente = $coeficiente * $this->getCantGolesE2() * $this->getObjEquipos()[1]->getCantGolesE2();
        return $coeficiente;
    }

    public function getGanador(){
        $asoc = null;
        if($this->getCantGolesE1() > $this->getCantGolesE2()){
            $asoc= array();
            $asoc["equipo"] = $this->getObjEquipos()[0];
            $asoc["goles"] = $this->getCantGolesE1();
           
        }else{
            $asoc= array();
            $asoc["equipo"] = $this->getObjEquipos()[1];
            $asoc["goles"] = $this->getCantGolesE2();
        }
        return $asoc;
    }

    
}