<?php

$frutas=["l" => "limon" , "h"=> "naranja", "m"=> "manzana", "d"=> "durazno"];
ksort($frutas);
foreach ($frutas as $indice => $unafruta) {
    echo "  $indice  = $unafruta ";

}