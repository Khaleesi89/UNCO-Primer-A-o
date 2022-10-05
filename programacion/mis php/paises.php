<?php
/* Programa principal */
echo "ingrese cant paises: ";
$cantPaises = trim(fgets(STDIN));
$paises = [];
echo "Cantidad de paises:" . count($paises)  . "\n";
/* CARGAR TODOS LOS PAISES: */
for ($i = 0; $i < $cantPaises; $i++) {
    echo "Pais: ";
    $paises[$i] = trim(fgets(STDIN));
}
echo count($paises) . "\n";

/* VEAMOS SI SE ALMACENARON REALMENTE LOS PAISES: */
for ($i = 0; $i < $cantPaises; $i++) {
    echo "En la posicion " . $i . ": " . $paises[$i] . "\n";
}

do {
    $limite = count($paises);
    echo "Ingrese un nuevo Pais: ";
    $paises[$limite] = trim(fgets(STDIN));

    echo "Desea ingresar otro pais?(s/n): ";
    $rta = trim(fgets(STDIN));
} while ($rta == "s");

print_r($paises);
