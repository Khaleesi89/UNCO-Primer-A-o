<?php
    //Clase Lectura: almacena información sobre la lectura de un determinado libro.
    class Lectura {
        private $objLibro;
        private $numPagina;

        //Métodos de acceso
        public function getObjLibro() {
                return $this->objLibro;
        }
        public function getNumPagina() {
            return $this->numPagina;
        }

        public function setObjLibro($objLibro) {
                $this->objLibro = $objLibro;
        }
        public function setNumPagina($numPagina) {
            $this->numPagina = $numPagina;
        }

        //Métodos
        public function __construct($objLibro, $numPagina) {
            $this->objLibro = $objLibro;
            $this->numPagina = $numPagina;
        }

        /**
         * Método 1: siguientePagina - 
         * Retorna la pagina del libro y actualiza la pagina actual.
         * @return int
         */
        public function siguientePagina() {
            $nroPagina = $this->getNumPagina();
            $siguientePagina = $this->setNumPagina($nroPagina + 1);
            return $siguientePagina;
        }

        /**
         * Método 2: retrocederPagina - 
         * Retorna la pagina anterior a la actual.
         * @return int
         */
        public function retrocederPagina() {
            $nroPagina = $this->getNumPagina();
            $paginaAnterior = $this->setNumPagina($nroPagina - 1);
            return $paginaAnterior;
        }

        /**
         * Método 3: irPagina - 
         * Retorna la página actual seteada con la página ingresada por parámetro.
         * @return int
         */
        public function irPagina($pagina) {
            return $this->setNumPagina($pagina);
        }

        public function __toString() {
            $objLibro = $this->getObjLibro();
            $cadena = "| Datos del libro: \n".$objLibro->__toString()
                    ."\n| Página de lectura actual: ".$this->getNumPagina();
            return $cadena;
        }
    }
?>