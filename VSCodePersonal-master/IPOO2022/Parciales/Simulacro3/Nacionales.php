<?php
    /**
     * el premio económico esta formado por:
     * a. el premio base mas el 10% del premio económico por la cantidad de partidos ganados
     * premio base + 10% premio * cant. partidos ganados
     */
    class Nacionales extends Torneo {
        //Métodos
        public function __construct($idTorneo, $arrayPartidos, $importePremio) {
            parent::__construct($idTorneo, $arrayPartidos, $importePremio);
        }

    }
?>