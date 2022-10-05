<?php
    /**
     * Se registra la siguiente información:
     * denominación, dirección y la colección empresas registradas en la terminal.
     */
    class Terminal {
        private $denominacion;
        private $direccion;
        private $arrayEmpresas;

        //Métodos de acceso:
        public function getDenominacion() {
            return $this->denominacion;
        }
        public function getDireccion() {
            return $this->direccion;
        }
        public function getArrayEmpresas() {
            return $this->arrayEmpresas;
        }

        public function setVariable($denominacion) {
            $this->denominacion = $denominacion;
        }
        public function setDireccion($direccion) {
            $this->direccion = $direccion;
        }
        public function setArrayEmpresas($arrayEmpresas) {
            $this->arrayEmpresas = $arrayEmpresas;
        }

        //Métodos varios:
        public function __construct($denominacion, $direccion, $arrayEmpresas) {
            $this->denominacion = $denominacion;
            $this->direccion = $direccion;
            $this->arrayEmpresas = $arrayEmpresas;
        }

        //Punto 5.
        /**
         * Método 1: darViajeMenorValor - 
         * Retorna una colección con todos los viajes de menor valor de cada empresa.
         */
        public function darViajeMenorValor() {
            $arrayEmpresas = $this->getArrayEmpresas();
            $viajesBaratos = ["Empresa" => null, "Viaje" => null];
            $mayorValorViaje = 0;
            for ($i=0; $i<count($arrayEmpresas); $i++) {
                $unaEmpresa = $arrayEmpresas[$i];
                $arrayViajes = $unaEmpresa->getArrayViajes();
                foreach ($arrayViajes as $unViaje) {
                    $importeViaje = $unViaje->getImporte();
                    if ($importeViaje > $mayorValorViaje) {
                        $mayorValorViaje = $importeViaje;
                        $viajesBaratos = ["Empresa" => $unaEmpresa, "Viaje" => $unViaje];
                    }
                }
            }
            return $viajesBaratos;
        }

        /**
         * Método 2: mostrarDatosArreglos - 
         * Retorna una cadena de strings de un arreglo recibido por parámetro.
         * @return string
         */
        public function mostrarDatosArreglos($arregloViajes) {
            $cadena = "";
            for ($i=0; $i<count($arregloViajes); $i++) {
                $nombreEmpresa = $arregloViajes["Empresa"]->getNombre();
                $objViaje = $arregloViajes["Viaje"];
                $cadena .= "| Empresa: ".$nombreEmpresa."\n"
                    ."| Viajes: \n".$objViaje."\n<<---------------------------->>\n";
            }
            return $cadena;
        }

        public function mostrarEmpresas() {
            $cadena = "";
            $arrayEmpresas = $this->getArrayEmpresas();
            foreach ($arrayEmpresas as $unaEmpresa) {
                $cadena .= "\nID: ".$unaEmpresa->getId()."\nNombre: ".$unaEmpresa->getNombre();
            }
            return $cadena;
        }

        public function __toString() {
            $cadena = ">> Denominación: ".$this->getDenominacion()."\n".
                    ">> Dirección: ".$this->getDireccion()."\n".
                    ">> Empresas Registradas: ".$this->mostrarEmpresas();
            return $cadena;
        }
    }
?>