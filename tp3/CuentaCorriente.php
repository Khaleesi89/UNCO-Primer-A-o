Defina e implemente una clase “Cuenta” que contenga la información de una cuenta de un banco y haga
referencia a su dueño. Tener en cuenta que las cuentas pueden ser de 2 tipos: Cuenta Corriente o Caja de
Ahorro.
Nota: La Cuenta Corriente se distingue de una Caja de Ahorro porque su dueño puede girar en descubierto. Es
por ello que la clase Cuenta Corriente debe tener un atributo que determine el monto máximo para girar en
descubierto

<?php

class CuentaCorriente extends Cuenta{
    private $giroDescubierto;


    public function __construct($dineroCash , $objPersonita,$montoDescubierto){
            parent::__construct ($dineroCash , $objPersonita);
            $this->giroDescubierto = $montoDescubierto;
                    
    }
 
    public function getGiroDescubierto(){
        return $this->giroDescubierto;
    }

    public function setGiroDescubierto($montoDescubierto){
        $this->giroDescubierto = $montoDescubierto;
    }

    public function realizarDeposito($monto){
        $montitoDescub = $this->getGiroDescubierto() + parent::getSaldoReal();
        $val = false;
        if($montitoDescub <= $monto){
            parent::realizarRetiro($monto);
            $val = false;
        }
        return $val;

    }

    public function __toString(){
        $info = parent:: __toString();
        $info.= "\n MONTO AL DESCUBIERTO: " . $this->getGiroDescubierto();
        return $info;
        
    }


}
