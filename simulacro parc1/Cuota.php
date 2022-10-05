<?php
/*
1. Se registra la siguiente información: número ,monto_cuota , monto_interes y cancelada (atributo que va a contener un valor true,
 si la cuota esta paga y false en caso contrario)
2. Método constructor que recibe como parámetros los valores iniciales para los atributos: número, monto_cuota y  monto_interes
definidos en la clase. Por defecto todas las cuotas deben ser generadas como canceladas = false.
3. Los métodos de acceso de cada uno de los atributos de la clase.
 4. Redefinir el método _toString  para que retorne la información de los atributos de la clase. 
 5. Implementar el método darMontoFinalCuota()  que retorna el importe total de la cuota mas los intereses que deben ser aplicados. */

 class Cuota{
     private $numero;
     private $monto_cuota;
     private $monto_interes;
     private $cancelada = false;

     public function __construct($number, $cuotaCash, $interesCash){
        $this->numero = $number;
        $this->monto_cuota = $cuotaCash;
        $this->monto_interes = $interesCash;

     }

     public function getNumero(){
         return $this->numero;
     }
     public function setNumero($number){
        $this->numero = $number;
     }
     

     public function getMonto_cuota(){
        return $this->monto_cuota;
     }
     public function setMonto_cuota($cuotaCash){
        $this->monto_cuota = $cuotaCash;
     }


     public function getMonto_interes(){
        return $this->monto_interes;
     }
     
     public function setMonto_interes($interesCash){
        $this->monto_interes = $interesCash;
     }


     public function getCancelada(){
        return $this->cancelada;
     }
     public function setCancelada($cancelada){
        $this->cancelada = $cancelada;
     }
        

     //TRATANDO DE VER COMO PONERLE VALOR AL BOOLEANO DE CANCELADA//
     public function canceladaOno($cancelada){
         if ($cancelada == false){
             $estado = "Está impaga";
             $this->setCancelada($estado);
         }else{
             $estado = "Está paga";
             $this->setCancelada($estado);
         }
     }

     public function darMontoFinalCuota(){
        $montoTotal = $this->getMonto_cuota() + $this->getMonto_interes();
        return $montoTotal;
     }


     public function __toString()
     {
         $cancelada = "No ha sido cancelada";
         if($this->getCancelada()){
            $cancelada = "Ha sido cancelada";
         }
         $pagadaOnoPagada = $this->canceladaOno($cancelada);
         $info = "
         NUMERO: {$this->getNumero()}\n
         MONTO CUOTA: {$this->getMonto_cuota()}\n
         MONTO INTERES: {$this->getMonto_interes()} \n
         CANCELADA: $pagadaOnoPagada \n";
         return $info;
     }
}
     
 