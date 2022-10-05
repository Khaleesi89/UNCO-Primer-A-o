<?php

include("Persona.php");
include ("Prestamo.php");

$persona= new Persona("maria","klimisch",23332,"san luis 33", "leonely_luly",154433302,54);
echo $persona;
$prestamo = new Prestamo(21,50000,5,0.01,$persona);
/*echo "ingrese la fecha del prestamo: ";
$fecha=trim(fgets(STDIN));
$prestamo->setFechaOtorgamiento($fecha);
echo "ingrese la cantidad de cuotas: ";
$cuotasPrestamo=trim(fgets(STDIN));
$prestamo->setCantDeCuotas($cuotasPrestamo);*/

echo $prestamo;
echo date('d-m-y');
