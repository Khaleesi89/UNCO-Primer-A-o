<?php

/**
 * esta funcion determina si la llamada es internacional, larga o corta distancia *
 * @param int $codInt;
 * @param int $codArea;
 * @return string
 */
function tipoLlamada ($codInt, $codArea){
    /** string $tipoLlam */

    if ($codInt <> 54) {
        $tipoLlam = " internacional ";
    } else {
            if ($codArea == 299){
        $tipoLlam = " corta ";
    }       else {
            $tipoLlam = " larga ";
        }
    }
    return $tipoLlam;
}

/**
 * Este modulo recibe el tipo de llamada y retorna el valor de cada segundo *
 * @param string $tiPoLlamada;
 * @return float
 */
function valorLlam ($tiPoLlamada){
    /** float $cashSegundo */
    if ($tiPoLlamada == "internacional"){
        $cashSegundo = 2 ;
    } elseif($tiPoLlamada = "larga"){
            $cashSegundo =  0.75 ;
    }else {
            $cashSegundo = 0.2 ;
    }
return $cashSegundo;
}



//PROGRAMA PRINCIPAL llamadaValor/
/** int $codigInter, $codigoArea, $segundos, string $lLamada, float $valorTotalLlam, $valorllamada */

echo "Por favor, ingrese el código telefónico de su país: ";
$codigInter = trim (fgets(STDIN));
echo "Por favor, Ingrese el código de área: ";
$codigoArea = trim (fgets(STDIN));
echo "Ingrese la duración de la llamada en segundos: ";
$segundos = trim (fgets(STDIN));
$lLamada = tipoLlamada($codigInter , $codigoArea);
$valorllamada = valorLlam($lLamada);
$valorTotalLlam = ($segundos * $valorllamada);
echo "Su tipo de llamada es " . $lLamada . " y su costo total de la llamada es " . $valorTotalLlam .  "."

?>



