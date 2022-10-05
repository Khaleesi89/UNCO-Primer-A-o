<?php

/*
La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.
Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase (incluso los datos de los pasajeros). Utilice un array que almacene la información correspondiente a los pasajeros. Cada pasajero es un array asociativo con las claves “nombre”, “apellido” y “numero de documento”.
Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar la información del viaje, modificar y ver sus datos
*/

class Viaje{

    // ATRIBUTOS //

    // código del viaje //
    private $codigoViaje;

    //destino //
    private $destino;
    
    //cantidad máxima de pasajeros //
    private $cantMaxPasajeros;

    //cantidad de pasajeros del viaje//
    private $cantPasajerosViaje;

    //pasajeros del viaje //
    private $pasajeros= [];


    //// CONSTRUCTOR ////
    public function __construct($codViagem , $destiny , $cantMaxPasaj, $cantidadGenteEnBus){
        $this->codigoViaje = $codViagem;
        $this->destino = $destiny;
        $this->cantMaxPasajeros = $cantMaxPasaj;
        $this->cantPasajerosViaje = $cantidadGenteEnBus;
           
    }   

    // METODOS //

    public function getCodigoViaje(){
        return $this->codigoViaje;
    }

    public function setCodigoViaje($codViagem){
        $this->codigoViaje=$codViagem;
    }
    ////////////////////////////////

    public function getDestino(){
        return $this->destino;
    }

    public function setDestino($destiny){
        $this->destino=$destiny;
    }

    ////////////////////////////////

    public function getCantPasajerosViaje(){
        return $this->cantPasajerosViaje;
    }

    public function setCantPasajerosViaje($cantidadGenteEnBus){
        $this->cantPasajerosViaje=$cantidadGenteEnBus;
    }

    ////////////////////////////////

    public function getCantMaxPasajeros(){
        return $this->cantMaxPasajeros;
    }
    public function setCantMaxPasajeros($cantMaxPasaj){
        $this->cantMaxPasajeros=$cantMaxPasaj;
    }

    ////////////////////////////////

    public function getPasajeros(){
        return $this->pasajeros;
    }

    public function setPasajeros($viajeros){
        $this->pasajeros=$viajeros;
    }

    ////////////////////////////////
    //AGREGO CADA PASAJERO AL ARRAY DEL ATRIBUTO

    /**
     * @param array $viajante ['nombre'=>, 'apellido'=>, 'DNI'=>]
     * @return void
     */

    public function agregarPasajero($viajante){
        $arrayBruto=[];
        $arrayBruto= $this->getPasajeros();
        array_push($arrayBruto, $viajante);
        $this->setPasajeros($arrayBruto);
    }

    //// MODIFICO DATOS DE LOS PASAJEROS ////
     /**
     * @param array $pasaj ['nombre'=>, 'apellido'=>, 'DNI'=>]
     * @param array $pasajOtro ['nombre'=>, 'apellido'=>, 'DNI'=>]
     * @return void
     */
    
    public function modificarViajeros($pasaj, $pasajOtro){
        $arrayHipotetico = $this->getPasajeros();
        $encontrado = array_search($pasaj, $arrayHipotetico);
        $arrayHipotetico[$encontrado]= $pasajOtro;
        $this->setPasajeros($arrayHipotetico);

    }

    //// ARMO UN STRING CON LOS DATOS DE LOS PASAJEROS ////

    /**
     * @param void
     * @return string 
     */

    public function datosPasajerosString(){
        $stringPasajeros="";
        foreach($this->getPasajeros() as $key => $value){
            $name= $value['nombre'];
            $surname= $value['apellido'];
            $dni= $value['DNI'];
            $stringPasajeros.="
            Nombre: $name \n
            Apellido: $surname \n
            DNI: $dni \n";
        }
        return $stringPasajeros;
    }

    /// CANTIDAD DE PASAJEROS ////
    
    /**
     * @param void
     * @return int 
     */

    public function countPasajeros(){
        $cantidad= count($this->cantPasajerosViaje);
        return $cantidad;

    }

    //// TOSTRING ////

    public function __toString(){
        $todosLosViajeros= $this->datosPasajerosString();
        $info="
        viaje: . {$this->getCodigoViaje()} .\n
        Destino: . {$this->getDestino()} .\n
        Cantidad Máxima de Pasajeros: . {$this->getCantMaxPasajeros()} . \n
        Cantidad de Pasajeros: . {$this->getCantPasajerosViaje()} . \n;
        Datos de Pasajeros: 
        \n
        $todosLosViajeros";
        return $info;
    }
}