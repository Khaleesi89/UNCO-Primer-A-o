<?php
//dentificación, código del electrodoméstico, fecha otorgamiento, monto, cantidad_de_cuotas, taza de interés,
//la colección de cuotas y la referencia a la persona que solicitó el préstamo.
    class Prestamo {
        private $id;
        private $codElectrodomestico = "";
        private $fechaOtorgamiento = "No aprobado.";
        private $monto;
        private $cantCuotas;
        private $tasaInteres;
        private $arrayCuotas = [];
        private $objPersona;

        //Métodos de acceso
        public function getId() {
            return $this->id;
        }
        public function getCodElectrodomestico() {
            return $this->codElectrodomestico;
        }
        public function getFechaOtorgamiento() {
            return $this->fechaOtorgamiento;
        }
        public function getMonto() {
            return $this->monto;
        }
        public function getCantCuotas() {
            return $this->cantCuotas;
        }
        public function getTasaInteres() {
            return $this->tasaInteres;
        }
        public function getArrayCuotas() {
            return $this->arrayCuotas;
        }
        public function getObjPersona() {
            return $this->objPersona;
        }

        public function setId($id) {
            $this->id = $id;
        }
        public function setCodElectrodomestico($codElectrodomestico) {
            $this->codElectrodomestico = $codElectrodomestico;
        }
        public function setFechaOtorgamiento($fechaOtorgamiento) {
            $this->fechaOtorgamiento = $fechaOtorgamiento;
        }
        public function setMonto($monto) {
            $this->monto = $monto;
        }
        public function setCantCuotas($cantCuotas) {
            $this->cantCuotas = $cantCuotas;
        }
        public function setTasaInteres($tasaInteres) {
            $this->tasaInteres = $tasaInteres;
        }
        public function setArrayCuotas($arrayCuotas) {
            $this->arrayCuotas = $arrayCuotas;
        }
        public function setObjPersona($objPersona) {
            $this->objPersona = $objPersona;
        }

        //Métodos
        public function __construct($id, $monto, $cantCuotas, $tasaInteres, $objPersona) {
            $this->id = $id;
            $this->monto = $monto;
            $this->cantCuotas = $cantCuotas;
            $this->tasaInteres = $tasaInteres;
            $this->ObjPersona = $objPersona;
        }

        /**
         * Método 1: coleccionCuotas - 
         * Retorna cada una de las cuotas como un string.
         * @return string
         */
        public function coleccionCuotas() {
            $cadena = "";
            $arrayCuotas = $this->getArrayCuotas();
            $cantCuotas = count($arrayCuotas);
            if ($cantCuotas == 0) {
                $cadena = "Préstamo no aprobado.\n";
            } else {
                foreach ($arrayCuotas as $elemento) {
                    $unaCuota = $elemento->__toString();
                    $cadena .= $unaCuota;
                }
            }
            return $cadena;
        }

        /**
         * Método 2: calcularInteresPrestamo - 
         * Dado un n° de cuotas, calcula el interés de cada una.
         * @return float
         */
        private function calcularInteresPrestamo($numCuota) {
            $monto = $this->getMonto();
            $tasaInteres = $this->getTasaInteres();
            $arrayCuotas = $this->getArrayCuotas();
            $cantCuotas = count($arrayCuotas);
            $montoCuota = $monto / $cantCuotas;
            $montoInteres = ($monto - ($montoCuota * ($numCuota - 1))) * $tasaInteres;
            return $montoInteres;
        }

        /**
         * Método 3: otorgarPrestamo - 
         * Setea la variable instancia $fechaOtorgamiento con la fecha actual.
         * Genera c/u de las cuotas dependiendo el valor almacenado en las variable instancia $cantCuotas y $monto.
         */
        public function otorgarPrestamo() {
            $fechaActual = $this->obtenerFecha();
            $this->setFechaOtorgamiento($fechaActual);
            $this->generarCuota();
        }

        /**
         * Método 4: obtenerFecha - 
         * Dada la función getdate(), retorna una cadena con la fecha actual.
         * @return string
         */
        public function obtenerFecha() {
            $arrayFecha = getdate();
            $dia = $arrayFecha["mday"];
            $mes = $arrayFecha["mon"];
            $anio = $arrayFecha["year"];
            $cadena = $dia."/".$mes."/".$anio."\n";
            return $cadena;
        }

        /**
         * Método 5: generarCuota - 
         * Genera cada una de las cuotas de la coleccion de cuotas.
         */
        public function generarCuota() {
            $monto = $this->getMonto();
            $cantCuotas = $this->getCantCuotas();
            $montoCuota = $monto / $cantCuotas;
            $arrayCuotas = [];
            for ($i=1; $i<=$cantCuotas; $i++) {
                $interes = $this->calcularInteresPrestamo($i);
                $cuota = new Cuota($i, $montoCuota, $interes); //Se guardan los datos en la clase Cuota.php
                $arrayCuotas[$i-1] = $cuota;
            }
            $this->setArrayCuotas($arrayCuotas);
        }

        /**
         * Método 6: darSiguienteCuotaPagar - 
         * Retorna la referencia a la siguiente cuota que debe ser abonada de un préstamo.
         * Si el préstamo tiene todas sus cuotas canceladas retorna NULL.
         */
        public function darSiguienteCuotaPagar() {
            $arrayCuotas = $this->getArrayCuotas();
            $siguienteCuota = null;
            $estado = true;
            foreach ($arrayCuotas as $elemento) {
                if ($estado) {
                    $cuota = $elemento;
                    $estadoCuota = $cuota->getCancelada();
                    if ($estadoCuota == "Sin pagar") {
                        $estado = false;
                        $siguienteCuota = $elemento;
                    }
                }
            }
            return $siguienteCuota;
        }

        public function estadoCuota() {
            $estadoCuotas = $this->darSiguienteCuotaPagar();
            if ($estadoCuotas == null) {
                $cadena = "Cuotas canceladas.";
            } else {
                $cadena = $estadoCuotas;
            }
            return $cadena;
        }

        public function __toString() {
            $objPersona = $this->getObjPersona();
            //$persona = $objPersona->__toString();
            //$cuotas = $this->estadoCuota();
            $cadena = "\n| ID: ".$this->getId()."\n"
                        ."| Código del producto: ".$this->getCodElectrodomestico()."\n"
                        ."| Fecha de entrega: ".$this->getFechaOtorgamiento()."\n"
                        ."| Monto: ".$this->getMonto()."\n"
                        ."| Cant. de cuotas: ".$this->getCantCuotas()."\n"
                        ."| Tasa de interés: ".$this->getTasaInteres()."\n"
                        ."| Datos del solicitante: ".$objPersona."\n"
                        ."| Datos de las cuotas: ".$this->estadoCuota()."\n";
            return $cadena;
        }
    }
?>