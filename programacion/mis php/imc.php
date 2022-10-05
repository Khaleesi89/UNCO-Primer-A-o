<?php
/**
*Retorna el índice de masa corporal IMC ;

* @param float $peSo;
* @param float $eStatura;
* @return float
*/
function indicemc (float $peSo, float $eStatura){
    $imc = $peSo /($eStatura*$eStatura);
    return ($imc);
}

/**
 * Indica su estado de salud nutricional teniendo en cuenta la clasificación de la OMS *;
 * @param float $iMc ; 
 * @return string $clasificacion ;
 */
function estadoNutricional (float $iMc){
    if  ($iMc <=18.5){
        $clasificacion = "tiene bajo peso";
    }    elseif ($iMc < 24.99){
        $clasificacion = "tiene peso normal";
    }    elseif ($iMc < 29.99){
        $clasificacion = " tiene sobrepeso";
    }    elseif ($iMc< 34.99){
        $clasificacion = " tiene obesidad leve";
    }    elseif ($iMc < 39.99){
        $clasificacion = " tiene obesidad media";
    } else 
        $clasificacion = " tiene obesidad mórbida";
     return $clasificacion;}



//*PROGRAMA indiceMasaCorporal*/
/* float $float , $estutura , $indMasCorp, string $estadoNutri*/
echo " Ingrese su peso en kilogramos: ";
$peso = trim (fgets (STDIN));
echo "Ingrese su estatura en metros: ";
$estatura = trim (fgets (STDIN));
$indMasCorp = indicemc($peso, $estatura);
$estadoNutri = estadoNutricional($indMasCorp);
echo "Su estado nutricional con". $peso . "kg. y" . $estatura . "mts. es de IMC de " . $indMasCorp . ", por lo que su clasificación según la OMS es que" . $estadoNutri;
?>




