<?php

/*Programa hsminseg*/;
/* con este programa convertiremos segundos en hs, min y seg*/;

echo "ingrese los segundos a convertir: ";
$segundosTotales = trim (fgets (STDIN));
$auxiliar = (int)($segundosTotales / 60);
$segundos = (int)($segundosTotales % 60);
$horas = (int)($auxiliar/60);
$minutos = (int) ($auxiliar % 60);
echo " Para la cantidad de $segundosTotales segundos corresponden a $horas hora/s, $minutos minutos y $segundos segundos";

