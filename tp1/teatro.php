<?php



class Teatro{
    private $nombre;
    private $direccion;
    private $funciones =[];



    public function __construct($name,$address,$funcion){
           $this->nombre = $name;
           $this->direccion = $address;
           $this->funciones = $funcion;
    }

    

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($name){
        $this->nombre = $name;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function setDireccion($address){
        $this->direccion = $address;
    }

    public function getFunciones(){
        return $this->funciones;
    }

    public function setFunciones($funcion){
        $this->funciones = $funcion;
    }

    //MOSTRAR DATOS DEL ARRAY

    public function mostrarFunciones($funciones){
        //$funciones = $this->getFunciones();
        foreach ($funciones as $key => $value) {
            echo "$key $value";  
            //return print_r($funciones);
        }
    }





    public function __toString(){
        $funciones = $this->getFunciones();
        $escritos = $this->mostrarFunciones($funciones);
        $info = "
        NOMBRE DEL TEATRO: {$this->getNombre()} \n
        DIRECCION DEL TEATRO: {$this->getDireccion()}  \n
        FUNCIONES: {$escritos} \n
        ";
        return $info;
    }
}






