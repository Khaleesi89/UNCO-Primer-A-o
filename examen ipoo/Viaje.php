<?php

class Viaje{
    private $destino;
    private $horaPartida;
    private $horaLLegada;
    private $numero;
    private $montoBase;
    private $fecha;
    private $cantidadAsientosTotales;
    private $cantidadAsientosDisponibles;
    private $objResponsable;



    public function __construct($destiny,$partida,$llegada,$id,$baseMonto,$date,$asientosTotales,$asientosDisponibles,$responsableObj){
        $this->destino = $destiny;
        $this->horaPartida = $partida;
        $this->horaLLegada = $llegada;
        $this->numero = $id;
        $this->montoBase = $baseMonto;
        $this->fecha = $date;
        $this->cantidadAsientosTotales = $asientosTotales;
        $this->cantidadAsientosDisponibles = $asientosDisponibles;
        $this->objResponsable = $responsableObj;
        
    }
    

    public function getDestino(){
        return $this->destino;
    }

    public function setDestino($destiny){
        $this->destino = $destiny;
    }

    public function getHoraPartida(){
        return $this->horaPartida;
    }

    public function setHoraPartida($partida){
        $this->horaPartida = $partida;
    }

    public function getHoraLLegada(){
        return $this->horaLLegada;
    }

    public function setHoraLLegada($llegada){
        $this->horaLLegada = $llegada;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($id){
        $this->numero = $id;
    }

    public function getMontoBase(){
        return $this->montoBase;
    }

    public function setMontoBase($baseMonto){
        $this->montoBase = $baseMonto;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setFecha($date){
        $this->fecha = $date;
    }

    public function getCantidadAsientosTotales(){
        return $this->cantidadAsientosTotales;
    }

    public function setCantidadAsientosTotales($asientosTotales){
        $this->cantidadAsientosTotales = $asientosTotales;
    }

    public function getCantidadAsientosDisponibles(){
        return $this->cantidadAsientosDisponibles;
    }

    public function setCantidadAsientosDisponibles($asientosDisponibles){
        $this->cantidadAsientosDisponibles = $asientosDisponibles;
    }

    public function getObjResponsable(){
        return $this->objResponsable;
    }

    public function setObjResponsable($responsableObj){
        $this->objResponsable = $responsableObj;
    }

    public function __toString()
    {
        $info="
        --------VIAJE-----------
        DESTINO: {$this->getDestino()}
        HORA DE LLEGADA: {$this->getHoraLLegada()}
        HORA DE PARTIDA: {$this-> getHoraPartida()}
        NUMERO: {$this->getNumero()}
        FECHA: {$this-> getFecha()}
        MONTO BASE: {$this->getMontoBase()}
        CANTIDAD ASIENTOS TOTALES: {$this->getCantidadAsientosTotales()}
        CANTIDAD ASIENTOS DISPONIBLES: {$this->getCantidadAsientosDisponibles()}
        RESPONSABLE:{$this->getObjResponsable()}
        ";
        return $info;
    }

    /*6. Implementar el método calcularImporteViaje() que se calcula en base al monto base del viaje, la
cantidad de asientos disponibles y la cantidad total de asientos. El cálculo que se realiza es el siguiente:
importe = monto base + ( monto base * asientosVendidos /asientos totales)*/


    public function calcularImporteViaje(){
        $base = $this->getMontoBase();
        $totalAsientos = $this->getCantidadAsientosTotales();
        $vendidos = $this->asientosVendidos();
        $importe = $base + ($base * $vendidos / $totalAsientos);
        return $importe;

    }


    public function asientosVendidos(){
        $disponibles = $this->getCantidadAsientosDisponibles();
        $totalAsientos = $this->getCantidadAsientosTotales();
        $vendidos = $totalAsientos - $disponibles;
        return $vendidos;
    }




    /*7. Redefinir el método que permite calcular el importe de un viaje según corresponda. */

    public function importeTotal(){
        $importeBase = $this->calcularImporteViaje();
        return $importeBase;
    }




}


