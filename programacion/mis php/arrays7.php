<?php

function cmp($a , $b){
    if ($a == $b){
        $orden = 0;
    } elseif ($a<$b){
        $orden = -1;
    } else {
        $orden = 1;
    }
    return $orden;

}
$arreglo = ["a " =>4 , "b"=> 8, "c" => -1 , "d" => -9];
uasort($arreglo, 'cmp');
foreach ($arreglo as $indice => $elemento) {
    echo " $indice = $elemento ";
    
}
