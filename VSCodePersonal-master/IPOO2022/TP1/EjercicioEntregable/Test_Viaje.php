<?php
    include "Viaje.php";
	include "ResponsableV.php";
	include "Pasajero.php";

	function menuDeOpciones() {
		$menu = "\n---------------Menú de opciones---------------".
		"\n| Opción 1: Agregar pasajeros".
		"\n| Opción 2: Modificar pasajeros".
		"\n| Opción 3: Eliminar pasajeros".
		"\n| Opción 4: Modificar datos del viaje".
		"\n| Opción 5: Modificar datos del responsable".
		"\n| Opción 6: Ver datos del viaje".
		"\n| Opción 7: Ver datos del pasajero".
		"\n| Opción 8: Salir del programa\n";
		return $menu;
	}

	//Se piden los datos del viaje inicial:
	echo ">>> Por favor, ingrese los datos del viaje <<<\n";
	echo "| Ingrese el código de viaje: ";
	$codViaje = trim(fgets(STDIN));
	echo "| Ingrese el destino: ";
	$destino = trim(fgets(STDIN));
	echo "| Ingrese la capacidad máxima de pasajeros: ";
	$capacidadMaxima = trim(fgets(STDIN));
	//Se piden los datos del responsable del viaje:
	echo ">>> Ingrese Los datos del responsable del viaje <<\n";
	echo "| Ingrese el nombre: ";
	$nombreResponsable = trim(fgets(STDIN));
	echo "| Ingrese el apellido: ";
	$apellidoResponsable = trim(fgets(STDIN));
	echo "| Ingrese el N° de empleado: ";
	$nroEmpleado = trim(fgets(STDIN));
	echo "| Ingrese el N° de licencia: ";
	$nroLicencia = trim(fgets(STDIN));

	//Se crean los objetos:
	$objResponsable = new ResponsableV($nombreResponsable, $apellidoResponsable, $nroEmpleado, $nroLicencia);
	$objViaje = new Viaje($codViaje, $destino, $capacidadMaxima, $objResponsable);
	echo $objViaje;

	//Se inicializa el menú de opciones:
	do {
		$menu = menuDeOpciones();
		echo $menu;
		$opcion = trim(fgets(STDIN));
		switch ($opcion) {
			case 1:
				echo  "\n--------- Cargar pasajero ---------\n" ;
				echo  "| Ingrese los datos de un pasajero: ";
				echo "\n	+ Ingrese el nombre del pasajero: ";
				$nombre = trim(fgets(STDIN));
				echo "	+ Ingrese el apellido del pasajero: ";
				$apellido = trim(fgets(STDIN));
				echo "	+ Ingrese el número de documento del pasajero: ";
				$dni = trim(fgets(STDIN));
				echo "	+ Ingrese el número de teléfono del pasajero: ";
				$telefono = trim(fgets(STDIN));
				$objPasajero = new Pasajero($nombre, $apellido, $dni, $telefono);
				$agregarPasajero = $objViaje->agregarPasajeros($objPasajero);
				if ($agregarPasajero == true) {
					echo "\n>>> Se agregó el pasajero con éxito.\n";
				} else {
					echo "\n>>> ERROR. El pasajero ya se encuentra en el viaje.\n";
				}
				break;
			case 2:
				echo "----- Modificar pasajero -----\n";
				echo "| Ingrese el número de documento del pasajero a modificar: ";
				$dniPasajero = trim(fgets(STDIN));
				$validacion = $objViaje->validarDocumento($dniPasajero);
				if ($validacion == true) {
					echo "\n	+ Ingrese el nuevo nombre del pasajero: ";
					$nuevoNombre = trim(fgets(STDIN));
					echo "	+ Ingrese el nuevo apellido del pasajero: ";
					$nuevoApellido = trim(fgets(STDIN));
					echo "	+ Ingrese el nuevo número de telefono del pasajero: ";
					$nuevoTelefono = trim(fgets(STDIN));
					$modificacion = $objViaje->modificarPasajeros($dniPasajero, $nuevoNombre, $nuevoApellido, $nuevoTelefono);
					echo "\n>>> Pasajero modificado exitosamente.\n";
				} else {
					echo "\n>>> ERROR. El documento ingresado no se corresponde con ningún pasajero.\n";
				}
				break;
			case 3:
				echo "----- Eliminar pasajero -----\n" ;
				echo "| Ingrese el número de documento del pasajero que desea eliminar: ";
				$documentoPasajero = trim(fgets(STDIN));
				$eliminar = $objViaje->eliminarPasajeros($documentoPasajero);
				if ($eliminar == false) {
					echo "\n>>> ERROR. El documento ingresado no se corresponde con ningún pasajero.\n";
				} else {
					echo "\n>>> Pasajero eliminado exitosamente.\n";
				}
				break;
			case 4:
				echo "----- Modificar viaje -----\n";
				echo "  + Ingrese el nuevo código del viaje: ";
				$nuevoCodigo = trim(fgets(STDIN));
				echo "  + Ingrese el nuevo destino del viaje: ";
				$nuevoDestino = trim(fgets(STDIN));
				echo "  + Ingrese la nueva capacidad máxima de pasajeros del viaje: ";
				$nuevaCapacidad = trim(fgets(STDIN));
				$modificacion = $objViaje->modificarDatosViaje($nuevoCodigo, $nuevoDestino, $nuevaCapacidad);
				//Se muestra un msj según el resultado de las modificaciones:
				$resultado = ($modificacion?"Se modificaron los datos exitosamente. ":"Los datos no se pudieron modificar.");
				echo "\n    >>> ".$resultado."\n";
				break;
			case 5:
				echo "----- Modificar responsable -----\n";
				echo "  + Ingrese el nuevo nombre del responsable: ";
				$nuevoNombre = trim(fgets(STDIN));
				echo "  + Ingrese el nuevo apellido del responsable: ";
				$nuevoApellido = trim(fgets(STDIN));
				echo "  + Ingrese el nuevo N° de empleado: ";
				$nroEmpleado = trim(fgets(STDIN));
				echo "  + Ingrese el nuevo N° de licencia: ";
				$nroLicencia = trim(fgets(STDIN));
				$modificacion = $objViaje->modificarDatosResponsable($nuevoNombre, $nuevoApellido, $nroEmpleado, $nroLicencia);
				//Se muestra un msj según el resultado de las modificaciones:
				$resultado = ($modificacion?"Se modificaron los datos exitosamente. ":"Los datos no se pudieron modificar.");
				echo "\n    >>> ".$resultado."\n";
				break;
			case 6:
				echo "----- Ver datos del viaje -----\n";
				$cadena = $objViaje->__toString();
				echo $cadena;
				break;
			case 7:
				echo "----- Mostrar pasajero -----\n" ;
				echo "| Ingrese el número de documento del pasajero que desea ver: ";
				$documentoPasajero = trim(fgets(STDIN));
				$validacion = $objViaje->validarDocumento($documentoPasajero);
				if ($validacion == false) {
					echo "\n>>> ERROR. El documento ingresado no se corresponde con ningún pasajero.\n";
				} else {
					$datosPasajero = $objViaje->mostrarPasajeros($documentoPasajero);
					echo $datosPasajero;
				}
				break;
			case 8:
				echo ">>> Ha salido del programa.";
				break;
			}
	} while($opcion != 8);
?>