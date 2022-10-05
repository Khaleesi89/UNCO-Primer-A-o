<?php
    class Torneo {
        private $arrayPartidos;
        private $importePremio;

        //Métodos de acceso
        public function getArrayPartidos() {
            return $this->arrayPartidos;
        }
        public function getImportePremio() {
            return $this->importePremio;
        }

        public function setArrayPartidos($arrayPartidos) {
            $this->arrayPartidos = $arrayPartidos;
        }
        public function setImportePremio($importePremio) {
            $this->importePremio = $importePremio;
        }

        //Métodos
        public function __construct($arrayPartidos, $importePremio) {
            $this->arrayPartidos = $arrayPartidos;
            $this->importePremio = $importePremio;
        }

        /**
         * Método 1: ingresarPartidos - 
         * Recibe dos equipos, crea y retorna una instancia de la clase Partido.
         * Verifica que ambos equipos tengan la misma categoría y cant. de jugadores
         * antes de almacenar el partido en la colección.
         * @return boolean
         */
        public function ingresarPartidos($objEquipo1, $objEquipo2, $fechaPartido, $tipo) {
            $arrayPartidos = $this->getArrayPartidos();
            $cantPartidos = count($arrayPartidos);
            $partidoAgregado = false;

            $categoriaEquipo1 = $objEquipo1->getCategoria();
            $categoriaEquipo2 = $objEquipo2->getCategoria();
            $cantJugEquipo1 = $objEquipo1->getCantJugadores();
            $cantJugEquipo2 = $objEquipo2->getCantJugadores();
            
            if (($categoriaEquipo1 == $categoriaEquipo2) && ($cantJugEquipo1 == $cantJugEquipo2)) {
                if ($tipo == "Futbol") {
                    if ($cantPartidos == 0) {
                        $idPartidoNuevo = 0;
                    } else {
                        $idPartidoNuevo = $cantPartidos + 1;
                    }
                    $nuevoPartido = new Futbol($idPartidoNuevo, $fechaPartido, $objEquipo1, $objEquipo2, 0, 0);
                    array_push($arrayPartidos, $nuevoPartido);
                    $this->setArrayPartidos($arrayPartidos);
                    $partidoAgregado = true;
                } elseif ($tipo == "Basket") {
                    if ($cantPartidos == 0) {
                        $idPartidoNuevo = 0;
                    } else {
                        $idPartidoNuevo = $cantPartidos + 1;
                    }
                    $nuevoPartido = new Basket($idPartidoNuevo, $fechaPartido, $objEquipo1, $objEquipo2, 0, 0, 0);
                    array_push($arrayPartidos, $nuevoPartido);
                    $this->setArrayPartidos($arrayPartidos);
                    $partidoAgregado = true;
                }
            }
            return $partidoAgregado;
        }

        /**
         * Método 2: darGanadores - 
         * Según el tipo de partido (fútbol o basket), retorna una colección con los equipos ganadores.
         * @return array
         */
        public function darGanadores($deporte) {
            $arrayPartidos = $this->getArrayPartidos();
            $arrayGanadores = [];
            foreach ($arrayPartidos as $unPartido) {
                if (get_class($unPartido) == $deporte) {
                    if ($unPartido->getCantGolesE1() < $unPartido->getCantGolesE2()) {
                        $unGanador = $unPartido->getObjEquipo1();
                    } elseif ($unPartido->getCantGolesE1() > $unPartido->getCantGolesE2()) {
                        $unGanador = $unPartido->getObjEquipo2();
                    }
                    array_push($arrayGanadores, $unGanador);
                }
            }
            return $arrayGanadores;
        }

        /**
         * Método 3: calcularPremioPartido - 
         * Retorna un arreglo con los partidos ganados y su respectivo importe.
         * @return array;
         */
        public function calcularPremioPartido($objPartido) {
            if ($objPartido->getCantGolesE1() < $objPartido->getCantGolesE2()) {
                $unGanador = $objPartido->getObjEquipo1();
            } elseif ($objPartido->getCantGolesE1() > $objPartido->getCantGolesE2()) {
                $unGanador = $objPartido->getObjEquipo2();
            }
            $importePremio = $this->getImportePremio();
            $datosPartido = ["equipoGanador" => null, "premioPartido" => 0];
            if ($unGanador != null) {
                $datosPartido = ["equipoGanador" => $unGanador, "premioPartido" => $importePremio * $objPartido->coeficientePartido()];
            }
            return $datosPartido;
        }

        /**
         * Método 4: mostrarDatosArreglos - 
         * Retorna una cadena de strings de un arreglo recibido por parámetro.
         * @return string
         */
        public function mostrarDatosArreglos($unArreglo) {
            $cantElementos = count($unArreglo);
            $cadena = "";
            for ($i=0; $i<$cantElementos; $i++) {
                $cadena .= $unArreglo[$i]."<<---------------------------->>\n";
            }
            return $cadena;
        }

        /**
         * Método 4: mostrarImportePartido - 
         * Retorna una cadena de strings de un objPartido recibido por parámetro.
         * @return string
         */
        public function mostrarImportePartido($objPartido) {
            $cadena = "";
            $equipoGanador = $objPartido["equipoGanador"];
            $premioPartido = $objPartido["premioPartido"];
            $cadena .= "| Equipo Ganador:\n".$equipoGanador
                    ."| Premio del Partido: $".$premioPartido."\n<<---------------------------->>\n";
            return $cadena;
        }

        public function __toString() {
            $cadena = "|+ Partidos:\n".$this->mostrarDatosArreglos($this->getArrayPartidos())
                    ."|+ Premio: $".$this->getImportePremio()."\n";
            return $cadena;
        }
    }
?>