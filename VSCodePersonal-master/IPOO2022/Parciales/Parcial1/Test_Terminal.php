<?php
    include "Responsable.php";
    include "Viaje.php";
    include "Terminal.php";
    include "Empresa.php";

    //nombre, apellido, Nro de Documento, direccion, mail y telefono
    $objResponsable1 = new Responsable("Dean", "Winchester", "44014172", "22 Oeste Lebanon", "deanHunter@gamil.com", "2984141747");
    $objResponsable2 = new Responsable("Sam", "Winchester", "92476572", "22 Este Lebanon", "samHunter@gamil.com", "2984220118");

    //destino, hora de partida, hora de llegada, número, importe, fecha, cantidad de asientos totales
    //cantidad de asientos disponibles, y una referencia a la persona responsable del viaje
    $objViaje1 = new Viaje("Arkansas", "22:00", "12:30", 1, 1000, 10, $objResponsable1);
    $objViaje2 = new Viaje("New York", "01:00", "15:00", 2, 2000, 5, $objResponsable2);
    $objViaje3 = new Viaje("Chicago", "20:00", "16:30", 3, 3000, 15, $objResponsable1);
    $objViaje4 = new Viaje("Las Vegas", "04:00", "21:00", 4, 4000, 20, $objResponsable2);

    $coleccionViajes1 = [$objViaje1, $objViaje2];
    $coleccionViajes2 = [$objViaje3, $objViaje4];

    //identificación, nombre y la colección de Viajes
    $objEmpresa1 = new Empresa(1, "Metrovías", $coleccionViajes1);
    $objEmpresa2 = new Empresa(2, "Patagonia", $coleccionViajes2);

    $coleccionEmpresasRegistradas = [$objEmpresa1, $objEmpresa2];

    //denominación, dirección y la colección empresas registradas
    $objTerminal = new Terminal("Viajera", "El Dorado 1917", $coleccionEmpresasRegistradas);
    echo "1)\n".$objTerminal."\n";

    //1. ventaAutomatica (cant. asientos: 3 - destino: Arkansas)
    //$ventaViaje = $objTerminal->ventaAutomatica(3, "Arkansas"); ->> aplicación del método según la consigna del test.
    //El enunciado del método pide como parámetros: $cantAsientos, $fecha, $destino, $empresa
    $ventaViaje = $objTerminal->ventaAutomatica(3, "22 de abril", "Arkansas", "Metrovías"); //->> aplicación del método según el enunciado de la clase.

    //2. empresaMayorRecaudación
    $empresaMayorRecaudacion = $objTerminal->empresaMayorRecaudacion();
    echo "2)\n".$empresaMayorRecaudacion;

    //3. responsableViaje($numeroViaje)
    $responsable = $objTerminal->responsableViaje(3);
    echo "3)\n".$responsable."\n";
?>