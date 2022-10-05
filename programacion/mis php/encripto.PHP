<?php
/**
* funcion para encriptar el número ingresado *;
*@param int $numeroE;
*@param int $d1;
*@param int $d2;
*@param int $d3;
*@param int $d4;
*@return int
*/
function encript (int $numeroE){
    //* int $d1, $d2, $d3,$d4,$aux1, $ensamblN, $numeroE*/
/*descomponer*/
$d1 = (int)($numeroE/1000);
$d2 = (int)(($numeroE % 1000)/100);
$d3 = (int)(($numeroE % 100)/10);
$d4 = (int)( $numeroE % 10);
/*encriptación */

$d1 = ($d1+7)%10 ;
$d2 = ($d2+7)%10 ;
$d3 = ($d3+7)%10 ;
$d4 = ($d4+7)%10 ;

/*reemplazo de digitos 1 a 3*/
$aux1 = $d1;
$d1 = $d3;
$d3 = $aux1;

/*reemplazo de dígitos 2 a 4*/
$aux1 = $d2;
$d2 = $d4;
$d2 = $aux1;

/*ensamblado*/
$ensamblN = (($d1*1000)+($d2*100)+($d3*10)+$d4) ;
return ($ensamblN);
}

/**
 * Funcion para desencriptar el número encriptado
* @param int $desencripN ;
* @return int;
*/

function desecript (int $desencripN){
/* int $d1,$d2,$d3,$d4,$aux,$desencripN*/
/*descomponer*/
$d1 = (int)($desencripN /1000);
$d2 = (int)(($desencripN % 1000)/100);
$d3 = (int)(($desencripN % 100)/10);
$d4 = (int)($desencripN % 10);
/* Encriptación */
$d1 = ($d1+ 3)% 10;
$d2 = ($d2+ 3)% 10;
$d3 = ($d3+ 3)% 10;
$d4 = ($d4+ 3)% 10;
/* reemplazo de digitos 3 a 1*/
$aux1 = $d3;
$d3 = $d1;
$d1 = $aux1;

/* Ensamblado */
$numeRs = (($d1*1000)+($d2*100)+($d3*10)+$d4);
return ($numeRs);

}

/*programa principal desencriPtacion */

/* int $numeroIngresado, $nuMeroEncriptado, $nuMeroDesencrip*/

echo "Por favor ingrese un número de 4 dígitos: ";
$numeroIngresado = trim (fgets(STDIN));
    if ($numeroIngresado < 999 || $numeroIngresado > 9999) {
        echo "Error- Ingrese un número de 4 dígitos";
        echo "\n";
    }
$nuMeroEncriptado = encript ($numeroIngresado);
echo "El número ingresado encriptado es " . $nuMeroEncriptado . ".";
echo "\n";
$nuMeroDesencrip = desecript($nuMeroEncriptado);
echo "El número desencriptado es ".$nuMeroDesencrip. ".";

?>


