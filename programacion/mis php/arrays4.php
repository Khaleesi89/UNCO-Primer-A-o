<?php

$frutas=["l" => "limon" , "h"=> "naranja", "m"=> "manzana", "d"=> "durazno"];
arsort($frutas);
foreach ($frutas as $indice => $unafruta) {
    echo "  $indice  = $unafruta ";

}