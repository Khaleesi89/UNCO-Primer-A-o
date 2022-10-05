<?php
    include "Persona.php";
    include "Cuota.php";
    include "Prestamo.php";
    include "Financiera.php";

    //1. Se crea el objeto financiera:
    $objFinanciera = new Financiera("Money", "Av. Arg 1234");

    //2. Se crean los objetos personas y los objetos préstamos:
    $objPersona1 = new Persona("Pepe", "Flores", 44014172, "Bs.As 12", "pepeflores@gmail.com", "299-444567", 40000);
    $objPersona2 = new Persona("Luis", "Suarez", 92476572, "Bs.As 123", "luissuarez@gmail.com", "299-4455", 4000);

    $objPrestamo1 = new Prestamo(1, 50000, 5, 0.1, $objPersona1);
    $objPrestamo2 = new Prestamo(2, 10000, 4, 0.1, $objPersona2);
    $objPrestamo3 = new Prestamo(3, 10000, 2, 0.1, $objPersona2);

    //3. Se incorpora los tres objetos préstamos al arreglo de préstamos:
    $objFinanciera->incorporarPrestamo($objPrestamo1);
    $objFinanciera->incorporarPrestamo($objPrestamo2);
    $objFinanciera->incorporarPrestamo($objPrestamo3);

    //4. Se muestra en pantalla la información del objeto financiera:
    echo $objFinanciera;

    //5. Se invoca al método otorgarPrestamoSiCalifica:
    $objFinanciera->otorgarPrestamoSiCalifica();

    //6. Se muestra en pantalla la información del objeto financiera:
    echo $objFinanciera;

    //7. Se invoca al método informarCuotaPagar (se almacena el valor en la variable $objCuota):
    $objCuota = $objFinanciera->informarCuotaPagar(2);

    //8. Se muestra en pantalla la información de la variable del inciso 7:
    echo $objCuota;

    //9. Se invoca al método darMontoFinalCuota con el objeto obtenido del inciso 7:
    $montoFinalCuota = $objCuota->darMontoFinalCuota();
    echo "+| Monto a pagar de la cuota: ".$montoFinalCuota."\n";

    //10. Se invoca al método setCancelada(true) con el objeto obtenido del inciso 7:
    $objCuota->setCancelada(true);

    //11. Se invoca al método informarCuotaPagar y se almacena el valor en la variable $objCuota:
    $objCuota = $objFinanciera->informarCuotaPagar(2);

    //12. Se muestra en pantalla la información del objeto obtenido en el inciso anterior:
    echo $objCuota;
?>