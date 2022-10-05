<?php

/**
 * este módulo retorna el puntaje *;

 * @param int $numeroPrueba;
 * @param string $tipoPrueba;
 * @return float; 
 */
function puntaje ($numeroPrueba, $tipoPrueba){
/** float $puntajeParcial, $puntajeTotal */;
    $puntajeParcial = ($numeroPrueba % 6);
    if ($tipoPrueba = "tecnica"){
        $puntajeTotal = ($puntajeParcial + 20);
    }else {
        $puntajeTotal = ($puntajeParcial + 30);
    }
    return $puntajeTotal;
}

/**
 * Este módulo determina qué cantidad de minutos extras ganó para la prueba del domingo *;
 * @param float $puntajePrim
 * @return int 
 */

 function minExtra ($puntajePrim){
/* int $minutosCorresp */
    if ($puntajePrim < 21){
        $minutosCorresp = 3;
    } elseif (($puntajePrim >= 21)&&($puntajePrim < 25)){
        $minutosCorresp = 4;
    } elseif (($puntajePrim >= 25)&&($puntajePrim < 31)){
        $minutosCorresp = 5;
    } else {
        $minutosCorresp = 6;};
return $minutosCorresp ;
}


/*PROGRAMA PRINCIPAL */;

/* PROGRAMA bakeoff * ;
* Muestra los minutos extra que ganó el participante * ;
/* int $nroPrograma , $minutitosExtra, $puntajeTot String $pruebaDelDia */

echo "Ingrese el número de programa: ";
$nroPrograma = trim(fgets(STDIN));
echo "Ingrese el tipo de prueba (tecnica o decorativa): ";
$pruebaDelDia = trim (fgets(STDIN));
$puntajeTot = puntaje($nroPrograma , $pruebaDelDia);
$minutitosExtra = minExtra ($puntajeTot);
echo "Los minutos extras que tendrá para el domingo serán " . $minutitosExtra . " minutos.";