<?php

class Una{
    private $objDos;
    public function __construct($obj){
        $this->objDos=$obj;
    }
    private function getInfo(){
        return "info";
    }
    public function getDos(){
        return $this->objDos;
    }
    public function __toString()
    {
        return $this->getInfo().$this->getDos()->getInfo();
    }
      
}

class Dos{
    public function getInfo(){
        return "info Dos";
    }
    public function __toString(){
        return $this->getInfo();
    }
}