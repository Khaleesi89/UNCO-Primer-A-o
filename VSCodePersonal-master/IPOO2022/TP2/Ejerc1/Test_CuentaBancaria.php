<?php
    include "CuentaBancaria.php";
    include "Persona.php";
    $objPersona = new Persona("Dean", "Smith", "DNI", 44014172);
    $objCuentaBancaria = new CuentaBancaria($objPersona, 100000, 40); //Delegación
    echo $objCuentaBancaria;
    //Interés anual
    $saldo = $objCuentaBancaria->actualizarSaldo();
    echo "  + Saldo actualizado (incluye el interés anual): $".round($saldo)."\n";
    //Depositar monto
    $deposito = 1000;
    $resDeposito = $objCuentaBancaria->depositar($deposito);
    echo "  + Saldo actualizado (incluye el monto depositado de $".$deposito."): $".round($resDeposito)."\n";
    //Retirar monto
    $retiro = 15000;
    $resRetiro = $objCuentaBancaria->retirar($retiro);
    echo "  + Saldo actualizado (incluye el monto retirado de -$".$retiro."): ".$resRetiro."\n"; //incluye un msj string y un monto float
?>