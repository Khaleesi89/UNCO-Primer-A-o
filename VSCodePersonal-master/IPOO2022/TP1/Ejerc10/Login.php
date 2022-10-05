<?php
	class Login {
		private $nombreUsuario;
		private $contraseña;
		private $frase;
		private $pos = 1;
		
		//Métodos de acceso
		public function getnombreUsuario() {
			return $this->nombreUsuario;
		}
		public function getContraseña() {
			return $this->contraseña;
		}
		public function getFrase() {
			return $this->frase;
		}
		public function getPos() {
			return $this->pos;
		}

		public function setNombreUsuario($nombreUsuario) {
			return $this->nombreUsuario = $nombreUsuario;
		}
		public function setContraseña($contraseña) {
			return $this->contraseña = $contraseña;
		}
		public function setFrase($frase) {
			return $this->frase = $frase;
		}

		public function setPos($i) {
			if ($i > 3) {
				return $this->pos = 0;
			} else {
				return $this->pos = $i;
			}
			return $this->pos = $i;
		}
		
		//Métodos
		public function __construct($nombre, $clave, $frase) {
			$this->nombreUsuario = $nombre;
			$this->contraseña = $clave;
			$this->frase = $frase;
		}

		public function Validar($pass) {
			$stop = true;
			while ($stop == true) {
				if ($this->contraseña != $pass) {
					echo "	+ ERROR. Contraseña inválida, intentelo nuevamente.";
					$pass = trim(fgets(STDIN));
				} else {
					$stop = false;
				}
			}
		}

		public function contraseñasUsadas($clave) {
			$sale = false;
			for ($i=0; $i<count($this->clavesUsadas); $i++) {
				if ($this->clavesUsadas[$i] == $clave) {
					$sale = true;
				} else {
					$sale;
				}
			}
			return $sale;
		}

		public function cambiarContraseña($claveNueva, $clavesUsadas) {
			$entra = true;
			while ($entra == true) {	
				if ($this->contraseñasUsadas($claveNueva, $clavesUsadas) == true) {
					echo "	+ ERROR (Clave en uso). Ingrese otra contraseña: ";
					$claveNueva = trim(fgets(STDIN));
					$this->setContraseña($this->getContraseña($claveNueva));
				} else {
					$this->contraseñasUsadas($claveNueva, $clavesUsadas)[$this->getPos()] = $this->contraseña;
					$this->setPos($this->pos + 1);
					$this->setContraseña($claveNueva);
					$entra = false;
				}
			}
		}
	}
?>