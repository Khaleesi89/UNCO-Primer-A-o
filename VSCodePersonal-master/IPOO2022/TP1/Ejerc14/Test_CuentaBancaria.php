<?php
//Funciona.
        include "CuentaBancaria.php";
        $objCuenta = new CuentaBancaria("Dean W.", 44014172, 130000, 10);    //cuenta_1
        $datos = $objCuenta->__toString();
        echo $datos;
        $saldo = $objCuenta->actualizarSaldo();
        echo "  + Saldo actualizado (incluye el interés diario): $".round($saldo)."\n";
        $deposito = 1000;
        $resDeposito = $objCuenta->depositar($deposito);
        echo "  + Saldo actualizado (incluye el monto depositado): $".$resDeposito."\n";
        $retiro = 150;
        $resRetiro = $objCuenta->retirar($retiro);
        echo "  + Saldo actualizado (incluye el monto retirado): $".$resRetiro."\n";

        $objCuenta2 = new CuentaBancaria("Sam W.", 92476572, 5000, 0.3);     //cuenta_2
        $datos = $objCuenta2->__toString();
        echo $datos;
        $saldo = $objCuenta2->actualizarSaldo();
        echo "  + Saldo actualizado (incluye el interés diario): $".round($saldo)."\n";
        $deposito = 1000;
        $resDeposito = $objCuenta2->depositar($deposito);
        echo "  + Saldo actualizado (incluye el monto depositado): $".$resDeposito."\n";
        $retiro = 150;
        $resRetiro = $objCuenta2->retirar($retiro);
        echo "  + Saldo actualizado (incluye el monto retirado): $".$resRetiro."\n";
?>