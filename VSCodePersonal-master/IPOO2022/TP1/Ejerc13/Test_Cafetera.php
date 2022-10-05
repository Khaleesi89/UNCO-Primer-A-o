<?php
//Funciona.
    include "Cafetera.php";
    $objCafetera = new Cafetera(50, 25);  // se crea un objeto cafetera y se asigna a la variable coffe
    $datos = $objCafetera->__toString();
    echo $datos."\n";
    $llenarCafetera = $objCafetera->llenarCafetera();
    $ingresoCafe = $objCafetera->agregarCafe(27);
    $llenarTaza = $objCafetera->servirTaza(34);
?>