<?php


//hice cambios en mi base para pueda cargar manualm las id...q eran autoincrement en la base original
    //EN MI BASE PRIMERO HAY QUE CREAR EMPERSA Y RESPONSABLE PARA CRAR LOS VIAJES Y VIAJES PARA CREAR PASAJEROS
    include "BaseDatos.php";
    include "Viaje.php";
	include "Responsable.php";
	include "Pasajero.php";
    include "Empresa.php";

	
	$viaje = new Viaje();
	$responsable = new Responsable();
	$pasajero = new Pasajero();
	$empresa = new Empresa();
	$coleccionPasajeros = [];

	
	
	function menu(){
            $menu= "Ingrese una opción:\n\
                1) Agregar una empresa 
                2) Cargar un viaje 
                3) Cargar un pasajero 
                4) Cargar un responsable 
                5) Modificar una empresa existente 
                6) Modificar un viaje 
                7) Modificar un pasajero 
                8) Modificar un responsable 
                9) Eliminar una empresa 
               10) Eliminar un viaje 
               11) Eliminar un pasajero 
               12) Eliminar un responsable 
               13) Listar empresas 
               14) Listar los viajes 
               15) Listar los pasajeros 
               16) Listar los responsables 
               17) Salir\n";                        
            return $menu;
        }


	

        //PROGRAMA PRINCIPAL
        $out = true;
        do {

            $menu = menu();
            echo $menu."\n";
            $opcion = trim(fgets(STDIN));
            switch ($opcion) {
                case 1:
                    //1) Agregar una empresa
                    $salida = false; 
                    do{
                        crearEmpresa();
                        echo "\n Desea seguir cargando empresas? SI o NO \n";  //LISTO
                        $resp = strtoupper(trim(fgets(STDIN)));
                        if($resp == "SI"){
                            $salida = true;   
                        }else{
                            $salida = false;
                        }
                    }while($salida);
                
                break;
                case 2:
                    //2)Cargar un viaje                   //VERIFICARA QUE EL DESTINO ESTA REPETIDO UNA VEZ QUE TERMINE LA EJECUCION Y LO ELIMINA
                    $salida = false; 
                    do{
                        $viaje = crearViaje();
                        echo "\n Desea seguir cargando viajes? SI o NO \n ";
                        $resp = strtoupper(trim(fgets(STDIN)));                 //LISTO
                        if($resp == "SI"){
                            $salida = true;   
                        }else{
                            $salida = false;
                        }
                    }while($salida);
                    
                break;
                case 3:
                        //3) Cargar un pasajero
                            $salida = false; 
                            do{

                                $pasajero = infoPasajero();
                                echo " \n Desea seguir cargando pasajeros? SI o NO \n";
                                $resp = strtoupper(trim(fgets(STDIN)));               //FUNCIONA
                                if($resp == "SI"){
                                    $salida = true;   
                                }else{
                                    $salida = false;
                                }
                            }while($salida);            

                break;

                case 4:
                    //4) Cargar un responsable
                    $salida = false; 
                    do{                                                             //FUNCIONA
                        echo "Ingrese los datos del responsable \n";
                        $responsable = infoResponsable();
                        echo " \n Desea seguir cargando un responsable? SI o NO \n ";          
                        $resp = strtoupper(trim(fgets(STDIN)));
                        if($resp == "SI"){
                            $salida = true;   
                        }else{
                            $salida = false;
                        }
                    }while($salida);
                
                break;
                case 5:
                    //5) Modificar una empresa existente
                    echo "Elija de la siguiente lista la que desea modificar (identificada con un Id)\n ";
                    //verifica si hay empresas cargadas
                    $empresa = new Empresa();
                    $cantEmpresas = count($empresa->listar());
					if ($cantEmpresas == 0) {
						echo "\n Aún no se han agregado empresas.\n";               //FUNCIONA
					} else {
						//Se listan en pantalla todas las empresas almacenadas:
						echo mostrar($empresa->listar());
						do {
							echo "Seleccione una empresa (por el ID): ";
							$nroEmpresa = trim(fgets(STDIN));
							$empresaEncontrada = $empresa->buscar($nroEmpresa);
							if ($empresaEncontrada == false) {
								echo " El número de empresa seleccionado es incorrecto.\n";
							}
						} while($empresaEncontrada != true);
						//Se piden los nuevos datos de la empresa:
						echo "| Ingrese el nuevo nombre de la empresa: ";
						$name = strtoupper(trim(fgets(STDIN)));
						echo "| Ingrese la nueva dirección de la empresa: ";
						$address = strtoupper(trim(fgets(STDIN)));
						//Se setean los nuevos datos de la empresa:
						$empresa->setEnombre($name);
						$empresa->setEdireccion($address);
						$modificacionEmpresa = $empresa->modificar();
						if ($modificacionEmpresa) {
							echo "Empresa modificada con éxito.\n";
						} else {
							echo "No se pudo modificar. Verificar";
						}
                    }

                break;

                case 6:
                    //6) Modificar un viaje

                    echo "Elija de la siguiente lista el que desea modificar (identificada con un Id)\n ";
                    //verifica si hay viajes cargados
                    $viaje = new Viaje();
                    $cantViajes = count($viaje->listar());
					if ($cantViajes == 0) {
						echo "\n Aún no se han agregado viajes.\n";               //NO FUNCIONA 064: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'vdestino = 'TROMEN',  vcantmaxpasajeros = 23,idempresa = 1, rnumeroempleado =...' at line 1
					} else {
						//Se listan en pantalla todas los viajes almacenados            //ME MUESTRA LOS CODIGOS DE VIAJE ERRONEOS
						echo mostrar($viaje->listar());
						do {
							echo "Seleccione un viaje (por el ID): \n";
							$nroViaje = trim(fgets(STDIN));
                            $empresa = new Empresa();
							$encontrada = $viaje->buscar($nroViaje);
                            //echo $encontrada;
                            //die();
							if ($encontrada == false) {
								echo " El número de viaje seleccionado es incorrecto.\n";
							}
						} while($encontrada != true);
						//Se piden los nuevos datos del viaje:
						echo " Ingrese el nuevo destino: \n";
						$destino = strtoupper(trim(fgets(STDIN)));
						echo " Ingrese la capacidad máxima de pasajeros: \n";
						$maxPasajeros = trim(fgets(STDIN));
                        echo " Ingrese el importe: ";
						$importe = trim(fgets(STDIN));
                        echo " Ingrese el nuevo tipo de asiento PC(primera clase) / C (comun) \n";
						$tipoAsiento = strtoupper(trim(fgets(STDIN)));
                        echo " Ingrese el nuevo tipo de trayecto ida(I) / ida y vuelta( IYV)\n";
						$trayecto = strtoupper(trim(fgets(STDIN)));
                        echo "Elija la nueva empresa responsable del viaje \n";
                        //$empresita = new Empresa();
                        echo mostrar($empresa->listar());
                        $idEmpr = trim(fgets(STDIN));
                        $empresa->buscar($idEmpr);
                        echo "Elija al nuevo responsable del viaje \n";
                        $responsab = new Responsable();
                        echo mostrar($responsab->listar());
                        $idResp = trim(fgets(STDIN));
                        $responsab->buscar($idResp);
						//Se setean los nuevos datos del viaje

                        //$viaje->getIdViaje($nroViaje);
						$viaje->setVDestino($destino);
                        $viaje->setVCantidadMax($maxPasajeros);
                        $viaje->setVImporte($importe);
                        $viaje->setTipoAsiento($tipoAsiento);
						$viaje->setIdaVuelta($trayecto);
                        $viaje->setObjEmpresa($empresa);
                        $viaje->setObjResponsable($responsab);
						$modificacion = $viaje->modificar();
						if ($modificacion) {
							echo "Viaje modificado con éxito.\n";
						} else {
							echo "No se pudo modificar. Verificar";
                            echo $viaje->getMensajeError();
                            
						}
                    }


                break;

                case 7:
                    //7) Modificar un pasajero
                    echo "Elija de la siguiente lista el pasajero que desea modificar (DNI)\n ";
                    //verifica si hay pasajeros cargados
                    $pasaj = new Pasajero();
                    $cant = count($pasaj->listar());
					if ($cant == 0) {
						echo "\n Aún no se han agregado pasajeros.\n";               //FUNCIONA
					} else {
						//Se listan en pantalla todas los pasajeros almacenados
						echo mostrar($pasaj->listar());
						do {
							echo "Seleccione un pasajero (por el DNI): \n";
							$nroPasaj= trim(fgets(STDIN));
							$encontrada = $pasaj->buscar($nroPasaj);
							if ($encontrada == false) {
								echo " El número de documento no existe en la base.\n";
							}
						} while($encontrada != true);
						//Se piden los nuevos datos del pasajero:
						echo " Ingrese el nombre: \n";
						$name = strtoupper(trim(fgets(STDIN)));
						echo " Ingrese el apellido: \n";
						$apell = strtoupper(trim(fgets(STDIN)));
                        echo " Ingrese el telefono: ";
						$telef = trim(fgets(STDIN));
                        echo " De la siguiente lista, Ingrese el nuevo ID de viaje \n";
                        $viaje = new Viaje();
                        echo mostrar($viaje->listar());
                        $idViaj = trim(fgets(STDIN));
						//Se setean los nuevos datos del pasajero
						$pasaj->setNombre($name);
                        $pasaj->setApellido($apell);
                        $pasaj->setTelefono($telef);
                        $pasaj->setObjviaje($idViaj);
						$modificacion = $pasaj->modificar();
						if ($modificacion) {
							echo "Pasajero modificado con éxito.\n";
						} else {
							echo "No se pudo modificar al Pasajero. Verificar";
						}
                    }

                break;

                case 8:
                    //8) Modificar un responsable
                    echo "Elija de la siguiente lista el responsable que desea modificar (ID)\n ";
                    //verifica si hay responsables cargados
                    $resp = new Responsable();
                    $cant = count($resp->listar());
					if ($cant == 0) {
						echo "\n Aún no se han agregado responsables.\n";               //FUNCIONA
					} else {
						//Se listan en pantalla todas los responsables almacenados
						echo mostrar($resp->listar());
						do {
							echo "Seleccione un responsable (por n°empleado): \n";
							$nroResp= trim(fgets(STDIN));
							$encontrada = $resp->buscar($nroResp);
							if ($encontrada == false) {
								echo " El número de documento no existe en la base.\n";
							}
						} while($encontrada != true);
						//Se piden los nuevos datos del pasajero:
						echo " Ingrese el nombre: \n";
						$name = strtoupper(trim(fgets(STDIN)));
						echo " Ingrese el apellido: \n";
						$apell = strtoupper(trim(fgets(STDIN)));
                        echo " Ingrese el numero de licencia: ";
						$licencia = trim(fgets(STDIN));
						//Se setean los nuevos datos del pasajero
						$resp->setNombre($name);
                        $resp->setApellido($apell);
                        $resp->setNroLicencia($licencia);
						$modificacion = $resp->modificar();
						if ($modificacion) {
							echo "responsable modificado con éxito.\n";
						} else {
							echo "No se pudo modificar al responsable. Verificar\n";
						}
                    }

                break;
                case 9:
                    //9) Eliminar una empresa
                        echo "Ingrese la ID de la empresa que desea eliminar: ";
                        $empres  = new Empresa();
                        echo mostrar($empres->listar());
                        $id = trim(fgets(STDIN));                       //FUNCIONA
                        $resp = $empres->buscar($id);
                        if($resp){
                             $resp = $empres->eliminar($id);
                             if($resp){
                                 echo "La empresa se elimino correctamente! \n";
                            }else{
                                 echo "No se pudo eliminar la empresa \n";
                            }
                        }else{
                             echo "El ID de la empresa ingresado no existe!\n";
                        }
                    
                break;
                case 10:
                        //10) Eliminar un viaje
                        echo "Ingrese el ID del viaje que desea eliminar: ";      //FUNCIONA
                        $dni = trim(fgets(STDIN));
                        $viaje = new Viaje();
                        $resp = $viaje->buscar($dni);
                        if($resp){
                            $hayPasajero = $viaje->listarPasajeros();
                            if($hayPasajero == null){
                                $resp = $viaje->eliminar($dni);
                                if($resp){
                                    echo "El viaje se elimino correctamente!\n";
                                }
                            
                            }else{
                                if($viaje->getArrayObjPasajero() != []){     
                                    echo "Este viaje posee pasajeros- Serán eliminados del viaje";               
                                    foreach($viaje->getArrayObjPasajero() as $p){           
                                        $p->Eliminar();                                       
                                    }                                                         
                                }                                                             
                                $viaje->Eliminar(); 
                                echo "El viaje se elimino correctamente!\n";                                
                            }
                        }else{
                             echo "El id del viaje ingresado no existe! \n";
                        }

                break;
                case 11:
                    //11) Eliminar un pasajero
                    echo "Ingrese el DNI del pasajero que desea eliminar: ";     //FUNCIONA
                        $dni = trim(fgets(STDIN));
                        $objPasajero = new Pasajero();
                        $resp = $objPasajero->buscar($dni);
                        if($resp){
                             $resp = $objPasajero->eliminar($dni);
                             if($resp){
                                 echo "El pasajero se elimino correctamente!\n";
                            }else{
                                 echo "No se pudo elimiar el pasajero \n";
                            }
                        }else{
                             echo "El DNI del pasajero ingresado no existe!\n";
                        }
                break;
                case 12:
                    //12) Eliminar un responsable
                    echo "Ingrese el n° del responsable que desea eliminar: ";      //FUNCIONA
                        $number = trim(fgets(STDIN));
                        $responsable = new Responsable();
                        $resp = $responsable->buscar($number);
                        if($resp){
                             $resp = $responsable->eliminar($dni);
                             if($resp){
                                 echo "El responsablbe se elimino correctamente!\n";
                            }else{
                                 echo "No se pudo elimiar el responsablbe \n";
                            }
                        }else{
                             echo "El número de empleado ingresado no existe!\n";
                        }
                break;
                case 13:
                    //13) Listar empresas
                    $empresa = new Empresa;    //FUNCIONA
                    echo mostrar($empresa->listar());
                break;
                case 14:
                    //14) Listar los viajes     //FUNCIONA
                    $viaje = new Viaje;
                    echo mostrar($viaje->listar());
                break;
                case 15:
                    //15) Listar los pasajeros     //FUNCIONA
                    $pasaj = new Pasajero;
                    echo mostrar($pasaj->listar());
                break;
                case 16:
                    //16) Listar los responsables
                    $responsab = new Responsable;     //FUNCIONA
                    echo mostrar($responsab->listar());
                break;

                default:
                    // Salir  //
                    $out=false;
                break;
            }

        }while($out);




    //FUNCION PARA CREAR UNA EMPRESA

    function crearEmpresa(){
        
            echo "Ingrese los datos de la empresa \n";
            $empresa = new Empresa();
            echo "Ingrese el id de la empresa \n";
            $id = trim (fgets(STDIN));
            $resp = $empresa->buscar($id);
            if($resp){
                echo "ese ID ya existe ";              //LISTO Y FUNCIONA
                $result=false;
            }else{
                echo "Ingrese el nombre: \n";
            $name= strtoupper(trim (fgets(STDIN)));
            echo "Ingrese la direcciòn: \n";
            $direccion= strtoupper(trim (fgets(STDIN)));
            $empresa->cargar($id,$name,$direccion);
            $result = $empresa->insertar();
            if($result){
                echo "Se ha ingresado la empresa correctamente \n";
                $empresa->buscar(count($empresa->listar("")));
            }else{
                echo "No se ha ingresado la empresa correctamente \n";
            }
        }

    }
    


        //FUNCION PARA CREAR UN VIAJE
        function crearViaje(){
                echo "Ingrese los datos correspondientes al viaje \n";
                echo "Ingrese el codigo de viaje: \n";
                $codigo= trim (fgets(STDIN));
                $viaje = new Viaje();
                $resp = $viaje->buscar($codigo);
                if($resp){                                                      //FUNCIONA
                    echo "este viaje está ingresado en la base \n";
                }else{
                    echo "Ingrese el destino: \n";
                    $lugarDestino= strtoupper(trim (fgets(STDIN)));
                    echo "Ingrese la cantidad máxima de asientos: \n";
                    $maxAsientos = trim (fgets(STDIN));
                    echo "Ingrese el importe del viaje: \n";
                    $importe = trim (fgets(STDIN));
                    echo "Viaje de ida o ida y vuelta? \n";
                    $idavuelta = strtoupper(trim (fgets(STDIN)));
                    echo "Que tipo de asiento desea?? PRIMERA CLASE (PC) O TURISTA (T) \n";
                    $asiento = strtoupper(trim (fgets(STDIN)));
                    $empresa = new Empresa();
                    echo "Ingrese la ID de la empresa elegida: \n";
                    echo mostrar($empresa->listar());
                    $idEmpresa = trim (fgets(STDIN));
                    $resposnable = new Responsable();
                    echo "Ingrese el nro de empleado responsable elegido: \n";
                    echo mostrar($resposnable->listar());
                    $idEmpl = trim (fgets(STDIN));
                    $viaje->cargar($codigo,$lugarDestino,$maxAsientos,$idEmpresa,$idEmpl,$importe,$asiento,$idavuelta);
                    $validacion = viajeduplicado($viaje);

                    if($validacion){
                        $viaje->eliminar();
                        echo "Su viaje està duplicado \n";
                    }else{
                        $result = $viaje->insertar();
                        if($result){
                            echo "Su viaje ha ingresado en la base de datos \n";
                        }else{
                            echo "Su viaje no ha ingresado en la base de datos \n";
                            echo $viaje->getMensajeError();
                        }
                    }           
                }  
        } 
        


        //FUNCION PARA VER VIAJE REPETIDO devuelve true si es repetido




        function viajeduplicado($objViajeIngresado){
            $iage = new Viaje();
            $arrayViajes = $iage->listar("");
            $i = 0;
            $mismoViaje = false;
            $cantidad = count($arrayViajes);
            while(!$mismoViaje && $i < $cantidad){
                $viajecito = $arrayViajes[$i]->getVDestino();
                $viajeInspect = $objViajeIngresado->getVDestino();
                if($viajecito == $viajeInspect){
                    $mismoViaje = true;
                }else{
                    $i++;
                }
            }
            return $mismoViaje;
        }


        //FUNCION PARA CREAR UN PASAJERO


        function infoPasajero(){
                    echo "Ingrese los datos del pasajero \n";
                    echo "Ingrese DNI: \n";
                    $dni= trim (fgets(STDIN));
                    $people = new Pasajero();                       //FUNCIONA  
                    $resp = $people->buscar($dni);                 // NECESARIO CREAR ANTES
                    if($resp){                                      //VIAJE Y ANTES DE VIAJE
                        echo "ese pasajero ya esta cargado \n ";        //TENER RESPONSABLE Y EMPRESA
                    }else{    
                        echo "Ingrese apellido: \n";
                        $apellido= strtoupper(trim (fgets(STDIN)));
                        echo "Ingrese nombre: \n";
                        $nombre= strtoupper(trim (fgets(STDIN)));
                        echo "Ingrese telefono celular: \n";
                        $telefono= trim (fgets(STDIN));
                        $viaje = new Viaje();
                        echo "Ingrese la id del viaje que realizará: \n ";
                        echo mostrar($viaje->listar());
                        echo "Su elección: \n ";
                        $number = trim (fgets(STDIN));
                        $viaje->buscar($number);
                        /*
                        //para verificar si este pasasjero esta en el viaje ya
                        $esta = abordo($dni,$number);
                        if($esta){
                            $people->cargar($dni,$nombre,$apellido,$telefono,$number);       
                            $respuesta = $people->insertar();
                            if($respuesta){
                                echo "El pasajero ha sido insertado en la base de datos \n ";
                            }else{
                                echo "El pasajero NO ha sido insertado en la base de datos \n ";
                            }
                        }
                        */
                        $people->cargar($dni,$nombre,$apellido,$telefono,$viaje);       
                            $respuesta = $people->insertar();
                            if($respuesta){
                                $array = $viaje->getArrayObjPasajero();
                                array_push($array,$people);
                                echo "El pasajero ha sido insertado en la base de datos \n ";
                            }else{
                                echo "El pasajero NO ha sido insertado en la base de datos \n ";
                                echo $people->getmensajeoperacion();
                            }
                    }
                
        }



/*
        //FUNCION PARA BUSCAR SI EL PASAJERO YA ESTA EN EL VIAJE. si devuelve false es que esta
        //si devuelve true es que no

        function abordo($dni,$idViaje){
            $viagen = new Viaje();
            $arrayPasajero = $viagen->getObjArrayPasajeros();
            $i=0;
            $esta = true;
            $count = count($arrayPasajero);
            while($i<$count && $esta){
                $pasajer = $arrayPasajero[$i];
                $codigo = $pasajer->getIdviaje();
                $id = $pasajer->getDni();             //NO SE USO LA FUNCION PORQUE EN EL MOMENTO
                if($id == $dni){                      //DE CREAR EL VIAJE NO SE PIDEN LOS PASAJEROS
                    if($codigo == $idViaje){          //CUANDO SE CREAN LOS PASJEROS SE DA ELECCION AL VIAJE
                        $esta = false;                //PERO EL CODIGO PARA PEDIR SI TIENE ESE VIAJE CON ESE PASAJERO 
                    }else{                            //SERIA ESTA Y LA IMPLEMENTARIA AL CREAR EL VIAJE SI CREARA AL MISMO 
                        $esta =true;                  //CON PASAJEROS, LO CUAL NO ES LO QUE DECIDI IMPLEMENTAR
                    }                                 //EN LA VIDA REAL SE CREA EL VIAJE Y SE VA COMPLETANDO
                }else{
                    $esta =true;
                }
                $i++;


            }
            return $esta;
        }
*/

        //FUNCION PARA CREAR UN RESPONSABLE
        function infoResponsable(){
    

                echo "Ingrese ID del empleado: \n";
                $id= trim (fgets(STDIN));
                $responsable = new Responsable(); 
                $resp = $responsable->buscar($id);                 
                if($resp){                                               //LISTO Y FUNCIONA
                    echo "ese resposable ya esta cargado \n ";
                }else{    
                    echo "Ingrese apellido: \n";
                    $apellido= strtoupper(trim (fgets(STDIN)));
                    echo "Ingrese nombre: \n";
                    $nombre= strtoupper(trim (fgets(STDIN)));
                    echo "Ingrese numero de licencia: \n";
                    $licencia= trim (fgets(STDIN));
                    $responsable->cargar($id,$licencia,$nombre,$apellido);          
                    $respuesta = $responsable->insertar();
                    if($respuesta){
                        echo "El responsable ha sido insertado en la base de datos \n ";
                    }else{
                        echo "El responsable NO ha sido insertado en la base de datos \n ";
                    }
                }
        }

        

        //FUNCION PARA MOSTRAR ARRAYS
        function mostrar($colex){
            $str = "";
            foreach($colex as $obj){
                $str .= $obj."\n";
            }
            return $str;
        }

        


        