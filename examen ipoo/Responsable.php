<?php
/*nombre, apellido, Nro de Documento, dirección, mail y teléfono*/

class Responsable{

    private $nombre;
    private $apellido;
    private $nroDocumento;
    private $direccion;
    private $email;
    private $telefono;



    public function __construct($name, $surname,$id,$address,$mail,$phone){

        $this->nombre = $name;
        $this->apellido = $surname;
        $this->nroDocumento = $id;
        $this->direccion = $address;
        $this->email = $mail;
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

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($mail){
        $this->email = $mail;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function setTelefono($phone){
        $this->telefono = $phone;
    }


    public function __toString()
    {
        $info= "
        ------RESPONSABLE------
        NOMBRE: {$this->getNombre()}
        APELLIDO: {$this->getApellido()}
        NRO DE DOCUMENTO: {$this->getNroDocumento()}
        DIRECCION: {$this->getDireccion()}
        EMAIL: {$this-> getEmail()}
        TELEFONO: {$this->getTelefono()}
        ";
        return $info;
    }



}
    