<?php

/**
 * 1) DADO UN NUMERO RETORNAR SU FACTORIAL
*@param int $numerofact
*@return int
*/
function factNumero ($numerofact){
    $factorial = 1;
    for ($i=1; $i < $numerofact ; $i++) { 
        $factorial= $factorial * 1; 
    }
    return $factorial;
}

/*echo "ingrese un numero : ";
$numero = trim(fgets(STDIN));
$fact =factNumero($numero);
echo "el factorial de $numero es $fact";
*/

/**
 * 2) Dado un número N retornar verdadero si el número es par y falso en caso contrario.
 * @param int $numeroaverificar
 * @return string
 */
function parOimpar ($numeroaverificar){
    /* string $resultado*/
    $resultado = "falso";
    if ($numeroaverificar % 2 == 0) {

        $resultado = "verdadero";
    }
    return $resultado;
}
/*
echo "ingrese un numero : ";
$numero = trim(fgets(STDIN));
$fact = parOimpar($numero);
echo "el numero $numero es par ?: $fact "; */

/**
 * 3) DADO DOS NUMEROS M Y N SI EL NUMERO N ES DIVISIBLE POR M Y FALSO EN CASO DE VERDADERO
 * @param int $m 
 * @param int $n
 * @return string
 */


function sonDivisibles ($m, $n){
    $sondivisibles = "falso";
    if (($n%$m== 0)){
        $sondivisibles = "verdadero";
    }
    return $sondivisibles;
}

/* PROGRMA <PRINCIPAL

echo "escribir un numero ";
$uno = trim (fgets(STDIN));
echo "escribir otro numero ";
$dos = trim (fgets (STDIN));
$seranDivisibles = sonDivisibles ($dos, $uno);
echo "los numeros son divisibles" . " $seranDivisibles . ";
*/

/* 4) DAD UN ARREGLO DE NUMEROS ENTEROS, DETERMINAR LOS VALORES MAXIMOS Y MINISMO Y LAS POSICIONES EN QUE ESOS SE ENCONTRABAN EN EL ARREGLO*/
$edades = array(2,3,5,89,100); 
//print_r($edades);

$mayor= max($edades);
//echo "el mayor es " . $mayor . "\n";
$menor = min ($edades);
//echo "el menor es " . $menor . "\n";


// VALORES MAXIMOS DE UN ARREGLO
$maximo = max ($edades);


//VALOES MINIMOS DE UN ARREGLO

$minimo = min ($edades);


// POSICIONES DE LOS MAXIMMOS Y MINIMOS EN EL ARREGLO

for ($i=0; $i<count($edades); $i++){
    if ($edades [$i]== $maximo) {
        //echo "Máximo: se encuentra en la posición " . $i . "\n" ;
    } if ($edades[$i] == $minimo) {
        //echo "Mínimo: se encuentra en la posición " . $i . "\n";
}
}

/**
 * 5) Cree una función leerNombres, cuyo parámetro de entrada formal es una cantidad n de nombres (ciclo denido)
 * que solicite a un usuario los n nombres y los almacene en un arreglo indexado. la función debe retornar el arreglo indexado
 * @param int $cantidadDeNombres
 * @return array
 */

function leerNombres ($cantidadDeNombres){
    /* string $respuesta $nombresCrudo */

    $nombresRegistrados = array ();

    for ($i=0; $i < $cantidadDeNombres ; $i++) { 
        echo "Escriba el nombre a registrar: ";
        $nombresRegistrados[$i] =trim (fgets(STDIN));
    };
    return $nombresRegistrados;
}



/* int $$numeross*/
/* array $lista*/
/*echo "inicio registro" . "\n";
echo "ingrese la cantidad de nombres a ingresar : ";
$numeross = trim (fgets(STDIN));
$lista= [];
$lista = leerNombres($numeross);
print_r ($lista);


//6) Dado un número que se corresponde a un año calendario, retornar un arreglo con todos los años bisiestos menores al año ingresado. 
//Nota: Un año es bisiesto cuando es múltiplo de cuatro, exceptuando los múltiplos de 100 que no lo sean de 400. 
/**
 * @param int $anio
 * @return array
 */

/*function anioBisiesto($anio){
    $coleccionDeAnios=[];
  while($anio>0){

        if($anio%4==0 && $anio%400==0){ 
            array_push($coleccionDeAnios,$anio);
            if ($anio % 100 !=0)   
        }
        $anio=($anio - 4);
        array_push($coleccionDeAnios,$anio);    
}        
return $coleccionDeAnios;
};
*///FUNCIONA PERO NO SACA A LOS QUE SON DIVISIBLES EN 100//



function anioBisiesto($anio){
    $coleccionDeAnios=[];
   while($anio>0){

        if(($anio % 4 == 0 && $anio % 100 != 0)||$anio % 400 == 0){ 
                
        }
        $anio=($anio - 4);
        array_push($coleccionDeAnios,$anio);    
   }   
return $coleccionDeAnios;
}

/*echo "ingrese un año: ";
$aniosColeccionables=[];
$anioParaVer=trim(fgets(STDIN));
$aniosColeccionables=anioBisiesto($anioParaVer);
print_r($aniosColeccionables);*/

/**
 *  7) Dado 2 arreglos A y B, de N y M elementos respectivamente. Construir un algoritmo que retorne un arreglo con los elementos de A mas los elementos de B.
 * @param array $a , $b
 * @return array
 */
//* 
/* la funcion array_merge Combina dos o más arrays. Combina los elementos de uno o más arrays juntándolos de modo que los valores de uno se anexan al final del anterior. Retorna el array resultante.
Si los arrays de entrada tienen las mismas claves de tipo string, el último valor para esa clave sobrescribirá al anterior. Sin embargo, los arrays que contengan claves numéricas, el último valor no sobrescribirá el valor original, sino que será añadido al final.
Los valores del array de entrada con claves numéricas serán renumeradas con claves incrementales en el array resultante, comenzando desde cero. 
Para anexar elementos del segundo array al primer array entretanto no se sobrescriban los elementos del primer array y no se reindexe, se ha de utilizar el operador + de unión de arrays.
$resultado = $array1 + $array2*/


function unionArrays ($a, $b){
    $arregloUnido = [];
    $arregloUnido = array_merge($a,$b);
    return $arregloUnido;
}



/**
 * 8) Dado 2 arreglos A y B, de N y M elementos respectivamente. Construir un algoritmo que retorne un arreglo con los elementos de A que no estan en B
 * @param array $arrayComp1 $arrayComp2
 * @return array
 */
/*la funcion array_diff Compara array1 con uno o más arrays y devuelve los valores de array1 que no estén presentes en ninguno de los otros arrays. se puede entre 2 o mas*/
/*Devuelve un array que contiene todas las entradas de array1 que no están presentes en ninguna de los otros arrays */

 function diferenciaArrays ($arrayComp1, $arrayComp2){
     $diffArrays= [];
     $diffArrays = array_diff($arrayComp1, $arrayComp2);
     return $diffArrays;
 }


 

