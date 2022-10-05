<?php

/* Programa veloCidad*/;
/* calcularemos la velocidad de un vehículo teniendo Km y tiempo*/;


echo"Ingrese la distancia a recorrer: ";
$distancia = trim (fgets(STDIN));
echo "Ingrese el tiempo en horas del recorrido: ";
$horas = trim (fgets (STDIN));
$velocidad = $distancia / $horas;
echo "La velocidad que debería llevar para el recorrido de $distancia km y $horas horas es de $velocidad km/h";


