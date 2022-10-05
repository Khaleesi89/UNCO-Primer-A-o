<?php

$objPart1 = new Basket(1,$objE7 ,$objE8,'2020-10-10',80,120,75);
$objPart2 = new Basket(2,$objE9 ,$objE10,'2020-10-25',81,110,70);
$objPart3 = new Basket(3,$objE11 ,$objE12,'2020-11-25',115,85,110);

$objPart4 = new Futbol(4,$objE1 ,$objE2,'2020-10-25',3,2);
$objPart5 = new Futbol(5,$objE3 ,$objE4,'2020-11-13',0,1);
$objPart6 = new Futbol(6,$objE5 ,$objE6,'2020-11-30',2,3);

//se pone $array() para crear el array que tendra el objeto...aun está vacio
$objTorneo = new Torneo(1,$array(),100000);
$objPartido = $objTorneo->ingresarPartido($objE7,$objE11,"10-11-20","BASKET");
echo $objPartido;
$objPartido->setCantGolesE1(3);
$objPartido->setCantGolesE2(4);
$arrayGanadores = $objTorneo->darGanadores("BASKET");
echo array_string($arrayGanadores);



//funcion para mostrar array

//empty se usa para verificar si esta vacio la variable o no

function array_string($array){
    $string = "\n";
    if(!empty($array)){
        foreach($array as $clave=>$uno){
            $string .=$clave."\n".$uno."\n";
        }
    }else{
        $string .= "no hay datosque mostrar"."\n";
    }
    return  $string;
}
