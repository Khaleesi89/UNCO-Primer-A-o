<?php

/*1. Se registra la siguiente información: nombre, apellido, Nro de Documento, direccion, mail y telefono.
2. Método constructor que recibe como parámetros los valores iniciales para los atributos definidos en la
clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método toString para que retorne la información de los atributos de la clase. */



class Responsable{
    private $nombre;
    private $apellido;
    private $nroDocumento;
    private $direccion;
    private $mail;
    private $telefono;


    public function __construct($name, $surname,$id,$address,$email,$phone){
        $this->nombre = $name;
        $this->apellido = $surname;
        $this->nroDocumento = $id;
        $this->direccion = $address;
        $this->mail = $email;
        $this->telefono = $phone;
        
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

    public function getNroDocumento(){
        return $this->nroDocumento;
    }

    public function setNroDocumento($id){
        $this->nroDocumento = $id;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function setDireccion($address){
        $this->direccion = $address;
    }

    public function getMail(){
        return $this->mail;
    }

    public function setMail($email){
        $this->mail = $email;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function setTelefono($phone){
        $this->telefono = $phone;
    }

    public function __toString(){
        $info = "
        NOMBRE: {$this->getNombre()}
        APELLIDO: {$this->getApellido()}
        NRO DOCUMENTO: {$this->getNroDocumento()}
        DIRECCION: {$this->getDireccion()}
        MAIL: {$this->getMail()}
        TELEFONO: {$this->getTelefono()}
        ";
        return $info;
        
    }
}