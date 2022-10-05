<?php
    //número de empleado, número de licencia, nombre y apellido
    class ResponsableV {
        private $nombre;
        private $apellido;
        private $nroEmpleado;
        private $nroLicencia;

        //Métodos de acceso
        public function getNombre() {
            return $this->nombre;
        }
        public function getApellido() {
            return $this->apellido;
        }
        public function getNroEmpleado() {
            return $this->nroEmpleado;
        }
        public function getNroLicencia() {
            return $this->nroLicencia;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function setApellido($apellido) {
            $this->apellido = $apellido;
        }
        public function setNroEmpleado($nroEmpleado) {
            $this->nroEmpleado = $nroEmpleado;
        }
        public function setNroLicencia($nroLicencia) {
            $this->nroLicencia = $nroLicencia;
        }

        //Métodos varios
        public function __construct($nombre, $apellido, $nroEmpleado, $nroLicencia) {
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->nroEmpleado = $nroEmpleado;
            $this->nroLicencia = $nroLicencia;
        }

        public function __toString() {
            $cadena = "+ Nombre: ".$this->getNombre()."\n".
                    "+ Apellido: ".$this->getApellido()."\n".
                    "+ N° de empleado: ".$this->getNroEmpleado()."\n".
                    "+ N° de licencia: ".$this->getNroLicencia()."\n";
            return $cadena;
        }
    }
?>