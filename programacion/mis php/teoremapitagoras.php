<?php

/*Programa teoremapitagoras*/;
/* sacaremos la hipotenusa utilizando el teorema de pitagoras*/;

echo "ingrese la medida del cateto 1:  ";
$cateto1 = trim (fgets (STDIN));
echo "ingrese la medida del cateto 2:  ";
$cateto2 = trim (fgets (STDIN));
$premilinar = ($cateto1*$cateto1)+($cateto2*$cateto2);
$hipotenusa = sqrt($premilinar);
echo "Con un cateto de $cateto1 cm y un cateto de $cateto2 cm, la hipotenusa es de $hipotenusa cm";
