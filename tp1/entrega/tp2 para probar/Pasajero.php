<?php

class Pasajero{

    //ATRIBUTOS
    private $nombre;
    private $apellido;
    private $documento;
    private $telefono;

    //CONSTRUCTOR
    public function __construct($name, $surname,$identificacion,$celular){
        $this->nombre = $name;
        $this->apellido = $surname;
        $this->documento = $identificacion;
        $this->telefono = $celular;
    
    }

    //METODOS
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

    
    public function getDocumento(){
        return $this->documento;
    }

    public function setDocumento($identificacion){
        $this->documento = $identificacion;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function setTelefono($celular){
        $this->telefono = $celular;
    }

    public function __toString(){
        $personaPasajero = "
        NOMBRE: {$this->getNombre()}
        APELLIDO: {$this->getApellido()}
        NUMERO DE DOCUMENTO: {$this->getDocumento()}
        TELEFONO: {$this->getTelefono()}
        ";
        return $personaPasajero;
    }

   
}
