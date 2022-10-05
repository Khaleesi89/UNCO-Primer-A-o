<?php

include "CuentaBancaria.php";

$cuenta = new CuentaBancaria(12221,34403361,432222,40);
echo $cuenta;
$mas = 10000;
$menos = 2000;
$paraSacar = $cuenta->retirar($menos);
$paraPoner = $cuenta->depositar ($mas);
echo "$paraPoner \n";
echo "$paraSacar \n";
$diariamente = $cuenta->actualizarSaldo();
echo "$diariamente \n";

