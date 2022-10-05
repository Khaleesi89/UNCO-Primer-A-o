<?php
    include "Partido.php";
    include "Categoria.php";
    include "Equipo.php";
    include "Futbol.php";
    include "Basket.php";
    include "Torneo.php";

    //Se crean los objEquipos:
    //Parámetros de la clase Equipo: $nombreEquipo, $nombreCapitan, $cantJugadores, $categoria
    $objEquipo1 = new Equipo("Jaeger", "Pentecost", 24, "Mayores");
    $objEquipo2 = new Equipo("Kaiju", "Otachi", 24, "Mayores");
    $objEquipo3 = new Equipo("Hunters", "Dean", 12, "Juveniles");
    $objEquipo4 = new Equipo("Monsters", "Crowley", 12, "Juveniles");
    $objEquipo5 = new Equipo("Werewolf", "Scott", 10, "Menores");
    $objEquipo6 = new Equipo("Human", "Chris", 10, "Menores");

    $objEquipo7 = new Equipo("Lakers", "Carmelo", 8, "Mayores");
    $objEquipo8 = new Equipo("Warriors", "Kerr", 8, "Mayores");
    $objEquipo9 = new Equipo("Celtics", "Udoka", 6, "Juveniles");
    $objEquipo10 = new Equipo("Mavericks", "Kidd", 6, "Juveniles");
    $objEquipo11 = new Equipo("Nets", "Nash", 4, "Menores");
    $objEquipo12 = new Equipo("Timberwolves", "Finch", 4, "Menores");

    //Se crean los objPartidos:
    $arrayPartidos = [];
    //Parámetros de la clase Basket: $idPartido, $fecha, $objEquipo1, $objEquipo2, $cantGolesE1, $cantGolesE2, $cantInfracciones
    $objPartido1 = new Basket(0, "10/10/2020", $objEquipo7, $objEquipo8, 80, 120, 75);
    $objPartido2 = new Basket(1, "25/10/2020", $objEquipo9, $objEquipo10, 81, 110, 70);
    $objPartido3 = new Basket(2, "15/11/2020", $objEquipo11, $objEquipo12, 115, 85, 110);
    //Parámetros de la clase Futbol: $idPartido, $fecha, $objEquipo1, $objEquipo2, $cantGolesE1, $cantGolesE2
    $objPartido4 = new Futbol(3, "25/10/2020", $objEquipo1, $objEquipo2, 2, 3);
    $objPartido5 = new Futbol(4, "13/11/2020", $objEquipo3, $objEquipo4, 0, 1);
    $objPartido6 = new Futbol(5, "30/11/2020", $objEquipo5, $objEquipo6, 2, 3);
    $arrayPartidos = [$objPartido1, $objPartido2, $objPartido3, $objPartido4, $objPartido5, $objPartido6];

    //1. Creación de un objTorneo:
    $objTorneo = new Torneo($arrayPartidos, 100000);
    echo "\n1)\n".$objTorneo;

    //2. Invocación al método ingresarPartidos:
    $ingresarPartido = $objTorneo->ingresarPartidos($objEquipo7, $objEquipo11, "10/11/2020", "Basket");
    if ($ingresarPartido == false) {
        echo "\n2)  >>> ERROR. El partido no pudo agregarse.\n";
    } else {
        echo "\n2)  >>> El partido se agregó con éxito.\n";
    }

    //3. Invocación del método darGanadores($deporte):
    $ganadores = $objTorneo->darGanadores("Basket");
    echo "\n3) Ganadores de Basket:\n".$objTorneo->mostrarDatosArreglos($ganadores)."\n";

    //4. Invocación del método darGanadores($deporte):
    $ganadores = $objTorneo->darGanadores("Futbol");
    echo "4) Ganadores de Fútbol:\n".$objTorneo->mostrarDatosArreglos($ganadores)."\n";

    //5. Invocación del método calcularPremioPartido($objPartido):
    echo "5) Calcular el importe de los partidos:\n";
    $importePartido1 = $objTorneo->calcularPremioPartido($objPartido1);
    echo "  Partido 1:\n".$objTorneo->mostrarImportePartido($importePartido1)."\n";

    $importePartido2 = $objTorneo->calcularPremioPartido($objPartido2);
    echo "  Partido 2:\n".$objTorneo->mostrarImportePartido($importePartido2)."\n";

    $importePartido3 = $objTorneo->calcularPremioPartido($objPartido3);
    echo "  Partido 3:\n".$objTorneo->mostrarImportePartido($importePartido3)."\n";

    $importePartido4 = $objTorneo->calcularPremioPartido($objPartido4);
    echo "  Partido 4:\n".$objTorneo->mostrarImportePartido($importePartido4)."\n";

    $importePartido5 = $objTorneo->calcularPremioPartido($objPartido5);
    echo "  Partido 5:\n".$objTorneo->mostrarImportePartido($importePartido5)."\n";

    $importePartido6 = $objTorneo->calcularPremioPartido($objPartido6);
    echo "  Partido 6:\n".$objTorneo->mostrarImportePartido($importePartido6)."\n";

    /*X. Invocación al método ingresarPartidos con datos válidos para probar que se ingresen los partidos correctamente:
    $ingresarPartido = $objTorneo->ingresarPartidos($objEquipo11, $objEquipo12, "10/11/2020", "Basket");
    if ($ingresarPartido == false) {
        echo "\n2)  >>> ERROR. El partido no pudo agregarse.\n";
    } else {
        echo "\n2)  >>> El partido se agregó con éxito.\n";
        echo $objTorneo;
    }*/
?>