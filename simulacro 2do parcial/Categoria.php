<?php

class Categoria{
    private $idCategoria;
    private $descripcion;


    public function __construct($codCategoria,$detalle){
        $this->idCategoria = $codCategoria;
        $this->descripcion = $detalle;
        
    }
    

    public function getIdCategoria(){
        return $this->idCategoria;
    }

    public function setIdCategoria($codCategoria){
        $this->idCategoria = $codCategoria;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setDescripcion($detalle){
        $this->descripcion = $detalle;
    }

    public function __toString(){
        $info = "
        CODIGO DE CATEGORIA: {$this->getIdCategoria()}
        DESCRIPCION: {$this->getDescripcion()}
        ";
        return $info;
        
    }


    public function getCoeficienteCategoria(){
        $coeficiente = 0.0;
        if($this->getDescripcion()=="MENORES"){
            $coeficiente = 0.11;
        }
        if($this->getDescripcion()=="JUVENILES"){
            $coeficiente = 0.17;
        }
        if($this->getDescripcion()=="MAYORES"){
            $coeficiente = 0.23;
        }
        return $coeficiente;
    }

}