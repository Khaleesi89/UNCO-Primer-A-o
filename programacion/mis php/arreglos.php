<?php

// int $ultimoIndice
$misNombres = ["lucia", "carlos", "euge", "mario", "marta", "majo"];
//                0         1        2       3        4       5
echo "La cantidad de elementos es: " . count($misNombres) . "\n";
$nuevoIndice = count($misNombres);
$misNombres[$nuevoIndice] = "flavia";
echo "Ahora la cantidad de elementos es: " . count($misNombres) . "\n";

echo "Qué indice de nombre quiere mostrar: ";
$i = trim(fgets(STDIN));
if ($i >= 0 && $i < count($misNombres)) {
    echo "El indice " . $i . " almacena el valor: " . $misNombres[$i];
} else {
    echo "No existe valor en el indice " . $i;
}
