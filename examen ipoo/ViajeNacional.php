
<?php

class ViajeNacional extends Viaje{
    private $descuento;


    public function __construct($destiny,$partida,$llegada,$id,$baseMonto,$date,$asientosTotales,$asientosDisponibles,$responsableObj,$bonificacion){
        parent::__construct($destiny,$partida,$llegada,$id,$baseMonto,$date,$asientosTotales,$asientosDisponibles,$responsableObj);
        $this->descuento = $bonificacion;
        
    }
    

    public function getDescuento(){
        return $this->descuento;
    }

    public function setDescuento($bonificacion){
        $this->descuento = $bonificacion;
    }

    public function __toString(){
        $info="";
        $info .= parent::__toString();
        $info .= "DESCUENTO: {$this->getDescuento()}";
        return $info;
    }

    /*Si el viaje es Nacional se almacena porcentaje de descuento que puede ser aplicado al monto del viaje (por defecto el descuento
aplicado es del 10% ).
*/
    public function importeTotal(){
        $costo = parent::importeTotal();
        $descuento = (($costo * 10 )/100);
        $importePagar = $costo - $descuento;
        return $importePagar;

    }
}