<?php

$frutas=["l" => "limon" , "h"=> "naranja", "m"=> "manzana", "d"=> "durazno"];
asort($frutas);
foreach ($frutas as $indice => $unafruta) {
    echo "  $indice  = $unafruta ";

}