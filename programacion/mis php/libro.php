<?php
/* Programa principal */
$libro = [];  //inicializo en vacio el arreglo
echo "nombre del libro:";
$libro["nombre"] = trim(fgets(STDIN));
echo "autor del libro:";
$libro["autor"] = trim(fgets(STDIN));
echo "año de edición:";
$libro["anioEdicion"] = trim(fgets(STDIN));
echo count($libro) . "\n";

print_r($libro);

echo "qué dato del libro desea modificar?";
$clave = trim(fgets(STDIN));
echo "Ingrese el nuevo valor de " . $clave;
$nuevoValor = trim(fgets(STDIN));

$libro[$clave] = $nuevoValor;

print_r($libro);
