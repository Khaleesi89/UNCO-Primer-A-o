<?php
include "teatro.php";

$teatro = ["nombre" =>"Colón",
           "dirección" => "Cerrito628", 
           "funciones" => array("funcion1"=> array("nombre"=>"Hamlet",
                                                   "precio"=> 100),
                                "funcion2"=> array("nombre"=>"Macbeth",
                                                    "precio"=> 200),
                                "funcion3"=> array("nombre"=>"Otelo",
                                                    "precio"=> 150),
                                "funcion4"=> array("nombre"=>"Pericles",
                                                    "precio"=> 300))];
                                       
//print_r($teatro);
/*echo"cambiar el nombre del teatro: \n ";
$nombreTeatro = trim(fgets(STDIN));
echo "cambie la direccion del teatro:  \n ";
$direTeatro = trim(fgets(STDIN));*/
$nombreTeatro1 = "chacha;";
$direTeatro1 = "san clemente12";
$teatrito = new teatro($nombreTeatro1,$direTeatro1,$teatro);
//echo $teatrito;
//echo $teatrito->mostrarFunciones();
echo"cambiar el nombre del teatro:  \n ";
$nombreTeatro = trim(fgets(STDIN));
$teatrito->setNombre($nombreTeatro);
echo "cambie la direccion del teatro:  \n  ";
$direTeatro = trim(fgets(STDIN));
$teatrito->setDireccion($direTeatro);
echo $teatrito;

                                      
                                      
                                      
                                      
                