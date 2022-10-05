<?php
include "Cuadrado.php";
$vertice1 = ["x"=>0,"y"=>0];
$vertice2 = ["x"=>5,"y"=>5];
$vertice3 = ["x"=>5,"y"=>5];
$vertice4 = ["x"=>0,"y"=>0];
$objCuadrado = new Cuadrado($vertice1, $vertice2, $vertice3, $vertice4);
$desplazar = ["x"=>2,"y"=>2];
echo "| Área del cuadrado: ".$objCuadrado->calcularArea()."\n";
$desplazamiento = $objCuadrado->desplazar($desplazar);
//echo $desplazamiento;
?>