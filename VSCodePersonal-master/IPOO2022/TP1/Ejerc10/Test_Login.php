<?php
//Funciona.
	include 'Login.php';
	function main() {
		$objLogin = new Login(0, 0, 0);
		$opcion = 1;
		while ($opcion != 0) {
			$opcion = menudeopciones();
			if ($opcion == 1) {
				$objLogin->setPos(1);
				echo "\n***********************************\n";
				echo "| Ingrese el nombre de usuario: ";
				$nombreU = trim(fgets(STDIN));
				$objLogin->setNombreUsuario($nombreU);
				echo "| Ingrese su contraseña: ";
				$contraseña = trim(fgets(STDIN));
				$objLogin->setContraseña($contraseña);
				echo "| Ingrese una frase que le permita recordarla: ";
				$frase = trim(fgets(STDIN));
				$objLogin->setFrase($frase);
			} elseif ($opcion == 2) {
				$objLogin->setPos(2);
				echo "\n***********************************\n";
				echo "| Ingrese su contraseña: ";
				$pass = trim(fgets(STDIN));
				$objLogin->Validar($pass);
				echo "Contraseña validada.";
			} elseif ($opcion == 3) {
				$objLogin->setPos(3);
				echo "\n***********************************\n";
				echo "|Ingrese una nueva contraseña: ";
				$claveNueva = trim(fgets(STDIN));
				$objLogin->cambiarContraseña($claveNueva, $objLogin);
			} elseif ($opcion == 4) {
				$objLogin->setPos(4);
				echo "\n***********************************\n";
				echo "\n".$objLogin->getContraseña();
				echo "\n".$objLogin->getNombreUsuario();
				echo "\n".$objLogin->getFrase();
			} else {
				if ($opcion != 0) {
					echo "\nERROR. Opción incorrecta.";
				}
			}
		}
	}

	function menudeopciones() {
		echo "\n---------------Menú de opciones---------------";
		echo "\n| Opción 1: Ingresar datos";
		echo "\n| Opción 2: Validar contraseña";
		echo "\n| Opción 3: Cambiar contraseña";
		echo "\n| Precione 0 para finalizar.\n";
		$opcion = trim(fgets(STDIN))."\n";
		return $opcion;
	} main();
?>