<?php

/*1. Se registra la siguiente información: denominación, dirección y la colección empresas registradas en la
terminal.
2. Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase.
3. Los métodos de acceso para cada una de las variables instancias de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase. */


class Terminal{
    private $denominacion;
    private $direccion;
    private $colecEmpresas = [];

    public function __construct($denominacionTerminal, $address,$arrayEmpresas){
        $this->denominacion = $denominacionTerminal;
        $this->direccion = $address;
        $this->colecEmpresas = $arrayEmpresas;
        
    }
    

    public function getDenominacion(){
        return $this->denominacion;
    }

    public function setDenominacion($denominacionTerminal){
        $this->denominacion = $denominacionTerminal;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function setDireccion($address){
        $this->direccion = $address;
    }

    public function getColecEmpresas(){
        return $this->colecEmpresas;
    }

    public function setColecEmpresas($arrayEmpresas){
        $this->colecEmpresas = $arrayEmpresas;
    }

    public function __toString(){
        $empresitas = $this->mostrarEmpresas();
        $info="
        DENOMINACION DE LA TERMINAL: {$this->getDenominacion()}
        DIRECCION DE LA TERMINAL: {$this->getDireccion()}
        COLECCION DE EMPRESAS: {$empresitas}
         ";
        return $info;
    }

    public function mostrarEmpresas(){
        $emmpre ="";
        $colexViajes = $this-> getColecEmpresas();
        for ($i=0; $i< count($colexViajes);$i++){
            $objViagemcito = $colexViajes[$i];
            $emmpre = $emmpre . "-----viaje" . ($i);
            $emmpre = $emmpre . $objViagemcito . "\n";
        }
        return $emmpre;

    }

    /* 5. Implementar el método ventaAutomatica($cantAsientos, $fecha, $destino, $empresa) que recibe por
parámetro la cantidad de asientos que se requieren, una fecha, un destino y la empresa con la que se
desea viajar. Automáticamente se registra la venta del viaje. (Para la implementación de este método
debe utilizarse uno de los métodos implementados en la clase Viaje).*/

    public function ventaAutomatica($cantAsientos, $fecha, $destino, $objEmpresa){

        $viajes = $objEmpresa-> getColeccViajes();
        $a = 0;
        $salida = true;
        while($salida){
            $viajeParticular = $viajes[$a];
            $fechaParticular = $viajeParticular->getFecha();
            $destinoParticular =$viajeParticular->getDestino();
            $asientosDisponiblesParticular =$viajeParticular->getCantAsientosDisponibles();


            $a++;
        }

        //asignarAsientosDisponibles($catAsientos)

    }
   



    /*6. Implementar el método empresaMayorRecaudacion retorna un objeto de la clase empresa que se corresponde
con la de mayor recaudación.*/

        public function empresaMayorRecaudacion(){
        
            $arrayEmpresas = $this->getColecEmpresas();
        }




    /*7. Implementar el método responsableViaje($numeroViaje) que recibe por parámetro un numero de viaje
y retorna al responsable del viaje. */

    public function responsableViaje($numeroViaje){
        $arrayEmpresas = $this->getColecEmpresas();
        $a = 0;
        $salir = true;
        $responsablePersona = "NADIE";
        while($salir){
            $viajeTram = $arrayEmpresas[$a];
            $numeritoViaje = $viajeTram->getNro();
            if($numeroViaje == $numeritoViaje){
                $responsablePersona = $viajeTram->getObjPersonaResponsable();
            }else{
                $a++;
            }
           
        }
        return $$responsablePersona;


        
    }

}