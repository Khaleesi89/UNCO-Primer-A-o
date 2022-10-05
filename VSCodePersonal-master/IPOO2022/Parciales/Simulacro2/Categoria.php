<?php
    class Categoria {
        private $idCategoria;
        private $descripcion;

        //Métodos de acceso
        public function getIdCategoria() {
            return $this->idCategoria;
        }
        public function getDescripcion() {
            return $this->descripcion;
        }

        public function setIdCategoria($idCategoria) {
            $this->idCategoria = $idCategoria;
        }
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }

        //Métodos
        public function __construct($idCategoria, $descripcion) {
            $this->idCategoria = $idCategoria;
            $this->descripcion = $descripcion;
        }

        public function __toString() {
            $cadena = " + ID Categoría: ".$this->getIdCategoria()."\n"
                    ."  + Descripción: ".$this->getDescripcion()."\n";
            return $cadena;
        }
    }
?>