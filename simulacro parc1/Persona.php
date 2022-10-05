<?php

class Persona {
    private $nombre;
    private $apellido;
    private $dni;
    private $direccion;
    private $mail;
    private $telefono;
    private $neto;

    public function __construct($name, $surname, $id,$address,$email, $phone,$cash){
        $this->nombre = $name;
        $this->apellido = $surname;
        $this->dni = $id;
        $this->direccion = $address;
        $this->mail = $email;
        $this->telefono = $phone;
        $this->neto =$cash;

    }
    
    public function getNombre(){
       return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }


    public function getDni(){
        return $this->dni;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function getMail(){
        return $this->mail;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function getNeto(){
        return $this->neto;
    }
    
    public function setNombre($name){
       $this->nombre = $name;
     }
 
     public function setApellido($surname){
        $this->apellido = $surname;
     }
 
 
     public function setDni($id){
        $this->dni = $id;
     }
 
     public function setDireccion($address){
        $this->direccion = $address;
     }
 
     public function setMail($email){
        $this->mail = $email;
     }
 
     public function setTelefono($phone){
        $this->telefono = $phone;
     }
 
     public function setNeto($cash){
        $this->neto = $cash;
     }
    
    public function __toString(){
        $datos="
        NOMBRE: {$this->getNombre()}\n
        APELLIDO: {$this->getApellido()} \n
        DIRECCIÓN: {$this->getDireccion()}\n
        MAIL: {$this->getMail()} \n
        TELÉFONO: {$this->getTelefono()}  \n
        NETO: {$this->getNeto()} \n";
        return $datos;
    }
}