<?php
    include "Prestamo.php";
    include "Persona.php";
    $objPersona = new Persona("Celeste", "Aliaga", 44014172, "11 de Marzo 1883", "caliaga1917@gmail.com", 4141747, 100000);
    $objPrestamo = new Prestamo(1, 50000, 5, 0.1, $objPersona);
    echo $objPrestamo;
?>