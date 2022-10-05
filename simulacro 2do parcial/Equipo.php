<?php

class Equipo{
    private $codEquipo;
    private $nombre;
    private $nombreCapitan;
    private $cantJugadores;
    private $objCategoria;


    public function __construct($codigo,$name, $captain,$jugadoresCant,$categorias){
        $this->codEquipo = $codigo;
        $this->nombre = $name;
        $this->nombreCapitan = $captain;
        $this->cantJugadores = $jugadoresCant;
        $this->objCategoria = $categorias;
        
    }
    
    public function getCodEquipo(){
        return $this->codEquipo;
    }

    public function setCodEquipo($codigo){
        $this->codEquipo = $codigo;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($name){
        $this->nombre = $name;
    }

    public function getNombreCapitan(){
        return $this->nombreCapitan;
    }

    public function setNombreCapitan($captain){
        $this->nombreCapitan = $captain;
    }

    public function getCantJugadores(){
        return $this->cantJugadores;
    }

    public function setCantJugadores($jugadoresCant){
        $this->cantJugadores = $jugadoresCant;
    }

    public function getObjCategoria(){
        return $this->objCategoria;
    }

    public function setObjCategoria($categorias){
        $this->objCategoria = $categorias;
    }


    public function __toString()
    {
        $info= "
        CODIGO DEL EQUIPO:  {$this->getCodEquipo()}
        NOMBRE DEL EQUIPO: {$this-> getNombre()}
        NOMBRE DEL CAPITAN:  {$this->getNombreCapitan()}
        CANTIDAD DE JUGADORES:  {$this->getCantJugadores()}
        CATEGORIA:  {$this->getObjCategoria()}
        ";
        return $info;
    }

  
}