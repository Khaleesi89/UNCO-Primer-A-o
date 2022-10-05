
<?php
/* Defina e implemente una clase “Cuenta” que contenga la información de una cuenta de un banco y haga
referencia a su dueño. Tener en cuenta que las cuentas pueden ser de 2 tipos: Cuenta Corriente o Caja de
Ahorro.
Nota: La Cuenta Corriente se distingue de una Caja de Ahorro porque su dueño puede girar en descubierto. Es
por ello que la clase Cuenta Corriente debe tener un atributo que determine el monto máximo para girar en
descubierto*/



class Cuenta{
    private $saldoReal;
    private $objPersona;


    public function __constructor($saldoInicial , $objDuenio){
       $this->saldoReal = $saldoInicial;
       $this->objPersona = $objDuenio;
    }

    public function getSaldoReal(){
        return $this->saldoReal;
    }

    public function setSaldoReal($saldoInicial){
        $this->saldoReal = $saldoInicial;
    }

    public function getObjPersona(){
        return $this->objPersona;
    }

    public function setObjPersona($objDuenio){
        $this->objPersona = $objDuenio;
    }

    public function __toString(){
        $cash = $this->getSaldoReal();

        
        $info = "
        SALDO DE CUENTA: {$cash}
        DATOS DEL DUEÑO: {$this->getObjPersona()}
        ";
        return $info; 
    }
   
    

    /*1. saldoCuenta() : retorna el saldo de la cuenta. */

    public function saldoCuenta(){
        $saldito = $this->getSaldoReal();
        return $saldito;
    }


    /*2. realizarDeposito(monto): permite realizar un depósito a la cuenta una cantidad “monto” de dinero. */

    public function realizarDeposito($montito){
        $saldd = $this->getSaldoReal() + $montito;
        return $saldd; 
    }


    /*3. realizarRetiro(monto): permite realizar un retiro de la cuenta por una cantidad “monto” de dinero. */

    public function realizarRetiro($monto){
        $dinero = $this->getSaldoReal();
        $sePuede = true;
        if($dinero <= $monto){
            $dinero -= $monto;
            $this->setSaldoReal($dinero);
        }else{
            $sePuede = false;
            $dinero = $sePuede;
        }
    }




    
}