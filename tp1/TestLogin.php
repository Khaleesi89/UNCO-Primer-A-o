<?php
include "Login.php";

do{
    $resultado =false;  
    echo "escribir el usuario: ";
    $usuario = trim(fgets(STDIN));
    echo "escribir el contraseña: ";
    $password = trim(fgets(STDIN));
    echo "escribir el frase: ";
    $frases = trim(fgets(STDIN));
    $objLogic = new Login($usuario,$password,$frases);
    $arrayCompleto = $objLogic->getColecContras();

    echo "desea seguir creando nuevos objetos? : S/N ";
    $respuesta = trim(fgets(STDIN));
    if($respuesta == "S"){
        $resultado = true;
    }
}while($resultado);
echo $objLogic;


