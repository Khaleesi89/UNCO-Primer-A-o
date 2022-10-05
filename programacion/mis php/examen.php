<?php

/**programa principal destinosTuristicos */
/** string $respuesta, $destinoTuristico, $destinoMasVisitado */
/**int $turistas, $sumaTotalTuristas, $destinosIngresados, $mayorCantidadTuristas */
/** float $ingresos, $sumaTotIngresos, $porcentajeSMA, $promedioIngresos */

echo "desea ingresar datos? (s/n): ";
$respuesta = trim (fgets(STDIN));
$destinosIngresados = 0;
$sumaTotalTuristas = 0;
$sumaTotIngresos = 0;
$mayorCantidadTuristas = 0;
do {
    if ($respuesta == "s"){
        $destinosIngresados = $destinosIngresados + 1;
    }
    echo "escribir el destino turistico a ingresar: ";
    $destinoTuristico = trim (fgets(STDIN));
    echo "Ingrese la cantidad de turistas: ";
    $turistas = trim (fgets(STDIN));
        if ($turistas > 0){
            $sumaTotalTuristas = $sumaTotalTuristas + 1
        }
    echo "ingrese la cantidad de ingresos en dolares: ";
    $ingresos = trim (fgets(STDIN));
        if ($ingresos > 0) {
            $sumaTotIngresos = $sumaTotIngresos + $ingresos;
        }
    if ($destinoTuristico = "SMA"){
        $porcentajeSMA = $turistas*100 / $sumaTotalTuristas;
    } elseif {
        # code...
    }
} while ($a <= 10);