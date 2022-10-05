<?php
    include "Lectura.php";
    include "Libro.php";

    $objLibro = new Libro("7787", "Odisea", "1999", "Mers", "Mauro", "Mels");
    $objLectura = new Lectura($objLibro, 25);
    echo "1)\n".$objLectura."\n";

    $objLectura->siguientePagina();
    echo "2)\n".$objLectura."\n";

    $objLectura->retrocederPagina();
    echo "3)\n".$objLectura."\n";

    $objLectura->irPagina(35);
    echo "4)\n".$objLectura."\n";
?>