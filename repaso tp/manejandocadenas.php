<?php


//Realizar el diseño y la correspondiente implementación en PHP en un script manejandocadenas.php de los siguientes enunciados: 


/**
 * 1. Dada una cadena de caracteres terminada en punto retornar la cantidad de letras que contiene la cadena
 * @param string $cadenaDecifrar
 * @return int 
 */

 function cantLetras ($cadenaDecifrar){
     $longitud= strlen($cadenaDecifrar);
     $cadenaDecifrar = str_split($cadenaDecifrar);
     $letras = [];
     $referencia = "abcdefghijklmnopqrstuvwxyz";
     $letras = str_split($referencia);
    $comparacion = array_diff($cadenaDecifrar , $letras);
    $longitudfinal = count($comparacion);
    $totalLetras = $longitud - $longitudfinal;
    return $totalLetras;
 }

 
//$arrayDeLetras = [];
//$paraDecifrar = "hkloieuwj@.,-";
//$arrayDeLetras = cantLetras($paraDecifrar);
//print_r($arrayDeLetras); 


 /**
  * 2. Dado un texto terminado en / y un caracter, determinar cuántas veces aparece ese caracter en la cadena.
  * @param string $cadenaMostrario
  * @return int
  */
  //* la funcion mb_substr_count Cuenta el número de veces que el substring buscado aparece en el string dado.
  //mb_substr_count("This is a test", "is"); // imprime 2.  lo primero es el texto y lo segundo lo que hay q buscar

  function buscoCaracter($cadenaMostrario){
        $caractFinales = "@.,-{}+?¡¿'<>*][_;:¨=&%$#°|";

        $caracterTotal = substr_count($cadenaMostrario,"/" , 0);
        return $caracterTotal;
  }

//$stringAbuscar = "hoy voy/mas arriba del cielo/ @mamos nuestra tierr@/";
//$teBusco = buscoCaracter($stringAbuscar);
//echo $teBusco;
  

  /**
   * 3. Dada 2 cadenas cadena1 y cadena2 retornar verdadero si cadena2 se encuentra en cadena1 y falso en caso contrario.
   * @param string $cadena1 
   * @param string $cadena2
   * @return string 
   */

   function estaContenido($cadena1,$cadena2){
        $seraQestaContenido = str_contains($cadena1,$cadena2);
        return $seraQestaContenido;
   }

$parrafo1 = "elsolesmuyfuerte";
$parrafo2 = "esmuyfuerteelamor";
$enComun= estaContenido($parrafo1,$parrafo2);
echo " el resultado es " .$enComun . ".";

