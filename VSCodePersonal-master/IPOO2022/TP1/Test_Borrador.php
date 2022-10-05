<?php
    include "ViajeCelesteAliaga.php";

	function menuDeOpciones() {
		$menu = "\n---------------Menú de opciones---------------".
		"\n| Opción 1: Agregar pasajeros".
		"\n| Opción 2: Modificar pasajeros".
		"\n| Opción 3: Eliminar pasajeros".
		"\n| Opción 4: Modificar datos del viaje".
		"\n| Opción 5: Ver datos del viaje".
		"\n| Opción 6: Ver datos del pasajero".
		"\n| Opción 7: Salir del programa\n";
		return $menu;
	}

	echo ">>> Por favor, ingrese los datos del viaje <<<\n";
	echo "| Ingrese el código de viaje: ";
	$codViaje = trim(fgets(STDIN));
	echo "| Ingrese el destino: ";
	$destino = trim(fgets(STDIN));
	echo "| Ingrese la capacidad máxima de pasajeros: ";
	$capacidadMaxima = trim(fgets(STDIN));
	$arrayPasajeros = [];

	$objViaje = new Viaje($codViaje, $destino, $capacidadMaxima, $arrayPasajeros);
	do {
		$menu = menuDeOpciones();
		echo $menu;
		$opcion = trim(fgets(STDIN));
		switch ($opcion) {
			case 1:
				echo  "\n--------- Cargar pasajero ---------\n" ;
				echo  "| ¿Cuántos pasajeros desea ingresar?: ";
				$limitePasajeros = trim(fgets(STDIN));
				for ($i=0; $i<$limitePasajeros; $i++) {
					echo "\n	+ Ingrese el nombre del pasajero: ";
					$arregloPasajeros[$i]["nombre"] = trim(fgets(STDIN));
					echo "	+ Ingrese el apellido del pasajero: ";
					$arregloPasajeros[$i]["apellido"] = trim(fgets(STDIN));
					echo "	+ Ingrese el número de documento del pasajero: ";
					$arregloPasajeros[$i]["dni"] = trim(fgets(STDIN));
				}
				if ($i == 0) {
					echo "\n>>> No ingresó ningún pasajero.\n";
				} else {
					$objViaje->agregarPasajeros($arregloPasajeros);
					echo "\n>>> Se ingresó/ingresaron ".$i." pasajero/s con éxito.\n";
				}
				break;
			case 2:
				echo "----- Modificar pasajero -----\n";
				echo "| Ingrese el número del pasajero a modificar: ";
				$indPasajero = trim(fgets(STDIN));
				echo "\n	+ Ingrese el nuevo nombre del pasajero: ";
				$nuevoNombre = trim(fgets(STDIN));
				echo "	+ Ingrese el nuevo apellido del pasajero: ";
				$nuevoApellido = trim(fgets(STDIN));
				echo "	+ Ingrese el nuevo número de documento del pasajero: ";
				$nuevoDni = trim(fgets(STDIN));
				$objViaje->modificarPasajeros($indPasajero, $nuevoNombre, $nuevoApellido, $nuevoDni);
				echo "\n>>> Pasajero modificado exitosamente.\n";
				break;
			case 3:
				echo "----- Eliminar pasajero -----\n" ;
				echo "| Ingrese el número del pasajero que desea eliminar: ";
				$eliminarPasajero = trim(fgets(STDIN));
				$objViaje->eliminarPasajeros($eliminarPasajero);
				echo "\n>>> Pasajero eliminado exitosamente.\n";
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
				$resultado = ($modificacion?"Se modificaron los datos exitosamente. ":"Los datos no se puedieron modificar.");
				echo "\n    >>> ".$resultado."\n";
				break;
			case 5:
				echo "----- Ver datos del viaje -----";
				$cadena = $objViaje->__toString();
				echo $cadena."\n";
				break;
			case 6:
				echo "----- Mostrar pasajero -----\n" ;
				echo "| Ingrese el número del pasajero que desea ver: ";
				$verPasajero = trim(fgets(STDIN));
				$datos = $objViaje->mostrarPasajeros($verPasajero);
				echo $datos;
				break;
			case 7:
				echo "\n>>> Ha salido del programa.";
				break;
			}
	} while($opcion != 7);
?>