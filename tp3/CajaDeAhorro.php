Defina e implemente una clase “Cuenta” que contenga la información de una cuenta de un banco y haga
referencia a su dueño. Tener en cuenta que las cuentas pueden ser de 2 tipos: Cuenta Corriente o Caja de
Ahorro.
Nota: La Cuenta Corriente se distingue de una Caja de Ahorro porque su dueño puede girar en descubierto. Es
por ello que la clase Cuenta Corriente debe tener un atributo que determine el monto máximo para girar en
descubierto

<?php

class CajaDeAhorro extends Cuenta{
   
    
    public function __constructor($saldo, $objDue){
        parent::__construct($saldo , $objDue);
                
    }

    public function __toString(){
        $info = parent::__toString();
        return $info;
        
    }
}

