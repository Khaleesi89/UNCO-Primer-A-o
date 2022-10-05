Persona (DNI, Nombre y Apellido)

<?php

class Persona{
    private $dni;
    private $nombre;
    private $apellido;

    public function __construct($id, $name,$surname){
        $this->dni = $id;
        $this->nombre = $name;
        $this->apellido = $surname;
        
    }

    

    public function getDni(){
        return $this->dni;
    }

    public function setDni($id){
        $this->dni = $id;
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

    public function __toString(){
        $info = "
        DOCUMENTO: {$this->getDni()}
        NOMBRE: {$this->getNombre()}
        APELLIDO: {$this->getApellido()}
        ";
        return $info;
    }
}