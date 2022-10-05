<?php
    /**
     * Se registra la siguiente información:
     * identificación, nombre y la colección de Viajes que realiza.
     */
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

        /**
         * Método 1: darViajeADestino - 
         * Dado un destino y una cant. de asientos, retorna un arreglo con todos
         * los viajes disponibles a ese destino.
         * @return array
         */
        public function darViajeADestino($elDestino, $cantAsientosViaje) {
            $arrayViajes = $this->getArrayViajes();
            $i = 0;
            foreach ($arrayViajes as $unViaje) {
                if ($unViaje->getCantAsientosDisponibles() > $cantAsientosViaje && $unViaje->getDestino() == $elDestino) {
                    $viajesDisponibles[$i] = $unViaje;
                    $i++;
                }
            }
            return $viajesDisponibles;
        }

        /**
         * Método 2: validarViaje - 
         * Valida el número de documento ingresado por parámetro.
         * Retorna TRUE si se encuentra dentro del arreglo de pasajeros.
         * @return boolean
         */
        public function validarViaje($nuevoViaje) {
            $arrayViajes = $this->getArrayViajes();
            $indMaximo = count($arrayViajes);
            //Valido que el viaje ingresado esté en el viaje:
            $viajeRepetido = false;
            $i = 0;
            if ($indMaximo > 0) {
                do {
                    $destinoViaje = $arrayViajes[$i]->getDestino();
                    $fechaViaje = $arrayViajes[$i]->getFecha();
                    $horarioPartida = $arrayViajes[$i]->getHoraPartida();
                    if ($destinoViaje == $nuevoViaje->getDestino() && $fechaViaje == $nuevoViaje->getFecha() && $horarioPartida == $nuevoViaje->getHoraPartida()) {
                        $viajeRepetido = true;
                    }
                    $i++;
                } while($viajeRepetido == false && $i<$indMaximo);
            }
            if ($viajeRepetido == true) {
                $validacion = true;
            } else {
                $validacion = false;
            }
            return $validacion;
        }

        /**
         * Método 3: incorporarViaje - 
         * Retorna TRUE si se incorpora un viaje que no se encuentre dentro de la colección de viajes.
         * @return boolean
         */
        public function incorporarViaje($nuevoViaje) {
            $arrayViajes = $this->getArrayViajes();
            //Valido que el viaje ingresado no esté en el arreglo inicialmente:
            $validarViaje = $this->validarViaje($nuevoViaje);
            //Dependiendo de la comparación, se agregan o no viajes:
            if ($validarViaje == false) {
                $cantViajes = count($arrayViajes);
                if ($cantViajes == 0) {
                    $arrayViajes[0] = $nuevoViaje;
                } else {
                    $arrayViajes[$cantViajes] = $nuevoViaje;
                }
                $this->setArrayViajes($arrayViajes);
                $validacion = true;
            } else {
                $validacion = false;
            }
            return $validacion;
        }

        /**
         * Método 4: venderViajeADestino - 
         * Recibe una cant. de asientos y el destino. Registra la asignación del viaje
         * al invocar al método "asignarAsientosDisponibles".
         * Retorna la instancia del viaje asignado, NULL caso contrario.
         */
        public function venderViajeADestino($cantAsientos, $destino) {
            $arrayViajesDisponibles = $this->darViajeADestino($destino, $cantAsientos);
            $busqueda = true;
            $ventaViaje = null;
            $i = 0;
            while ($busqueda && $i < count($arrayViajesDisponibles)) {
                if (strtolower($arrayViajesDisponibles[$i]->getDestino()) == strtolower($destino)) {
                    $busqueda = false;
                    $ventaViaje = $arrayViajesDisponibles[$i];
                } else {
                    $i++;
                }
            }
            if ($ventaViaje != null) {
                $ventaViaje->asignarAsientosDisponibles($cantAsientos);
            }
            return $ventaViaje;
        }

        /**
         * Método 5: montoRecaudado - 
         * Retorna el monto recaudado por la empresa (asientos vendidos + importe del viaje)
         * @return float
         */
        public function montoRecaudado() {
            $arrayViajes = $this->getArrayViajes();
            $montoEmpresa = 0;
            foreach ($arrayViajes as $unViaje) {
                $cantAsientosVendidos = $unViaje->getCantAsientos() - $unViaje->getCantAsientosLibres();
                $importeViaje = $unViaje->getImporte();
                $montoEmpresa = $montoEmpresa + ($cantAsientosVendidos * $importeViaje);
            }
            return $montoEmpresa;
        }

        /**
         * Método 6: mostrarViajes - 
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