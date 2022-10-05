<?php

$frutas=["l" => "limon" , "n"=> "naranja", "m"=> "manzana", "d"=> "durazno"];
sort($frutas);
foreach ($frutas as $indice => $unafruta) {
    echo "  $indice  = $unafruta ";

}