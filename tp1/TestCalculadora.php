<?php
include 'Calculadora.php';
echo "ingrese el primer numero:";
$num1= trim(fgets(STDIN));
echo "ingrese el segundo numero:";
$num2= trim(fgets(STDIN));
$calculator = new Calculadora($num1,$num2); 
echo $calculator;
$sumas= $calculator->sumando();
echo "voy a obtener de la suma: ".$sumas." \n";

$restas= $calculator->restando();

echo "voy a obtener de la resta: ".$restas." \n";
$producto= $calculator->multiplicando();

echo "voy a obtener el producto: ".$producto." \n";
$dividnd= $calculator->dividiendo();
echo "voy a obtener de la division: ".$dividnd." \n";

echo "voy a obtener el valor del atributo Primer Numero: " .$calculator->getprimerNumero() . " \n";      
echo "voy a obtener el valor del atributo Segundo  Numero: " .$calculator->getsegundoNumero()." \n"; 
$calculator->setPrimerNumero(5);
echo  $calculator. " \n";
$calculator->setSegundoNumero(15);
echo $calculator . " \n";






?>