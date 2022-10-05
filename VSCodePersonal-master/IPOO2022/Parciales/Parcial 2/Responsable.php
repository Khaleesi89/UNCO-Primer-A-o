<?php
    class Responsable {
        private $nombre;
        private $apellido;
        private $dni;
        private $direccion;
        private $mail;
        private $telefono;

        //Métodos de acceso:
        public function getNombre() {
            return $this->nombre;
        }
        public function getApellido() {
            return $this->apellido;
        }
        public function getDni() {
            return $this->dni;
        }
        public function getDireccion() {
            return $this->direccion;
        }
        public function getMail() {
            return $this->mail;
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
        public function setDireccion($direccion) {
            $this->direccion = $direccion;
        }
        public function setMail($mail) {
            $this->mail = $mail;
        }
        public function setTelefono($telefono) {
            $this->telefono = $telefono;
        }

        //Métodos varios
        public function __construct($nombre, $apellido, $dni, $direccion, $mail, $telefono) {
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->dni = $dni;
            $this->direccion = $direccion;
            $this->mail = $mail;
            $this->telefono = $telefono;
        }

        public function __toString() {
            $cadena =
                    "       |+ Nombre: ".$this->getNombre()."\n".
                    "       |+ Apellido: ".$this->getApellido()."\n".
                    "       |+ DNI: ".$this->getDni()."\n".
                    "       |+ Dirección: ".$this->getDireccion()."\n".
                    "       |+ Correo: ".$this->getMail()."\n".
                    "       |+ Teléfono: ".$this->getTelefono()."\n";
            return $cadena;
        }
    }
?>