<?php

include "Reloj.php";


echo "ingrese los valores de HORA: ";
$hora = trim (fgets(STDIN));
echo "ingrese los valores de MINUTOS: ";
$minutos = trim (fgets(STDIN));
echo "ingrese los valores de SEGUNDOS: ";
$segundos = trim (fgets(STDIN));

$reloj = new Reloj($hora,$minutos,$segundos);
echo "inicio del reloj";
echo $reloj;
