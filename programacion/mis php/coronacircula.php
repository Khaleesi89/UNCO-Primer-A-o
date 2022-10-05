<?php
/**
 * Calculo de cada superficie circular;
*@param float $pi;
*@param float $radio;
*@return float $superficie;
*/
function circulaR ($radio)
{
$pi= 3.14;
$superficie = $pi*($radio**2);
return $superficie;
}

/**
 * Cálculo de la corona circular;
 * @param float $circuloMayor;
 * @param float $circuloMenor;
 * @return float $supCoronaCircular; 
 */
function coronaCircular ($circuloMayor,$circuloMenor)
{
    $supCoronaCircular= $circuloMayor - $circuloMenor;
    return $supCoronaCircular;
    }

    /*PROGRAMA PRINCIPAL supCorCircular*/;
    /* float $superficieFinal, $radioMayor, $radioMenor*/;

    echo "Ingrese el radio de la circunferencia mayor en cm: ";
$radioMayor= trim (fgets (STDIN));
echo "Ingrese el radio de la circunferencia menor en cm: ";
$radioMenor = trim (fgets (STDIN));
$radioMayor= circulaR($radioMayor);
$radioMenor= circulaR($radioMenor);
$superficieFinal= coronaCircular ($radioMayor, $radioMenor);
echo "La superficie de la corona circular es : ", $superficieFinal, "cm2";




