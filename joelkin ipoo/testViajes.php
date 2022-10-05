<?php

function mostrar($arr){
    $string = "";
    foreach($arr as $item){
        $string .=$item."\n";
    }
    return $string;
}

include("pasajero.php");
include("responsable.php");
include("viaje.php");
include("empresa.php");

$viaje = new Viaje();
$resp = new Responsable();
$pasajero = new Pasajero();
$empresa = new Empresa();

$count = 1;

do {
    $viaje->vaciarCampos();
    echo $count > 1 ? "\n\n\n" : "";
    echo "Ingrese una opcion ";
    echo "\n___________________________\n1. Agregar viaje\n2. Modificar viaje\n3. Eliminar viaje\n4. Mostrar viajes\n5. Agregar empresa\n6. Modificar empresa\n7. Eliminar empresa\n8. Mostrar empresas\n\n";
    $opcion = (int)readline();
    switch ($opcion) {
        case 1:
            echo "||__AGREGAR UN VIAJE__||\n\n";

            #DESTINO

            echo "Ingrese el destino del viaje: ";
            $destino = readline();
            $viaje->setVDestino($destino);

            #CANT MAX PASAJEROS

            echo "Ingrese la cantidad máxima de pasajeros: ";
            $cantMaxPasajeros = (int)readline();
            $viaje->setVCantMaxPasajeros($cantMaxPasajeros);

            #EMPRESA ASOCIADA

            echo "\n".mostrar($empresa->Listar());
            do{
                echo "ELIJA DE UNA DE LAS EMPRESAS MOSTRADAS MEDIANTE EL NUMERO AL LADO DE SU NOMBRE, ÉSTA SERA ASOCIADA AL VIAJE:  ";
                $d = (int)readline();
                $done = $empresa->Buscar($d);
                echo $done ? "" : "Identificador de Empresa inválido, por favor intente nuevamente\n ";
            }while($done!=true);
            $viaje->setIdEmpresa($empresa->getIdEmpresa());

            #RESPONSABLE

            echo "\n".mostrar($resp->Listar());
            do{
                echo "ELIJA DE UNO DE LOS RESPONSABLES LICENCIADOS MOSTRADOS MEDIANTE SU NÚMERO DE EMPLEADO, ÉSTE SERA ASOCIADA AL VIAJE:  ";
                $d = (int)readline();
                $done = $resp->Buscar($d);
                echo $done ? "" : "Número de empleado inválido, por favor intente nuevamente\n ";
            }while($done!=true);
            $viaje->setRNumeroEmpleado($resp->getRNumeroEmpleado());

            #IMPORTE

            echo "Ingrese el importe del viaje: ";
            $importe = readline();
            $viaje->setVImporte($importe);

            #TIPO ASIENTO
            $done = false;
            do{
                $done2 = false;

                if(!$done){
                    echo "¿De qué clase es el asiento? (PRIMERA/TURISTA): ";
                    $clase = readline();
                    $done = (strtoupper($clase) == "PRIMERA") || (strtoupper($clase) == "TURISTA");
                    if(!$done){
                        echo "Clase de asiento inválida, por favor intentelo nuevamente\n";
                        continue;
                    }
                }

                echo $done;

                echo "¿El asiento es de tipo cama, o semicama? (CAMA/SEMICAMA): ";
                $asiento = readline();
                $done2 = strtoupper($asiento) == "CAMA" || strtoupper($asiento) == "SEMICAMA";
                echo $done2 ? "" : "Clase de asiento inválida, por favor intentelo nuevamente\n";
            }while($done!=true || $done2!=true);
            $viaje->setTipoAsiento(strtoupper($clase).",".strtoupper($asiento));

            #IDA Y VUELTA

            do{
                echo "¿El viaje es ida y vuelta? SI/NO: ";
                $idaYVuelta = readline();
                $done = strtoupper($idaYVuelta) == "SI" || strtoupper($idaYVuelta) == "NO";
                echo $done ? "" : "Entrada inválida, debe responder SI o NO, intente nuevamente\n";
            }while($done!=true);
            $viaje->setIdaYVuelta(strtoupper($idaYVuelta));

            #RDOCUMENTO/PASAJEROS

            $coleccionPasajeros = [];

            echo "¿Desea asignar pasajeros al viaje? SI/NO: ";
            $agregar = readline();
            if(strtoupper($agregar)=="SI"){
                do{
                    do{
                        echo "Ingrese el DNI del pasajero a ingresar:  ";
                        $d = (int)readline();
                        $done = $pasajero->BuscarXDni($d);
                        echo $done ? "Ya existe un pasajero en otro viaje con este DNI, por favor intente nuevamente\n " : "";
                    }while($done!=false);

                    echo "Ingrese el nombre del pasajero: ";
                    $pnombre = readline();
                    echo "Ingrese el apellido del pasajero: ";
                    $papellido = readline();
                    echo "Ingrese el telefono del pasajero: ";
                    $ptelefono = (int)readline();

                    $last_auto_inc = $viaje->devolverIdInsercion();

                    $nuevoPasajero = new Pasajero($d,$pnombre,$papellido,$ptelefono,$last_auto_inc);
                    array_push($coleccionPasajeros,$nuevoPasajero);

                    echo "¿Desea seguir agregando pasajeros? SI/NO: ";
                    $respuesta = readline();
                }while(strtoupper($respuesta)!="NO");
            }

            #######################
            echo $viaje->Insertar() ? "" : $viaje->getMensajeOperacion();   #
            foreach($coleccionPasajeros as $p){
                echo $p->Insertar() ? "" : $viaje->getMensajeOperacion();
            }
            #######################

            echo "Viaje agregado exitosamente\n";
            break;
        case 2:
            echo "||__MODIFICAR UN VIAJE EXISTENTE__||\n\n";
            echo mostrar($viaje->Listar());
            do{
                echo "ELIJA DE UNO DE LOS VIAJES MOSTRADOS (SOLO SU NUMERO DE VIAJE):  ";
                $idViaje = (int)readline();
                $done = $viaje->Buscar($idViaje);
                echo $done ? "" : "Número de viaje inválido, por favor intente nuevamente\n ";
            }while($done!=true);

            #DESTINO

            echo "Ingrese el nuevo destino del viaje: ";
            $destino = readline();
            $viaje->setVDestino($destino);

            #CANT MAX PASAJEROS

            do{
                echo "Ingrese la nueva cantidad máxima de pasajeros: ";
                $cantMaxPasajeros = (int)readline();
                $done = (count($viaje->getColeccionPasajeros()))<($cantMaxPasajeros);
                echo $done ? "" : "La nueva cantidad maxima de pasajeros tiene conflicto con la cantidad actual de pasajeros registrados, por favor intentelo nuevamente. (Pasajeros actualmente registrados: ".count($viaje->getColeccionPasajeros()).")\n";
            }while($done!=true);
            $viaje->setVCantMaxPasajeros($cantMaxPasajeros);

            #RDOCUMENTO/PASAJEROS
            if($viaje->getColeccionPasajeros() != []){
                echo "¿Desea modificar pasajeros dentro del viaje? SI/NO: ";
                $modificar = readline();
                if(strtoupper($modificar)=="SI"){
                    do{
                        echo mostrar($viaje->listarPasajeros());
                        if($viaje->listarPasajeros() != []){
                            do{
                                echo "ELIJA DE UNO DE LOS PASAJEROS MOSTRADOS (SOLO SU DNI):  ";
                                $d = (int)readline();
                                $done = $pasajero->BuscarXDni($d);
                                echo $done ? "" : "DNI inválido, por favor intente nuevamente\n ";
                            }while($done!=true);

                            echo "¿DESEA MODIFICAR O ELIMINAR AL PASAJERO ELEGIDO?  M= modificar E/otro= eliminar: ";
                            $operacion = readline();

                            if(strtoupper($operacion) == "M"){
                                echo "Ingrese el nombre modificado del pasajero: ";
                                $pnombre = readline();
                                echo "Ingrese el apellido modificado del pasajero: ";
                                $papellido = readline();
                                echo "Ingrese el telefono modificado del pasajero: ";
                                $ptelefono = (int)readline();

                                $pasajero->cargarDatos($d,$pnombre,$papellido,$ptelefono,$viaje->getIdViaje());
                                $pasajero->Modificar();
                            }else{
                                $pasajero->Eliminar();
                                echo "Pasajero eliminado exitosamente \n";

                                echo "¿Desea seguir modificando pasajeros? SI/NO: ";
                                $respuesta = readline();
                            }
                        }else{
                            echo "No hay más pasajeros para modificar \n";
                            $respuesta = "NO";
                        }
                    }while(strtoupper($respuesta)!="NO");
                }
            }


            #EMPRESA ASOCIADA

            echo "\n".mostrar($empresa->Listar());
            do{
                echo "ELIJA DE UNA DE LAS EMPRESAS MOSTRADAS MEDIANTE EL NUMERO AL LADO DE SU NOMBRE, ÉSTA SERA ASOCIADA AL VIAJE:  ";
                $d = (int)readline();
                $done = $empresa->Buscar($d);
                echo $done ? "" : "Identificador de Empresa inválido, por favor intente nuevamente\n ";
            }while($done!=true);
            $viaje->setIdEmpresa($empresa->getIdEmpresa());

            #RESPONSABLE

            echo "\n".mostrar($resp->Listar());
            do{
                echo "ELIJA DE UNO DE LOS RESPONSABLES LICENCIADOS MOSTRADOS MEDIANTE SU NÚMERO DE EMPLEADO, ÉSTE SERA ASOCIADA AL VIAJE:  ";
                $d = (int)readline();
                $done = $resp->Buscar($d);
                echo $done ? "" : "Número de empleado inválido, por favor intente nuevamente\n ";
            }while($done!=true);
            $viaje->setRNumeroEmpleado($resp->getRNumeroEmpleado());

            #IMPORTE

            echo "Ingrese el nuevo importe del viaje: ";
            $importe = readline();
            $viaje->setVImporte($importe);

            #TIPO ASIENTO

            $done = false;
            do{
                $done2 = false;

                if(!$done){
                    echo "¿De qué clase es el asiento? (PRIMERA/TURISTA): ";
                    $clase = readline();
                    $done = (strtoupper($clase) == "PRIMERA") || (strtoupper($clase) == "TURISTA");
                    if(!$done){
                        echo "Clase de asiento inválida, por favor intentelo nuevamente\n";
                        continue;
                    }
                }

                echo "¿El asiento es de tipo cama, o semicama? (CAMA/SEMICAMA): ";
                $asiento = readline();
                $done2 = strtoupper($asiento) == "CAMA" || strtoupper($asiento) == "SEMICAMA";
                echo $done2 ? "" : "Clase de asiento inválida, por favor intentelo nuevamente\n";
            }while($done!=true || $done2!=true);
            $viaje->setTipoAsiento(strtoupper($clase).",".strtoupper($asiento));

            #IDA Y VUELTA

            do{
                echo "¿El viaje es ida y vuelta? SI/NO: ";
                $idaYVuelta = readline();
                $done = strtoupper($idaYVuelta) == "SI" || strtoupper($idaYVuelta) == "NO";
                echo $done ? "" : "Entrada inválida, debe responder SI o NO, intente nuevamente\n";
            }while($done!=true);
            $viaje->setIdaYVuelta($idaYVuelta);

            ############################
             $viaje->Modificar();      #
            ############################

            echo "Viaje modificado exitosamente\n";
            break;
        case 3:

            echo "||__ELIMINAR UN VIAJE__||\n\n";
            echo mostrar($viaje->Listar());
            do{
                echo "ELIJA DE UNO DE LOS VIAJES MOSTRADOS (SOLO SU NUMERO DE VIAJE):  ";
                $idViaje = (int)readline();
                $done = $viaje->Buscar($idViaje);
                echo $done ? "" : "Número de viaje inválido, por favor intente nuevamente\n ";
            }while($done!=true);

            ###############################################################
            if($viaje->getColeccionPasajeros() != []){                    #
                foreach($viaje->getColeccionPasajeros() as $p){           #
                    $p->Eliminar();                                       #
                }                                                         #
            }                                                             #
            $viaje->Eliminar();                                           #
            ###############################################################

            echo "Viaje eliminado exitosamente\n";
            break;
        case 4:
            echo "||__LISTAR VIAJES__||\n\n";
            echo mostrar($viaje->Listar());
            break;
        case 5:
            echo "||__AGREGAR UNA EMPRESA__||\n\n";

            #nombre empresa
            echo "Ingrese el nombre de la empresa: ";
            $enombre = readline();
            $empresa->setENombre($enombre);

            #direccion empresa
            echo "Ingrese la dirección de la empresa: ";
            $edireccion = readline();
            $empresa->setEDireccion($edireccion);

            #######################
            echo $empresa->Insertar() ? "true" : $empresa->getMensajeOperacion(); #
            #######################

            break;
        case 6:
            echo "||__MODIFICAR UNA EMPRESA EXISTENTE__||\n\n";

            echo "\n".mostrar($empresa->Listar());
            do{
                echo "ELIJA DE UNA DE LAS EMPRESAS MOSTRADAS MEDIANTE EL NUMERO AL LADO DE SU NOMBRE, ÉSTA SERA ASOCIADA AL VIAJE:  ";
                $d = (int)readline();
                $done = $empresa->Buscar($d);
                echo $done ? "" : "Número de empresa inválido, por favor intente nuevamente\n ";
            }while($done!=true);

            #nombre empresa
            echo "Ingrese el nuevo nombre de la empresa: ";
            $enombre = readline();
            $empresa->setENombre($enombre);

            #direccion empresa
            echo "Ingrese la nueva dirección de la empresa: ";
            $edireccion = readline();
            $empresa->setEDireccion($edireccion);

            ########################
            $empresa->Modificar(); #
            ########################
            break;
        case 7:

            echo "||__ELIMINAR UNA EMPRESA__||\n\n";

            echo "\n".mostrar($empresa->Listar());
            do{
                echo "ELIJA DE UNA DE LAS EMPRESAS MOSTRADAS MEDIANTE EL NUMERO AL LADO DE SU NOMBRE, ÉSTA SERA ASOCIADA AL VIAJE:  ";
                $d = (int)readline();
                $done = $empresa->Buscar($d);
                echo $done ? "" : "Número de empresa inválido, por favor intente nuevamente\n ";
            }while($done!=true);
            #########################################################################
            $empresa->eliminarViajesAsociados();                                    #
            echo $empresa->Eliminar() ? "TRUE" : $empresa->getMensajeOperacion();   #
            #########################################################################
            break;
        case 8:
            echo "||__LISTAR EMPRESAS__||\n\n";
            echo mostrar($empresa->Listar());
            break;
    }
    $count++;
}while($opcion!=0);