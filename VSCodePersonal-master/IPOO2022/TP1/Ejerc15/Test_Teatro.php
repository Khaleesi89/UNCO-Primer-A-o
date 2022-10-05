<?php 
//Funciona.
    include 'Teatro.php';
    //cargo el arreglo asociativo
    $aFunciones=array();
    $aFunciones[0]=array("nombre"=>"Romeo y Julieta","precio"=>4500);
    $aFunciones[1]=array("nombre"=>"Hamlet","precio"=>3200);
    $aFunciones[2]=array("nombre"=>"La Casa de Bernarda Alba","precio"=>2000);
    $aFunciones[3]=array("nombre"=>"Don Juan Tenorio","precio"=>2800);

    //creo un objeto Teatro
    $objTeatro = new Teatro("Teatro FaI", "Buenos Aires 1400", $aFunciones);
    //Modificar el nombre del teatro
    echo "| Ingrese el nuevo nombre del teatro:\n";
    $nuevoNombre = trim(fgets(STDIN));
    $objTeatro->set_NombreTeatro($nuevoNombre);
    //Modificar dirección del teatro
    echo "| Ingrese la nueva dirección del teatro:\n";
    $nuevaDireccion = trim(fgets(STDIN));
    $objTeatro->set_DireccionTeatro($nuevaDireccion);
    $cadena=$objTeatro->__toString();
    echo $cadena."\n";

    //Modificar nombre/precio del arreglo función
    echo "| Ingrese el nombre de la función que quiere modificar:\n";
    $nbreFuncion = trim(fgets(STDIN));
    echo "| Ingrese el nuevo nombre de la función:\n";
    $nuevoNombre = trim(fgets(STDIN));
    echo "| Ingrese el nuevo precio de la función:\n";
    $nuevoPrecio = trim(fgets(STDIN));
    $modifico = $objTeatro->modificar_NombrePrecioFuncion($nbreFuncion, $nuevoNombre, $nuevoPrecio);
    $resultado = ($modifico?"Se modificaron los datos exitosamente. ":"Los datos no se puedieron modificar.");
    echo $resultado;

    $cadena = $objTeatro->__toString();
    echo $cadena."\n";
?>