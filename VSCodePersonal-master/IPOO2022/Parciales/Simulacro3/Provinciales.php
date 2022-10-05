<?php
    /* Los torneos Provinciales almacenan además:
     * el nombre de la Provincia en la que serán jugados sus partidos
     */
    class Provinciales extends Torneo {
        private $provincia;

        //Métodos de acceso
        public function getProvincia() {
            return $this->provincia;
        }

        public function setProvincia($provincia) {
            
            $this->provincia = $provincia;
        }

        //Métodos
        public function __construct($idTorneo, $arrayPartidos, $importePremio, $provincia) {
            parent::__construct($idTorneo, $arrayPartidos, $importePremio);
            $this->provincia = $provincia;
        }

        public function __toString() {
            return parent::__toString().
            "   + Provincia: ".$this->getProvincia()."\n";
        }
    } 
?>