<?php

/** 
 * Función para calcular porcentajes de betametasona y loratadina y la cantidad de agua necesaria para esas cantidades
 * @param float $loraTadina;
 * @param  float $betaMetasona;
 * @return float $aguaTotal;
*/
function calcAguaDestilada ($loraTadina, $betaMetasona)
{
    $loraTadina = $loraTadina*10/100;
    $betaMetasona = $betaMetasona*15/100;
    $aguaTotal= $loraTadina + $betaMetasona;
    return $aguaTotal;
    }

    /*Programa para ingresar cantidades de loratadina y de betametasona y calcular la cantidad de agua que se necesita para crear el antialergico */
    /*PROGRAMA antiAlergico */
    /*float $loRatadina, $beTametasona $aGuadestiladaFinal */

    echo "Ingrese la cantidad de Loratadina en ml: ";
    $loRatadina = trim (fgets (STDIN));
    echo "Ingrese la cantidad de Betametasona en ml: ";
    $beTametasona = trim (fgets (STDIN));
    $aGuadestiladaFinal = calcAguaDestilada($loRatadina , $beTametasona);
    echo "La cantidad de Agua Destilada necesaria es: " .$aGuadestiladaFinal. " ml";

    








