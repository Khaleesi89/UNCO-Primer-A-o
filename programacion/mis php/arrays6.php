<?php

$frutas=["l" => "limon" , "h"=> "naranja", "m"=> "manzana", "d"=> "durazno"];
krsort($frutas);
foreach ($frutas as $indice => $unafruta) {
    echo "  $indice  = $unafruta ";

}