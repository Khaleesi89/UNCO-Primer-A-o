<?php
//Funciona.
include "Fecha.php";
$objFecha = new Fecha(12, 3, 2011);
echo "| Fecha extendida: ".$objFecha->fechaExtendida()."\n";
$objFecha = new Fecha(3, 12, 2019);
echo "| Fecha abreviada: ".$objFecha->fechaAbreviada();
?>