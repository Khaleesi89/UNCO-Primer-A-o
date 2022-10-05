<?php
//Funciona.
    include ("Calculadora.php");
    $s = new Calculadora(5,7);
    $r = new Calculadora(50,17);
    $m = new Calculadora(25,5);
    $d = new Calculadora(12,3);
    echo "Suma: ".$s->Sumar()."\n";
    echo "Resta: ".$r->Restar()."\n";
    echo "Multiplicación: ".$m->Multiplicar()."\n";
    echo "División: ".$d->Dividir()."\n";

    echo "\n| Ingrese el primer número: ";
    $nro1 = trim(fgets(STDIN));
    echo "| Ingrese el segundo número: ";
    $nro2 = trim(fgets(STDIN));
    $prueba = new Calculadora($nro1, $nro2);
    echo $prueba;
    $prueba->setNumero1(14);
    echo $prueba;
    $prueba->setNumero2(15);
    echo $prueba;
?>