<?php

/*1. Se registra la siguiente información: identificación, código del electrodoméstico, fecha otorgamiento,
 monto, cantidad_de_cuotas, taza de interés, la colección de cuotas y la referencia a la persona que solicito el préstamo. 
2. Método constructor  que recibe como parámetros los siguientes valores: identificación, monto, cantidad de cuotas, taza de interés y 
la referencia a la persona que solicito el préstamo. El constructor debe asignar los valores recibidos a las variables instancias que 
corresponda. 
3. Los métodos de acceso de cada uno de los atributos de la clase. 
4. Redefinir el método _toString  para que retorne la información de los atributos de la clase. 
5. Implementar el método privado calcularInteresPrestamo(numCuota) que recibe por parámetro el numero de la cuota y calcula el 
importe del interés sobre el saldo deudor.  */

include "Cuota.php";

class Prestamo{
    
    //ATRIBUTOS//
    private $identificacion;
    private $codElectrodomestico;
    private $fechaOtorgamiento = "No aprobado";
    private $monto;
    private $cantDeCuotas;
    private $tazaInteres;
    private $coleccionCuotas= [];
    private $Persona;

    //CONSTRUCTOR//

    public function __construct($numeroId, $valor, $cuotasCant,$intTaza,$Cliente){
        

        $this->identificacion =$numeroId;
        $this->monto = $valor;
        $this->cantDeCuotas = $cuotasCant;
        $this->tazaInteres = $intTaza;
        $this->Persona = $Cliente;
    }

    //METODOS//

    public function getIdentificacion(){
        return $this->identificacion;
    }
    public function setIdentificacion($numeroId){
        $this->identificacion =$numeroId;
    }

    public function getMonto(){
        return $this->monto;
    }
    public function setMonto($valor){
        $this->monto = $valor;
    }
   
    public function getCantDeCuotas(){
        return $this->cantDeCuotas;
    }
    public function setCantDeCuotas($cuotasCant){
        $this->cantDeCuotas = $cuotasCant;
    }

    public function getTazaInteres(){
        return $this->tazaInteres;
    }
    public function setTazaInteres($intTaza){
        $this->tazaInteres = $intTaza;
    }

    public function getPersona(){
        return $this->Persona;
    }
    public function setPersona($Cliente){
        $this->Persona =$Cliente;
    }
    
    public function getFechaOtorgamiento(){
        return $this->fechaOtorgamiento;
    }
    public function setFechaOtorgamiento($fechita){
        $this->fechaOtorgamiento =$fechita;
    }

    public function getCodElectrodomestico(){
        return $this->codElectrodomestico;
    }
    public function setCodElectrodomestico($electrodomestico){
        $this->codElectrodomestico = $electrodomestico;
    }

    public function getColeccionCuotas(){
        return $this->coleccionCuotas;
    }
    public function setColeccionCuotas($planDePago){
        $this->coleccionCuotas = $planDePago;
    }


// METODO PARA SACAR EL INTERES DE UNA CUOTA DETERMINADA//

     private function calcularInteresPrestamo($numCuota){
        $numCuota = $this->getCantDeCuotas();     
        $totalInteres=($this->getMonto()-(($this->getMonto()/$this->getCantDeCuotas())*$numCuota)*$this->getTazaInteres());
        return $totalInteres;
    }
   
    /*6. Implementar el método otorgarPrestamo que setea la variable instancia  fecha otorgamiento, 
    con la fecha actual (puede utilizar el valor retornado por la función de PHP getdate())  y 
    genera cada una de las cuotas dependiendo el valor almacenado en la variable instancia 
     “cantidad_de_cuotas” y monto.  El importe total de la cuota debe ser calculado de la siguiente 
     manera:  (monto / cantidad_de_cuotas ) y el monto correspondiente al interés debe ser 
     el valor retornado por el método  calcularInteresPrestamo(numeroCuota) implementado en
      el inciso anterior. */


      public function otorgarPrestamo(){
        $diaDeHoy = date('d-m-y');
        $this->setFechaOtorgamiento($diaDeHoy);
        $cuotitas = $this->getCantDeCuotas();
        $deudita =  $this->getMonto();
        $i=1;
        $coleccionCuotitas =[];
        for ($i=1; $i <= $cuotitas ; $i++) { 
            $interesesBruto = $this->calcularInteresPrestamo($i);
            $cuotaNeta = new Cuota($i,$deudita , $interesesBruto);
            array_push($coleccionCuotitas, $cuotaNeta);          
        }
            return $this->setColeccionCuotas($coleccionCuotitas);

      }



    // como retornar el array para mostrarlo//

    private function mostrarArray(){
        $coleccion = $this->getColeccionCuotas();
        $escrito="";
        foreach ($coleccion as $cuotas => $value){
            $escrito.= $value->__toString();
           
        }
        return $escrito;
    }

     /*// como retornar el array para mostrarlo//

     private function mostrarArray(){
        foreach ($this->getColeccionCuotas() as $cuotas => $value){

            $cuota = $cuotas+1;
            $valorTotalCuota = $value;
            $escrito = "
            CUOTA NUMERO: $cuota \n;
            MONTO TOTAL DE LA CUOTA: $valorTotalCuota \n";
            return $escrito;
        }
    }*/

    /*7. Implementar el método darSiguienteCuotaPagar método que retorna la referencia a la siguiente 
    cuota que debe ser abonada de un préstamo, si el préstamo tiene todas sus cuotas canceladas retorna
    null.*/

    public function darSiguienteCuotaPagar(){
        $arrayConCuotas = $this->getColeccionCuotas();
        $sigue = true;
        $i=0;
        while($sigue||$i==count($arrayConCuotas)){
           $valorCuota = $arrayConCuotas[$i];
            $resultado = $valorCuota->getCancelada();
            if(!$resultado){
                $sigue = false;
                $cuotaSeleccionada = $valorCuota;

            }
            $i++;
        }
        if($sigue){
            $retorno = null;
        }else{
            $retorno = $cuotaSeleccionada;
        }
        return $retorno;

    }
        
        

    public function __toString(){
        $collection = $this->mostrarArray(); 
        $info = "
        IDENTIFICACION:{$this->getIdentificacion()} \n
        FECHA DE OTORGAMIENTO: {$this->getFechaOtorgamiento()}  \n
        MONTO: {$this->getMonto()} \n
        CANTIDAD DE CUOTAS:{$this->getCantDeCuotas()} \n
        TAZA DE INTERES: {$this->getTazaInteres()} \n 
        COLECCION DE CUOTAS: $collection \n 
        PERSONA: {$this->getPersona()} \n ";
        return $info;
    }

   
    // TAMPOCO ME MUESTRA LA NUEVA FECHA //
    //COMO ME DOY CUENTA QUE ESTA FUNCIOANDO EL ARRAY?//
    
      
}


