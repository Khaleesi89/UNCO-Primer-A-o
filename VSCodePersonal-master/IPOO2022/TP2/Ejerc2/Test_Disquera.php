<?php
    include "Disquera.php";
    include "Persona.php";
    $objPersona = new Persona("Dean", "Smith", "DNI", 44014172);
    $objDisquera = new Disquera(8, 21, "Abierto", "11 de Marzo 1883", $objPersona); //Delegación
    echo $objDisquera;
?>