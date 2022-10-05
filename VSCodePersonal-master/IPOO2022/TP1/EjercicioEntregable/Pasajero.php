<?php
    //nombre, apellido, numero de documento y teléfono
    class Pasajero {
        private $nombre;
        private $apellido;
        private $dni;
        private $telefono;

        //Métodos de acceso
        public function getNombre() {
            return $this->nombre;
        }
        public function getApellido() {
            return $this->apellido;
        }
        public function getDni() {
            return $this->dni;
        }
        public function getTelefono() {
            return $this->telefono;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function setApellido($apellido) {
            $this->apellido = $apellido;
        }
        public function setDni($dni) {
            $this->dni = $dni;
        }
        public function setTelefono($telefono) {
            $this->telefono = $telefono;
        }

        //Métodos varios
        public function __construct($nombre, $apellido, $dni, $telefono) {
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->dni = $dni;
            $this->telefono = $telefono;
        }

        public function __toString() {
            $cadena = "+ Nombre: ".$this->getNombre()."\n".
                    "+ Apellido: ".$this->getApellido()."\n".
                    "+ DNI: ".$this->getDni()."\n".
                    "+ Teléfono: ".$this->getTelefono()."\n";
            return $cadena;
        }
    }
?>