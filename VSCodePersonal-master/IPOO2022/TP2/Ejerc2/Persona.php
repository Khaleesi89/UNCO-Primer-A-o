<?php
    class Persona {
        private $nombre;
        private $apellido;
        private $tipoDocumento;
        private $dni;

        //Métodos de acceso
        public function getNombre() {
            return $this->nombre;
        }
        public function getApellido() {
            return $this->apellido;
        }
        public function getTipoDocumento() {
            return $this->tipoDocumento;
        }
        public function getDni() {
            return $this->dni;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function setApellido($apellido) {
            $this->apellido = $apellido;
        }
        public function setTipoDocumento($tipoDocumento) {
            $this->tipoDocumento = $tipoDocumento;
        }
        public function setDni($dni) {
            $this->dni = $dni;
        }

        //Métodos varios
        public function __construct($nombre, $apellido, $tipoDocumento, $dni) {
            $this->nombre = $nombre;
            $this->apellido = $apellido ;
            $this->tipoDocumento = $tipoDocumento ;
            $this->dni = $dni;
        }

        public function __toString() {
            $cadena = "+ Nombre: ".$this->getApellido()."\n".
                    "+ Apellido: ".$this->getNombre()."\n".
                    "+ Tipo de Documento: ".$this->getTipoDocumento()."\n".
                    "+ DNI: ".$this->getDni()."\n";
            return $cadena;
        }
    }
?>