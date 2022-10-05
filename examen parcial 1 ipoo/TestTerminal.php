<?php
/* 1. Se crea una colección con un mínimo de 2 empresas, ejemplo Flecha Bus y Via Bariloche.
2. A cada empresa se le incorporan 2 instancias de la clase viaje.
3. Se crea un objeto Terminal con la colección de empresas creadas en el pnto1.
4. Invocar y visualizar el resultado del método ventaAutomatica con cantidad de asientos 3 y como
destino alguno de los destinos de viaje creados en 2.
5. Invocar y visualizar el resultado del método empresaMayorRecaudacion.
6. Invocar y visualizar el resultado del método responsableViaje correspondiente a uno de los números de
viajes del punto 2. */

include "Responsable.php";
include "Viaje.php";
include "Empresa.php";
include "Terminal.php";

$coleccViajes1 = [];
$coleccViajes2 = [];

$responsable1= new Responsable("Luis","perez",322233,"san luis 33","lolol@hotmail.com",12233222);
echo $responsable1;
$responsable2=new Responsable("martin","tesis",444444,"salome 3433","ljolleratrim@hotmail.com",55666665);
echo $responsable2;

$viaje1= new Viaje("san martin","10:00","15:00",1,1500,"11/10/2021",30,30,$responsable1);
echo $viaje1;
$viaje2= new Viaje("bariloche","10:00","20:00",2,2000,"20/09/2021",40,40,$responsable2);
echo $viaje2;
$viaje3= new Viaje("neuquen","13:00","19:00",3,3000,"10/11/2021",24,24,$responsable1);
echo $viaje3;
$viaje4= new Viaje("zapala","04:00","16:00",4,1700,"4/10/2021",50,50,$responsable2);
echo $viaje4;

$coleccViajes1 = [$viaje1,$viaje4];

$coleccViajes2= [$viaje2,$viaje3];


$empresa1 = new Empresa("01", "FLECHABUS",$coleccViajes1);
echo $empresa1;
$empresa2 = new Empresa ("02", "VIABARILOCHE",$coleccViajes2);
echo $empresa2;

$arrayEmpresasTerminal =[$empresa1,$empresa2];

$terminal = new Terminal("Dama De Hierro","santiago del esttero 2222", $arrayEmpresasTerminal);
echo $terminal;

 /*4. Invocar y visualizar el resultado del método ventaAutomatica con cantidad de asientos 3 y como
destino alguno de los destinos de viaje creados en 2.*/


$destino = "san martin";
$asientos = 3;
$fecha = "11/10/2021";
$resultado = $terminal->ventaAutomatica($asientos,$fecha,$destino,$empresa1);
echo $resultado;


/*5. Invocar y visualizar el resultado del método empresaMayorRecaudacion.*/ 

echo "QUIEN GANO MAS? \n";
$quienGanoMas = $terminal->empresaMayorRecaudacion();
echo $quienGanoMas;


/*6. Invocar y visualizar el resultado del método responsableViaje correspondiente a uno de los números de
viajes del punto 2. */

echo "EL RESPONSABLE DEL VIAJE 2 FUE: \n";
$visualizarResponnnssabble = $terminal->responsableViaje(2);
echo $visualizarResponnnssabble;

