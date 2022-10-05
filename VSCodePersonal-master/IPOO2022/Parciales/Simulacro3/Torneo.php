<?php
    class Torneo {
        private $idTorneo;
        private $arrayPartidos;
        private $importePremio;
        private $coleccionGanadores;
        private $tipo;

        //Métodos de acceso
        public function getIdTorneo() {
            return $this->idTorneo;
        }
        public function getArrayPartidos() {
            return $this->arrayPartidos;
        }
        public function getImportePremio() {
            return $this->importePremio;
        }
        public function getColeccionGanadores() {
            return $this->coleccionGanadores;
        }
        public function getTipo() {
            return $this->tipo;
        }

        public function setIdTorneo($idTorneo) {
            $this->idTorneo = $idTorneo;
        }
        public function setArrayPartidos($arrayPartidos) {
            $this->arrayPartidos = $arrayPartidos;
        }
        public function setImportePremio($importePremio) {
            $this->importePremio = $importePremio;
        }
        public function setColeccionGanadores($coleccionGanadores) {
            $this->coleccionGanadores = $coleccionGanadores;
        }
        public function setTipo($tipo) {
            $this->tipo = $tipo;
        }

        //Métodos
        public function __construct($idTorneo, $arrayPartidos, $importePremio, $tipo) {
            $this->idTorneo = $idTorneo;
            $this->arrayPartidos = $arrayPartidos;
            $this->importePremio = $importePremio;
            $this->coleccionGanadores = [];
            $this->tipo = $tipo;
        }

        /**
         * Método 1: ingresarPartidos - 
         * Recibe dos equipos, crea y retorna una instancia de la clase Partido.
         * Verifica que ambos equipos tengan la misma categoría y cant. de jugadores
         * antes de almacenar el partido en la colección.
         * @return boolean
         */
        /*public function ingresarPartidos($objEquipo1, $objEquipo2, $fechaPartido, $tipo) {
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
        }*/

        /**
         * Método 2: darGanadores - 
         * Según el tipo de partido (fútbol o basket), retorna una colección con los equipos ganadores.
         * @return array
         */
        /*public function darGanadores($deporte) {
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
        }*/

        /**
         * Método 3: calcularPremioPartido - 
         * Retorna un arreglo con los partidos ganados y su respectivo importe.
         * @return array;
         */
        /*public function calcularPremioPartido($objPartido) {
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
        }*/

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
         * Método 5: mostrarImportePartido - 
         * Retorna una cadena de strings de un objPartido recibido por parámetro.
         * @return string
         */
        /*public function mostrarImportePartido($objPartido) {
            $cadena = "";
            $equipoGanador = $objPartido["equipoGanador"];
            $premioPartido = $objPartido["premioPartido"];
            $cadena .= "| Equipo Ganador:\n".$equipoGanador
                    ."| Premio del Partido: $".$premioPartido."\n<<---------------------------->>\n";
            return $cadena;
        }*/

        //Punto 4.
        public function obtenerEquipoGanadorTorneo() {
            $arrayPartidos = $this->getArrayPartidos();
            $coleccionGanadores = $this->getColeccionGanadores();
            foreach ($arrayPartidos as $unPartido) {
                /*$unGanador = $unPartido->darGanadorPartido();
                $datosPartido = ["equipoGanador" => null, "cantPartidosGanados" => 0, "cantGoles" => 0];
                if ($unGanador != null) {
                    $datosPartido = ["equipoGanador" => $unGanador,
                                    "cantPartidosGanados" => 1,
                                    "cantGoles" => 0];
                }*/
                $arrayGanador = $unPartido->darGanadorPartido();
                $datosGanadorPartido = ["tipo" => null, "equipoGanador" => null, "cantPartidosGanados" => 0, "cantGoles" => 0];
                if ($arrayGanador != null) {
                    $datosGanadorPartido["equipoGanador"] = $arrayGanador["equipo"];
                    $datosGanadorPartido["cantPartidosGanados"] = 1;
                    $datosGanadorPartido["cantGoles"] = $arrayGanador["goles"];
                    //array_push($coleccionGanadores, $datosGanadorPartido);
                    $this->incorporarEquipo($coleccionGanadores, $datosGanadorPartido);
                }
            }
        }

        public function incorporarEquipo($colGanadores, $datosGanadorPartido) {
            foreach ($colGanadores as $arrayGanador) {
                $objEquipo = $arrayGanador["equipoGanador"];
                $nombreEquipo = $objEquipo->getNombreEquipo();
                $objEquipoComparacion = $datosGanadorPartido["equipoGanador"];
                $nombreEquipoComparacion = $objEquipoComparacion->getNombreEquipo();
                if ($nombreEquipo == $nombreEquipoComparacion) {
                    $cantPartidosGanados = $arrayGanador["cantPartidosGanados"];
                    $arrayGanador["cantPartidosGanados"] = $cantPartidosGanados + 1;
                    $arrayGanador["cantGoles"] = $datosGanadorPartido["cantGoles"];
                } else {
                    array_push($colGanadores, $datosGanadorPartido);
                }
            }
            return $colGanadores;
        }

        //Punto 5.
        public function obtenerPremioTorneo() {
            $coleccionGanadores = $this->getColeccionGanadores();
            $tipoTorneo = $this->getTipo();
            foreach ($coleccionGanadores as $unGanador) {
                if ($tipoTorneo == "Nacional") {
                    $unGanador->obtenerPremio
                } elseif ($tipoTorneo == "Provincial") {
                    $unGanador["premio"] = $this->getImportePremio();
                }
            }
        }

        public function __toString() {
            $cadena = "|+ ID Torneo: ".$this->getIdTorneo()."\n" 
                    ."|+ Partidos:\n".$this->mostrarDatosArreglos($this->getArrayPartidos())
                    ."|+ Premio Base: $".$this->getImportePremio()."\n";
            return $cadena;
        }
    }
?>