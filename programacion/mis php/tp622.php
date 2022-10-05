<?php

/** PROGRAMA PRINCIPAL */

/* PROGRMAA encuestaResult */

/** int $totalEncuestas, $numeroEncuesta, $cantidadPersonas, $cantidadViviendas */
/** int $viviendasConMenores, $casaConMasMenores, $ocupantes,$menores */
/** string $jefeConMasMenores $nombre, float $promedioPersonas */

echo "Ingrese la cantidad de encuestas que ingresará al sistema : " ;
$totalEncuestas = trim( fgets (STDIN));

/** inicializamos las variables especiales */

$cantidadPersonas = 0;
$viviendasConMenores = 0;
$casaConMasMenores = 0;
$jefeConMasMenores = "ninguno";

/** comienza la carga de los datos del formulario */
/** como desde el comienzo ingresamos la cantidad de encuestas que se ingresarán, lo tomamos como el umbral  de la funcion for */

for ($i=0; $i < $totalEncuestas ; $i++) { 
    echo "Ingrese el nombre del jefe de hogar: ";
    $nombre = trim (fgets(STDIN));
    echo "Ingrese la cantidad de habitantes en la vivienda: ";
    $ocupantes = trim (fgets(STDIN));
        if ($ocupantes > 0){

            /** este if es para realizar la sumatoria de la cantidad de personas- acumulativo */

            $cantidadPersonas = $cantidadPersonas + $ocupantes; 
        }
    echo "Ingrese la cantidad de niños menores de 18 años: ";
    $menores = trim (fgets(STDIN));
        if ($menores > 0){

         /** con este if le ingresamos al contador cuantas viviendas tienen menores */

            $viviendasConMenores = $viviendasConMenores + 1 ; 

            /** con este if buscamos buscar que jefe de familia tiene mas cantidad de menores */

            if ($menores > $casaConMasMenores){
                $casaConMasMenores = $menores;
                $jefeConMasMenores = $nombre ;
            }
        }
}

/** con este reemplado de cantidadViviendas con totalEncuestas buscamos saber el numero de encuestas realizadas */

$cantidadViviendas = $totalEncuestas;

/** usamos esta instruccion para sacar el promedio de personas por viviendas */

$promedioPersonas = $cantidadPersonas / $cantidadViviendas ; 
echo "Cantidad de encuestas formuladas: " . $totalEncuestas . "." ;
echo "\n" ;
echo "Cantidad de viviendas que tienen integrantes menores a 18 años: " . $viviendasConMenores ."." ;
echo "\n" ;
echo "El nombre del jefe de familia con mayor cantidad de menores en la vivienda: " . $jefeConMasMenores . "." ;
echo "\n" ;
echo "Promedio de la cantidad de personas por vivienda: " . $promedioPersonas . "." ;

