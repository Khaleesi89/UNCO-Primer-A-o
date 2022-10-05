<?php

include "Persona.php";
include "Cuota.php";
include "Financiera.php";
include "Prestamo.php";

$objFinanciera = new Financiera("Money", "Av.Argentina 1234");
$objPersona1 = new Persona("Pepe", "Florez",1,"Bs. As. 12","dir@mail.com",299444567, 40000);
$objPersona2 = new Persona("Luis", "Suarez",2,"Bs. As. 123","dir@mail.com",2994455, 4000);
$objPersona3 = new Persona("Luis", "Suarez",3,"Bs. As. 123","dir@mail.com",2994455, 4000);
$objPrestamo1 = new Prestamo(1,50000,5,0.1, $objPersona1);
$objPrestamo2 = new Prestamo(2,10000,4,0.1, $objPersona2);
$objPrestamo3 = new Prestamo(3,10000,4,0.1, $objPersona3);
/*echo $objPersona1;
echo $objPersona2;
echo $objPersona3;
echo $objPrestamo1;
echo $objPrestamo2;
echo $objPrestamo3;*/

$prest1= $objPrestamo1->incorporarPrestamo();
$prest2= $objPrestamo2->incorporarPrestamo();
$prest3= $objPrestamo3->incorporarPrestamo();
echo $objFinanciera;
otorgarPrestamoSiCalifica();
echo $objFinanciera;
informarCuotaPagar(2);
darMontoFinalCuota;
