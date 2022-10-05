<?php
    /**
     * Nota: Recuerden que deben enviar el link a la resolución en su repositorio en GitHub.
     * 1) Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos:
     *  a. ATRIBUTOS: nombre, apellido, numero de documento y teléfono.
     *  b. El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero.
     * 2) También se desea guardar la información de la persona responsable de realizar el viaje:
     *  a. Cree una clase ResponsableV que registre el número de empleado, número de licencia, nombre y apellido.
     *  b. La clase Viaje debe hacer referencia al responsable de realizar el viaje. 
     * 3) Volver a implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero.
     * 4) Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos.
     *  a. Se debe verificar que el pasajero no este cargado mas de una vez en el viaje.
     *  b. De la misma forma cargue la información del responsable del viaje.
     */
    class Viaje {
        private $codigoViaje;
        private $destino;
        private $capacidadPasajeros;
        private $objArrayPasajeros;
        private $objResponsable;

        //Métodos de acceso
        public function getCodigoViaje() {
            return $this->codigoViaje;
        }
        public function getDestino() {
            return $this->destino;
        }
        public function getCapacidadPasajeros() {
            return $this->capacidadPasajeros;
        }
        public function getObjArrayPasajeros() {
            return $this->objArrayPasajeros;
        }
        public function getObjResponsable() {
            return $this->objResponsable;
        }

        public function setCodigoViaje($codigoViaje) {
            $this->codigoViaje = $codigoViaje;
        }
        public function setDestino($destino) {
            $this->destino = $destino;
        }
        public function setCapacidadPasajeros($capacidadPasajeros) {
            $this->capacidadPasajeros = $capacidadPasajeros;
        }
        public function setObjArrayPasajeros($objArrayPasajeros) {
            $this->objArrayPasajeros = $objArrayPasajeros;
        }
        public function setObjResponsable($objResponsable) {
            $this->objResponsable = $objResponsable;
        }
        
        //Métodos
        public function __construct($codigoViaje, $destino, $capacidadPasajeros, $objResponsable) {
            $this->codigoViaje = $codigoViaje;
            $this->destino = $destino;
            $this->capacidadPasajeros = $capacidadPasajeros;
            $this->objArrayPasajeros = [];
            $this->objResponsable = $objResponsable;
        }

        /**
         * Método 1: validarDocumento - 
         * Valida el número de documento ingresado por parámetro.
         * Retorna TRUE si se encuentra dentro del arreglo de pasajeros.
         * @return boolean
         */
        public function validarDocumento($documentoPasajero) {
            $arrayPasajeros = $this->getObjArrayPasajeros();
            $indMaximo = count($arrayPasajeros);
            //Valido que el documento ingresado esté en el viaje:
            $dniRepetido = false;
            $i = 0;
            if ($indMaximo > 0) {
                do {
                    $dniPasajero = $arrayPasajeros[$i]->getDni();
                    if ($dniPasajero == $documentoPasajero) {
                        $dniRepetido = true;
                    }
                    $i++;
                } while($dniRepetido == false && $i<$indMaximo);
            }
            if ($dniRepetido == true) {
                $validacion = true;
            } else {
                $validacion = false;
            }
            return $validacion;
        }

        /**
         * Método 2: encontrarDocumento - 
         * Retorna la posición en la que se encuentra un documento validado.
         * @return int
         */
        public function encontrarDocumento($documentoPasajero) {
            $arrayPasajeros = $this->getObjArrayPasajeros();
            $indMaximo = count($arrayPasajeros);
            $dniEncontrado = false;
            $i = 0;
            $posicion = 0;
            while ($dniEncontrado && $i<$indMaximo) {
                $unPasajero = $arrayPasajeros[$i];
                $dniPasajero = $unPasajero->getDni();
                if ($dniPasajero == $documentoPasajero) {
                    $dniEncontrado = true;
                    $posicion = $i;
                } else {
                    $posicion = null;
                    $i++;
                }
            }
            return $posicion;
        }

        /**
         * Método 3: agregarPasajeros - 
         * Agrega pasajeros luego de verificar que no están cargados más de una vez en el viaje.
         * @return boolean
         */
        public function agregarPasajeros($nuevoPasajero) {
            $arrayPasajeros = $this->getObjArrayPasajeros();
            //Valido que el pasajero ingresado no esté en el viaje inicialmente:
            $dniComparacion = $nuevoPasajero->getDni();
            $validarDocumento = $this->validarDocumento($dniComparacion);
            //Dependiendo de la comparación, se agregan o no pasajeros:
            if ($validarDocumento == false) {
                $cantPasajeros = count($arrayPasajeros);
                if ($cantPasajeros == 0) {
                    $arrayPasajeros[0] = $nuevoPasajero;
                } else {
                    $arrayPasajeros[$cantPasajeros] = $nuevoPasajero;
                }
                $this->setObjArrayPasajeros($arrayPasajeros);
                $validacion = true;
            } else {
                $validacion = false;
            }
            return $validacion;
        }

        /**
         * Método 4: eliminarPasajeros - 
         * Elimina a un determinado pasajero.
         */
        public function eliminarPasajeros($documentoPasajero) {
            $arrayPasajeros = $this->getObjArrayPasajeros();
            $indMaximo = count($arrayPasajeros);
            $dniEncontrado = false;
            $modificacion = false;
            $posicion = 0;
            $i = 0;
            $arrayModificado = [];
            while (($i<$indMaximo) && ($arrayPasajeros[$i]->getDni() != $documentoPasajero)) {
                $i++;
            }
            if ($arrayPasajeros[$i]->getDni() == $documentoPasajero) {
                $j = 0;
                while ($j<($indMaximo-1) && ($j != $i)) {
                    $arrayModificado[$j] = $arrayPasajeros[$j];
                    $j++;
                }
                if ($j == $i) {
                    for ($k=$j; $k<($indMaximo-1); $k++) {
                        $arrayModificado[$k] = $arrayPasajeros[$k+1];
                    }
                }
                $this->setObjArrayPasajeros($arrayModificado);
                $modificacion = true;
            } else {
                $modificacion = false;
            }
            return $modificacion;
        }

        /**
         * Método 5: modificarPasajeros - 
         * Modifica los datos de un pasajero.
         * NOTA: Se puede usar "*" para dejar algún dato igual/sin modificar.
         */
        public function modificarPasajeros($documentoPasajero, $nombre, $apellido, $telefono) {
            $arrayPasajeros = $this->getObjArrayPasajeros();
            $cantPasajeros = count($arrayPasajeros);
            $i = 0;
            $encontrado = false;
            while ($i<$cantPasajeros && !$encontrado) {
                $unPasajero = $arrayPasajeros[$i];
                if ($unPasajero->getDni() == $documentoPasajero) {
                    $unPasajero->setNombre($nombre);
                    $unPasajero->setApellido($apellido);
                    $unPasajero->setTelefono($telefono);
                    $arrayPasajeros[$i] = $unPasajero;
                    $encontrado = true;
                }
                $i++;
            }
            $this->setObjArrayPasajeros($arrayPasajeros);
        }

        /**
         * Método 6: mostrarPasajeros - 
         * Muestra los datos de un pasajero.
         * @return string
         */
        public function mostrarPasajeros($documentoPasajero) {
            $arrayPasajeros = $this->getObjArrayPasajeros();
            $cantPasajeros = count($arrayPasajeros);
            $encontrado = false;
            $cadena = "";
            $i = 0;
            while ($i<$cantPasajeros && !$encontrado) {
                $unPasajero = $arrayPasajeros[$i];
                if ($unPasajero->getDni() == $documentoPasajero) {
                    $cadena = $unPasajero->__toString();
                    $encontrado = true;
                }
                $i++;
            }
            return $cadena;
        }

        /**
         * Método 7: modificarDatosViaje - 
         * Modifica los datos del viaje.
         * @return boolean
         */
        public function modificarDatosViaje($codViaje, $destino, $capacidadMaxima) {
            $bandera = true;
            if ($codViaje != "*") {
                $this->setCodigoViaje($codViaje);
            }
            if ($destino != "*") {
                $this->setDestino($destino);
            }
            if ($capacidadMaxima != "*") {
                $this->setCapacidadPasajeros($capacidadMaxima);
            }
            return $bandera;
        }

        /**
         * Método 8: modificarDatosResponsable - 
         * Modifica los datos del viaje.
         * @return boolean
         */
        public function modificarDatosResponsable($nombre, $apellido, $empleado, $licencia) {
            $objResponsable = $this->getObjResponsable();
            $bandera = true;
            if ($nombre != "*") {
                $objResponsable->setNombre($nombre);
            }
            if ($apellido != "*") {
                $objResponsable->setApellido($apellido);
            }
            if ($empleado != "*") {
                $objResponsable->setNroEmpleado($empleado);
            }
            if ($licencia != "*") {
                $objResponsable->setNroLicencia($licencia);
            }
            return $bandera;
        }

        public function __toString() {
            $pasajeros = $this->getObjArrayPasajeros();
            $objResponsable = $this->getObjResponsable();
            $cadena = "\n--- DATOS DEL VIAJE ---\n"
                        ."| Codigo de viaje: ".$this->getCodigoViaje()."\n"
                        ."| Destino: ".$this->getDestino()."\n"
                        ."| Capacidad de pasajeros: ".$this->getCapacidadPasajeros()."\n"
                        ."| Cantidad de pasajeros: " .count($pasajeros)."\n"
                        ."--- RESPONSABLE DEL VIAJE ---\n"
                        .$objResponsable->__toString()."\n"; 
            return $cadena;
        }
    }
?>