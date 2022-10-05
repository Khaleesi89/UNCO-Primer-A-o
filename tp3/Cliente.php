<?php
/*hereda de la clase Persona (DNI, Nombre y Apellido) con la
información básica de un cliente (Nro. de Cliente, DNI, Nombre y Apellido).*/




class Cliente extends Persona{
    private $nroCliente;
    
    public function __construct($nroId,$nombrePersona, $apellidoPersona, $clienteNumero){
        
        parent::__construct($nroId,$nombrePersona, $apellidoPersona);
                $this->nroCliente = $clienteNumero;
        
    }

    public function getNroCliente(){
        return $this->nroCliente;
    }

    public function setNroCliente($clienteNumero){
        $this->nroCliente = $clienteNumero;
    }

    public function __toString(){
        $info = parent::__toString();
        $info.="NRO CLIENTE: ". $this->getNroCliente();
        return $info;
        
    }
}