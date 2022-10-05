<?php

$teatro = ["nombre" =>"Colón",
           "dirección" => "Cerrito628", 
           "funciones" => array("funcion1"=> array("nombre"=>"Hamlet",
                                                   "precio"=> 100),
                                "funcion2"=> array("nombre"=>"Macbeth",
                                                    "precio"=> 200),
                                "funcion3"=> array("nombre"=>"Otelo",
                                                    "precio"=> 150),
                                "funcion4"=> array("nombre"=>"Pericles",
                                                    "precio"=> 300))];


// CON ESSTE ARRAY, EN FOREACH SOLO ME PONE EL VALOR ULTIMO SI TDAS LAS CLAVES SON IGUALES...PARA Q ME LO TOME, CADA CLAVE DEBE SER DIFERENTE
$array1 = ["nombre" => "lucas",
"caballero" =>"matias",
"HAN" =>"Mar",
"nombSSSre" =>"Arnau"];

$array2 =[
    "nombre" => "maria",
    "apellido" =>  "kalauz",
    "documento" => 3333322,
    "sexo" => "femenino"];

$animales= ["perro","gato","cocodrilo", "mosca"];

$datos= array(
    array("arnau",25,"españa"),
    array("pedro",99,"inglaterra"),
    array("escamoso",78,"argentina"),
    array("estean",45,"irlanda")
);

////////////////////////////////////////////////////////////////////////////
//para recorrer un array que tiene claves normales y arrays dentro la opcion es

foreach ($teatro["funciones"] as $key => $value){
    foreach ($value as $items => $valuesss){
        echo "
        en la funcion $key, los precios fueron para $items : $valuesss \n";
    }
}

/////////////////////////////////////////////////////////////////////////////////

//RECORRIDO PARA ARRAY DE ARRAYS

foreach ($datos as $valor){
    foreach ($valor as $value) {
        echo $value ."\n";
    }
}

foreach ($array1 as $key => $value) {
    $string = "clave ". $key ." : ". $value."\n";
    echo $string;
}

//////////////////////////////////////////////////////////////////////////////
foreach ($animales as $key => $value) {
    //$string = "$value";

    echo "llave".$key .":". $value ."\n";
}

/////////////////////////////////////////////////////////////////////////

foreach ($array2 as $key => $value) {
    $string = "$key : $value \n";
    echo $string;
}


///////////////////////////////////////////////////////////////////////
//probando el for commo usarlo FUNCIONA BIEN
for ($i=0; $i<4;$i++){
    echo $animales[$i]. "\n";
}

///////////////////////////////////////////////////////////////////////////
//prbando el while como ussarlo FUNCIONA BIEN
$c=0;
$cant = count($animales);
echo $cant;
while($c<$cant){
    
    echo $animales[$c] ."\n";
    $c++;
}

