
<?php

class Empresa{
    private $identificacion;
    private $nombre;
    private $coleccViajes;

    public function __construct($id, $name,$arrayViajes){
        $this->identificacion = $id;
        $this->nombre = $name;
        $this->coleccViajes = $arrayViajes;
        
    }

    public function getIdentificacion(){
        return $this->identificacion;
    }

    public function setIdentificacion($id){
        $this->identificacion = $id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($name){
        $this->nombre = $name;
    }

    public function getColeccViajes(){
        return $this->coleccViajes;
    }

    public function setColeccViajes($arrayViajes){
        $this->coleccViajes = $arrayViajes;
    }

    public function __toString(){
        $colec = $this->getColeccViajes();
        $array = $this->mostrarViajes($colec);
        $info = "
        -----EMPRESA------
        IDENTIFICACION: {$this->getIdentificacion()}
        NOMBRE:  {$this->getNombre()}
        COLECCION DE VIAJES: $array
        ";
        return $info;

        
        
    }


    public function mostrarViajes($arrayCompleto){
        $stringObj = "";
        foreach ($arrayCompleto as $key) {
           
            $stringObj = " " .$key;
        }
        return $stringObj;
    }



    /* 5. Implementar el método buscarViaje(codViaje) que dado un código de viaje que se recibe por parámetro,
    retorna el objeto viaje correspondiente a ese código. */

    public function buscarViaje($idViaje){
        $array = $this->getColeccViajes();
        $cantidad = count($array);
        $salida = true;
        $i = 0;
        $viajecito = null;
        while ($salida && $i < $cantidad){
            $viaje = $array[$i];
            $id = $viaje->getNumero();
            if($idViaje == $id){
                $salida = false;
                $viajecito = $array[$i];
            }else{
                $i++;
            }
        }
        return $viajecito;
    }


    /* 6. Implementar el método darCostoViaje(codViaje) que dado un código de viaje retorna el importe
    correspondiente a ese viaje. */


    public function darCostoViaje($codViaje){
        $viajeEncontrado = $this->buscarViaje($codViaje);
        $codigo = $viajeEncontrado->getNumero();
        if($codViaje == $codigo){
            $importe = $viajeEncontrado->importeTotal();
        }
        return $importe;

    }


    /*AGREGA VIAJES A LA COLECCION */

    public function viajesAgregar($viaje){
        $colec = $this->getColeccViajes();
        array_push($colec,$viaje);
        $this->setColeccViajes($colec);


    }
}
