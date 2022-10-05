<?php
/*con el radio de una circunferencia calculamos diametro, perimetro y area*/

echo "ingrese el radio  ";
$radio = trim(fgets (STDIN)) ;
$diametro = 2* $radio;
$perimetro = M_PI * $diametro;
$area = M_PI * ($radio*$radio);
echo " Para una circunferencia de un radio de $radio cm tiene un diametro de $diametro cm , un perimetro de $perimetro cm y un area de $area cm2"  ;


/*sacaremos ahora el volumen y superficie de una esfera con el mismo radio de la circunferencia*/ ;
$areaEsfera = 4*M_PI*($radio*$radio);
$volumen = 4*M_PI* ($radio*$radio*$radio)/3 ;
echo "\n" ;
echo " Para una esfera de un radio de $radio cm tiene un área de $areaEsfera cm3 y un volumen de $volumen cm3";
