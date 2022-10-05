<?php

class Persona{
    private $nombre;
    private $apellido;
    private $tipoDocumento;
    private $nroDocumento;

    public function __construct($name, $surname,$tipoIdent,$id){
        $this->nombre = $name;
        $this->apellido= $surname;
        $this->tipoDocumento= $tipoIdent;
        $this->nroDocumento= $id;
    }
    
    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($name){
        $this->nombre = $name;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function setApellido($surname){
        $this->apellido = $surname;
    }

    public function getTipoDocumento(){
        return $this->tipoDocumento;
    }

    public function setTipoDocumento($tipoIdent){
        $this->tipoDocumento = $tipoIdent;
    }

    public function getNroDocumento(){
        return $this->nroDocumento;
    }

    public function setNroDocumento($id){
        $this->nroDocumento = $id;
    }

    public function __toString(){
        $info = "
        NOMBRE: {$this->getNombre()}
        APELLIDO: {$this->getApellido()}
        TIPO DE DOCUMENTO: {$this->getTipoDocumento()}
        NUMERO DE DOCUMENTO: {$this->getNroDocumento()}
        ";
        return $info;
        
    }
}