<?php

$frutas=["l" => "limon" , "n"=> "naranja", "m"=> "manzana", "d"=> "durazno"];
rsort($frutas);
foreach ($frutas as $indice => $unafruta) {
    echo "  $indice  = $unafruta ";

}