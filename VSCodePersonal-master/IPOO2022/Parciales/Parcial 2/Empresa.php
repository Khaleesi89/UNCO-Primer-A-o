<?php
    //identificación, nombre y la colección de Viajes que realiza
    class Empresa {
        private $id;
        private $nombre;
        private $arrayViajes;

        //Métodos de acceso:
        public function getId() {
            return $this->id;
        }
        public function getNombre() {
            return $this->nombre;
        }
        public function getArrayViajes() {
            return $this->arrayViajes;
        }

        public function setId($id) {
            $this->id = $id;
        }
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function setArrayViajes($arrayViajes) {
            $this->arrayViajes = $arrayViajes;
        }

        //Métodos varios:
        public function __construct($id, $nombre, $arrayViajes) {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->arrayViajes = $arrayViajes;
        }

        //Punto 5.
        public function encontrarViaje($codViaje) {
            $arrayViajes = $this->getArrayViajes();
            $indMaximo = count($arrayViajes);
            //Valido que el código de viaje ingresado esté en el viaje:
            $viajeEncontrado = null;
            $i = 0;
            if ($indMaximo > 0) {
                do {
                    $codigoViaje = $arrayViajes[$i]->getNumero();
                    if ($codigoViaje == $codViaje) {
                        $viajeEncontrado = $arrayViajes[$i];
                    }
                    $i++;
                } while($viajeEncontrado == null && $i<$indMaximo);
            }
            return $viajeEncontrado;
        }

        //Punto 6.
        /**
         * Método 2: darCostoViaje - 
         * Dado un código de viaje retorna el importe correspondiente a ese viaje.
         */
        public function darCostoViaje($codViaje) {
            $encontrarViaje = $this->encontrarViaje($codViaje);
            if ($encontrarViaje != null) {
                $importe = $encontrarViaje->calcularImporteViaje();
                $importeViaje = $encontrarViaje->setImporte($importe);
            } else {
                $importeViaje = 0;
            }
            return $importeViaje;
        }

        /**
         * Método 3: mostrarViajes - 
         * Recorre el arreglo de préstamos y los retorna en pantalla
         * @return string
         */
        public function mostrarViajes() {
            $cadena = "";
            $arrayViajes = $this->getArrayViajes();
            foreach ($arrayViajes as $unViaje) {
                $cadena .= $unViaje;
            }
            return $cadena;
        }

        public function __toString() {
            $cadena = "| ID: ".$this->getId()."\n".
                    "| Nombre: ".$this->getNombre()."\n".
                    "| Viajes: \n".$this->mostrarViajes();
            return $cadena;
        }
    }
?>