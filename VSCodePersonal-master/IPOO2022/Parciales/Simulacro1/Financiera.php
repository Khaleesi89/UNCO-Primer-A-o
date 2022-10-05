<?php
//denominación, dirección y la colección de prestamos otorgados.
    class Financiera {
        private $denominacion;
        private $direccion;
        private $arrayPrestamos = [];

        //Métodos de acceso
        public function getDenominacion() {
            return $this->denominacion;
        }
        public function getDireccion() {
            return $this->direccion;
        }
        public function getArrayPrestamos() {
            return $this->arrayPrestamos;
        }

        public function setDenominacion($denominacion) {
            $this->denominacion = $denominacion;
        }
        public function setDireccion($direccion) {
            $this->direccion = $direccion;
        }
        public function setArrayPrestamos($arrayPrestamos) {
            $this->arrayPrestamos = $arrayPrestamos;
        }

        //Métodos
        public function __construct($denominacion, $direccion) {
            $this->denominacion = $denominacion;
            $this->direccion = $direccion;
        }

        /**
         * Método 1: incorporarPrestamo - 
         * Recibe un nuevo préstamo por parámetro.
         */
        public function incorporarPrestamo($nuevoPrestamo) {
            $arrayPrestamos = $this->getArrayPrestamos();
            //array_push($arrayPrestamos, $nuevoPrestamo);
            $arrayPrestamos[count($arrayPrestamos)] = $nuevoPrestamo;
            $this->setArrayPrestamos($arrayPrestamos);
        }

        /**
         * Método 2: otorgarPrestamoSiCalifica - 
         * Recorre la lista de prestamos de los que no han sido generadas sus cuotas.
         */
        public function otorgarPrestamoSiCalifica() {
            /*
            $arrayPrestamos = $this->getArrayPrestamos();
            $cantPrestamos = count($arrayPrestamos);
            for ($i=0; $i<$cantPrestamos; $i++) {
                if (count($arrayPrestamos[$i]->getArrayCuotas()) == 0) {
                    $objPersona = $arrayPrestamos[$i]->getObjPersona();
                    if (($arrayPrestamos[$i]->getMonto() / $arrayPrestamos[$i]->getCantCuotas()) <= ($objPersona->getNeto() * 0.4)) {
                       $arrayPrestamos[$i]->otorgarPrestamo();
                    }
                }
            }
            */
            $arrayPrestamos = $this->getArrayPrestamos();
            /*foreach ($arrayPrestamos as $prestamo) {
                if (count($prestamo->getArrayCuotas()) == 0) {
                    $objPersona = $prestamo->getObjPersona();
                    if (($prestamo->getMonto() / $prestamo->getCantCuotas()) <= ($objPersona->getNeto() * 0.4)) {
                        $prestamo->otorgarPrestamo();
                    }
                }
            }*/
            /*
            $arrayPrestamos = $this->getArrayPrestamos();
            $cantPrestamos = count($arrayPrestamos);
            for ($i=0; $i<$cantPrestamos; $i++) {
                $unPrestamo = $arrayPrestamos[$i];
                if (count($unPrestamo->getArrayCuotas()) == 0) {
                    $objPersona = $unPrestamo->getObjPersona();
                    if ($unPrestamo->getMonto() / $unPrestamo->getCantCuotas() <= $objPersona->getNeto() * 0.4) {
                        $unPrestamo[$i]->otorgarPrestamo();
                    }
                }
            }
            */
            foreach ($arrayPrestamos as $prestamo) {
                $estadoPrestamo = $prestamo->getFechaOtorgamiento();
                if ($estadoPrestamo == "No aprobado.") {
                    $monto = $prestamo->getMonto();
                    $cantCuotas = $prestamo->getCantCuotas();
                    $montoPorCuota = $monto / $cantCuotas;
                    $objPersona = $prestamo->getObjPersona();
                    $montoNeto = $objPersona->getNeto();
                    $montoNetoCuarenta = $montoNeto * 0.4;
                    if ($montoPorCuota <= $montoNetoCuarenta) {
                        $prestamo->otorgarPrestamo();
                    }
                }
            }
            
        }

        /**
         * Método 3: informarCuotaPagar - 
         * Dado el ID del prestamo, obtiene la sig. cuota a pagar.
         */
        public function informarCuotaPagar($idPrestamo) {
            $arrayPrestamos = $this->getArrayPrestamos();
            foreach ($arrayPrestamos as $elemento) {
                $prestamo = $elemento;
                $id = $prestamo->getId();
                if ($id == $idPrestamo) {
                    $cuotaAPagar = $prestamo->darSiguienteCuotaPagar();
                    return $cuotaAPagar;
                }
            }
        }

        /**
         * Método 4: mostrarPrestamos - 
         * Recorre el arreglo de préstamos y los retorna en pantalla
         * @return string
         */
        private function mostrarPrestamos() {
            $cadena = "";
            $arrayPrestamos = $this->getArrayPrestamos();
            foreach ($arrayPrestamos as $prestamo) {
                $cadena .= $prestamo;
            }
            return $cadena;
        }

        public function __toString() {
            $prestamos = $this->mostrarPrestamos();
            $cadena = "| Denominación: ".$this->getDenominacion()."\n"
                    ."| Dirección: ".$this->getDireccion()."\n"
                    ."| Préstamos: \n".$prestamos."\n";
            return $cadena;
        }
    }
?>