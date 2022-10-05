<?php
include "Fecha.php";


$fecha = new Fecha(30,12,2010);
echo $fecha;
$fechita = $fecha->stringFecha();
echo $fechita;
