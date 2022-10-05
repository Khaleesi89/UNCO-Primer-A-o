
<?php

class ViajeInternacional extends Viaje{
    private $documentacionOno;
    private $porcentajeImpuesto;


    public function __construct($destiny,$partida,$llegada,$id,$baseMonto,$date,$asientosTotales,$asientosDisponibles,$responsableObj,$docNecesaria, $impuestoPorcentaje){
        parent::__construct($destiny,$partida,$llegada,$id,$baseMonto,$date,$asientosTotales,$asientosDisponibles,$responsableObj);
        
        /*public function __construct($destiny,$partida,$llegada,$id,$baseMonto,
        $date,$asientosTotales,$asientosDisponibles,$responsableObj)*/
        $this->documentacionOno = $docNecesaria;
        $this->porcentajeImpuesto = $impuestoPorcentaje;
        
        
    }
    public function getDocumentacionOno(){
        return $this->documentacionOno;
    }

    public function setDocumentacionOno($docNecesaria){
        $this->documentacionOno = $docNecesaria;
    }

    public function getPorcentajeImpuesto(){
        return $this->porcentajeImpuesto;
    }

    public function setPorcentajeImpuesto($impuestoPorcentaje){
        $this->porcentajeImpuesto = $impuestoPorcentaje;
    }

    public function __toString(){
        $info="";
        $info .= parent::__toString();
        $info .= "NECESITA DOCUMENTACION O NO? : {$this->getDocumentacionOno()}
        PORCENTAJE DE IMPUESTO: {$this->getPorcentajeImpuesto()}
        ";
        return $info;
   
    }

    /*Si el viaje es internacional se debe almacenar si requiere o no documentación adicional y el porcentaje correspondiente 
    a impuestos que deben ser aplicados al costo del viaje (por defecto el valor aplicado es del 45%). */

    public function importeTotal(){
        $costo = parent::importeTotal();
        $extra = (($costo * 45 )/100);
        $importePagar = $costo + $extra;
        return $importePagar;

    }

}