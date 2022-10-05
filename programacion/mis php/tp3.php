<?php

/*programa de intercambio*/
/*int $a , $b */

echo "ingrese número a: ";
$a = trim (fgets (STDIN));
echo "ingrese número b : ";
$b=trim (fgets (STDIN));
$b=$a+$b;
$a=$b-$a;
$b=$b-$a;
echo "el nuevo valor de a es: . $a .";
echo "el nuevo valor de b es: . $b .";
