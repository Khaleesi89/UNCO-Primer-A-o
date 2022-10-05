<?php


class Viaje{
    private $destino;
    private $horaPartida;
    private $horaLlegada;
    private $nro;
    private $importe;
    private $fecha;
    private $cantAsientosTotal;
    private $cantAsientosDisponibles;
    private $objPersonaResponsable;

    public function __construct($destiny, $partida,$llegada,$nroViaje,$importeviaje,$fechaViaje,$asientosTotal,$asientosDisponibles,$ObjResponsable){
        $this->destino = $destiny;
        $this->horaPartida = $partida;
        $this->horaLlegada = $llegada;
        $this->nro = $nroViaje;
        $this->importe = $importeviaje;
        $this->fecha = $fechaViaje;
        $this->cantAsientosTotal = $asientosTotal;
        $this->cantAsientosDisponibles = $asientosDisponibles;
        $this->objPersonaResponsable = $ObjResponsable;
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

    public function getHoraLlegada(){
        return $this->horaLlegada;
    }

    public function setHoraLlegada($llegada){
        $this->horaLlegada = $llegada;
    }

    public function getNro(){
        return $this->nro;
    }

    public function setNro($nroViaje){
        $this->nro = $nroViaje;
    }

    public function getImporte(){
        return $this->importe;
    }

    public function setImporte($importeviaje){
        $this->importe = $importeviaje;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setFecha($fechaViaje){
        $this->fecha = $fechaViaje;
    }

    public function getCantAsientosTotal(){
        return $this->cantAsientosTotal;
    }

    public function setCantAsientosTotal($asientosTotal){
        $this->cantAsientosTotal = $asientosTotal;
    }

    public function getCantAsientosDisponibles(){
        return $this->cantAsientosDisponibles;
    }

    public function setCantAsientosDisponibles($asientosDisponibles){
        $this->cantAsientosDisponibles = $asientosDisponibles;
    }

    public function getObjPersonaResponsable(){
        return $this->objPersonaResponsable;
    }

    public function setObjPersonaResponsable($ObjResponsable){
        $this->objPersonaResponsable = $ObjResponsable;
    }

    public function __toString(){
        $info="
        DESTINO: {$this->getDestino()}
        HORA DE PARTIDA: {$this-> getHoraPartida()}
        HORA DE LLEGADA: {$this->getHoraLlegada()}
        NUMERO: {$this->getNro()}
        IMPORTE: {$this->getImporte()}
        FECHA: {$this->getFecha()}
        CANTIDAD DE ASIENTOS TOTALES: {$this->getCantAsientosTotal()}
        CANTIDAD DE ASIENTOS DISPONIBLES: {$this->getCantAsientosDisponibles()}
        PERSONA RESPONSABLE: {$this->getObjPersonaResponsable()}
        ";
        return $info;
    }

    /*5. Implementar el método asignarAsientosDisponibles($catAsientos) que recibe por parámetros la cantidad
de asientos que desean asignarse. El método retorna verdadero en caso que la asignación pueda
concretarse y falso en caso contrario. */ /*PREGUNTAR SI LOS ASIENTOS QUE DESEAN ASIGNARSE SERIAN LOS DISPONIBLES (LA TOTALIDAD DE LOS ASIENTOS EN EL VEHICULO) O TOTALES (TOTALES QUE VIAJARON)...*/
//SE PREGUNTO A LA PROFE KARINA Y DIJO QUE LOS TOTALES SON LOS QUE TIENE EL VEHICULO Y LOS DISPONIBLES SON LOS QUE QUEDAN VACIOS , AUN POR VENDER)


    public function asignarAsientosDisponibles($catAsientos){
        $totalidadAsientos = $this->getCantAsientosTotal();
        $disponibles = $this->getCantAsientosDisponibles()();
        $losQquedan = $totalidadAsientos - $disponibles;
        if ($catAsientos <= $losQquedan){
            $this->setCantAsientosDisponibles($losQquedan);
            $retorno = true;
        }else{
            $retorno = false;
        }
        return $retorno;

    }


}
