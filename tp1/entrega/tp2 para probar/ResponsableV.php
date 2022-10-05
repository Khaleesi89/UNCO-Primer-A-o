<?php

class ResponsableV{

    private $nroEmpleado;
    private $nroLicencia;
    private $nombreEmpleado;
    private $apellidoEmpleado;

    public function __construct($empleadoNumber, $numerLicencia,$empleadoNombre, $empleadoApellido){
        $this->nroEmpleado = $empleadoNumber;
        $this->nroLicencia = $numerLicencia;
        $this->nombreEmpleado = $empleadoNombre;
        $this->apellidoEmpleado = $empleadoApellido;
        
    }

    public function getNroEmpleado(){
        return $this->nroEmpleado;
    }

    public function setNroEmpleado($empleadoNumber){
        $this->nroEmpleado = $empleadoNumber;
    }

    public function getNroLicencia(){
        return $this->nroLicencia;
    }

    public function setNroLicencia($numerLicencia){
        $this->nroLicencia = $numerLicencia;
    }

    public function getNombreEmpleado(){
        return $this->nombreEmpleado;
    }

    public function setNombreEmpleado($empleadoNombre){
        $this->nombreEmpleado = $empleadoNombre;
    }

    public function getApellidoEmpleado(){
        return $this->apellidoEmpleado;
    }

    public function setApellidoEmpleado($empleadoApellido){
        $this->apellidoEmpleado = $empleadoApellido;
    }

    public function __toString(){
        $rsponsable ="
        NUMERO DE EMPLEADO: {$this->getNroEmpleado()}
        NUMERO DE LICENCIA: {$this->getNroLicencia()}
        NOMBRE DEL EMPLEADO: {$this->getNombreEmpleado()}
        APELLIDO DEL EMPLEADO: {$this->getApellidoEmpleado()}
        ";
        return $rsponsable;
        
    }



}
