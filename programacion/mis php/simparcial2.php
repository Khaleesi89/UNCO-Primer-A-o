<?php

/*programa principal*/

/*programa ipLearning*;
/*string $respuesta $nombre $puesto int $edad*/

echo "desea ingresar datos de un empleado? (s/n)" ;
$respuesta = trim(fgets(STDIN));
if ($respuesta = "n") {
   echo "error, no ha ingresado ningun numero";
} else {
$promedioEdadTecnico = 0; 
$porcentajePuestoProfesionales = 0;
$elMenor = "ninguno";
$edadMenor = 0;
$tecnicos = 0;
$totalProfes = 0;
$totalEmpleados = 0 ;
$totalEdadTecnicos = 0 ; 
$totalEdadTecnicos= 0;
while($respuesta = "s") {
    $totalEmpleados = $totalEmpleados + 1;
    echo "Ingrese el nombre del empleado/a: " ;
    $nombre =trim (fgets(STDIN));
    echo "Ingrese la edad: ";
    $edad = trim(fgets(STDIN));
        if ($edad < $edadMenor){
            $edadMenor = $edad;
            $elMenor = $nombre;
        }
    echo "Ingrese puesto (t= tecnico, a=administrativo, p=profesional): " ;
    $puesto = trim (fgets(STDIN));
        if ($puesto = "t"){
            $tecnicos = $tecnicos + 1;
            $totalEdadTecnicos = $edad + $totalEdadTecnicos;
        } elseif ($puesto = "p"){
            $totalProfes = $totalProfes + 1;
        }
};
}
$promedioEdadTecnico = ((int)($totalEdadTecnicos/$tecnicos));
$porcentajePuestoProfesionales=((int)($totalProfes*100/$totalEmpleados));
echo "El nombre de la persona de menor edad en la empresa es " , $elMenor;
echo "/n"; 
echo "El porcentaje que representan los profesionales en la empresa es de " , $porcentajePuestoProfesionales ;
echo "/n";
echo "El promedio de edad del personal tecnico es de " , $promedioEdadTecnico ;




