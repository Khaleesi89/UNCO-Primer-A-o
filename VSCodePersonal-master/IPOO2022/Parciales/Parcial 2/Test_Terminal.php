<?php
    include "Responsable.php";
    include "Viajes.php";
    include "Nacional.php";
    include "Internacional.php";
    include "Terminal.php";
    include "Empresa.php";

    //nombre, apellido, Nro de Documento, direccion, mail y telefono
    $objResponsable1 = new Responsable("Dean", "Winchester", "44014172", "22 Oeste Lebanon", "deanHunter@gmail.com", "2984141747");
    $objResponsable2 = new Responsable("Sam", "Winchester", "92476572", "22 Este Lebanon", "samHunter@gmail.com", "2984220118");

    //$destino, $horaPartida, $horaLlegada, $numero, $importe, $cantAsientos, $objResponsable, $porcentajeDescuento
    $objViaje1 = new Nacional("Arkansas", "22:00", "12:30", 1, 1000, 10, $objResponsable1, 0.10);
    $objViaje2 = new Nacional("New York", "01:00", "15:00", 2, 2000, 5, $objResponsable2, 0.10);
    $objViaje6 = new Nacional("Arkansas", "12:00", "12:30", 6, 1500, 10, $objResponsable1, 0.10);
    $objViaje7 = new Nacional("New York", "05:00", "15:00", 7, 2500, 5, $objResponsable2, 0.10);
    //$destino, $horaPartida, $horaLlegada, $numero, $importe, $cantAsientos, $objResponsable, $documentacion, $porcentajeImpuestos
    $objViaje3 = new Internacional("New York", "04:00", "15:00", 3, 2500, 5, $objResponsable1, "Ninguna", 0.45);
    $objViaje4 = new Internacional("Chicago", "20:00", "16:30", 4, 3000, 15, $objResponsable1, "Pasaporte", 0.45);
    $objViaje5 = new Internacional("Las Vegas", "04:00", "21:00", 5, 4000, 20, $objResponsable2, "Ninguna", 0.45);
    $objViaje8 = new Internacional("New York", "06:00", "15:00", 3, 2900, 5, $objResponsable1, "Ninguna", 0.45);
    $objViaje9 = new Internacional("Chicago", "22:00", "16:30", 4, 3500, 15, $objResponsable2, "Pasaporte", 0.45);
    $objViaje10 = new Internacional("Las Vegas", "03:00", "21:00", 5, 4500, 20, $objResponsable2, "Ninguna", 0.45);

    $coleccionViajes1 = [$objViaje1, $objViaje2, $objViaje3, $objViaje4, $objViaje5];
    $coleccionViajes2 = [$objViaje6, $objViaje7, $objViaje8, $objViaje9, $objViaje10];

    //identificación, nombre y la colección de Viajes
    $objEmpresa1 = new Empresa(1, "Metrovías", $coleccionViajes1);
    $objEmpresa2 = new Empresa(2, "Patagonia", $coleccionViajes2);

    $coleccionEmpresasRegistradas = [$objEmpresa1, $objEmpresa2];

    //denominación, dirección y la colección empresas registradas
    $objTerminal = new Terminal("Viajera", "El Dorado 1917", $coleccionEmpresasRegistradas);
    echo "1) DATOS TERMINAL:\n".$objTerminal."\n";

    //Invocación al método darViajeMenorValor():
    $arrayValoresViajes = $objTerminal->darViajeMenorValor();
    echo "\n2) VIAJES MÁS BARATOS:\n".$objTerminal->mostrarDatosArreglos($arrayValoresViajes)."\n";
?>