<?php
//Revisar.
    include "Linea.php";
    $objLinea = new Linea(1, 2, 4, 8);  // se crea un objeto cafetera y se asigna a la variable coffe
    $derecha = $objLinea->mueveDerecha(5);
    echo $derecha."\n";
    $datos = $objLinea->__toString();
    echo $datos."\n";
?>