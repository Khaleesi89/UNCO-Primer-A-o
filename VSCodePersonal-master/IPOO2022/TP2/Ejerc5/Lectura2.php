<?php
    class Lectura2 {
        private $objLibro;
        private $arrayLibros;

        //Métodos de acceso
        public function getObjLibro() {
                return $this->objLibro;
        }
        public function getArrayLibros() {
            return $this->arrayLibros;
        }

        public function setObjLibro($objLibro) {
                $this->objLibro = $objLibro;
        }
        public function setArrayLibros($arrayLibros) {
            $this->arrayLibros = $arrayLibros;
        }

        //Métodos
        public function __construct($objLibro) {
            $this->objLibro = $objLibro;
            $this->arrayLibros = [];
        }

        /**
         * Método 0: agregarLectura - 
         * Agrega un libro leído a la colección de lecturas.
         */
        public function agregarLectura() {
            $libroLeyendo = $this->getObjLibro();
            $coleccionLecturas = $this->getArrayLibros();
            if (!in_array($libroLeyendo, $coleccionLecturas)) {
                array_push($coleccionLecturas, $libroLeyendo);
            }
        }  

        /**
         * Método 1: libroLeido - 
         * Retorna TRUE si el libro recibido por parámetro se encuentra dentro
         * del conjunto de libros leídos; FALSE en caso contrario.
         * @return boolean
         */
        public function libroLeido($titulo) {
            $leido = false;
            $coleccionLecturas = $this->getArrayLibros();
            if (in_array($titulo, $coleccionLecturas)) {
                $leido = true;
            }
            return $leido;
        }

        /**
         * Método 2: darSinopsis - 
         * Retorna la sinopsis del libro recibido por parámetro.
         * @return string
         */
        public function darSinopsis($titulo) {
            $sinopsis = "";
            $coleccionLecturas = $this->getArrayLibros();
            foreach ($coleccionLecturas as $libro) {
                //Valido que el título se corresponda con alguno de los de la colección de leídos:
                if ($libro->getTitulo() == $titulo) {
                    $sinopsis = $libro->getSinopsis();
                }
            }
            return $sinopsis;
        }

        /**
         * Método 3: leidosAnioEdicion - 
         * Retorna todos los libros leidos cuyo año de edición es igual al
         * recibido por parámetro.
         * @return string
         */
        public function leidosAnioEdicion($anio) {
            /*$librosMismoAnio = "";
            $coleccionLecturas = $this->getArrayLibros();
            foreach ($coleccionLecturas as $libro) {
                //Valido que se muestren todos los libros que tengan el mismo año de edición:
                if ($libro->getanioEdicion() == $anio) {
                    $librosMismoAnio = $libro->__toString();
                } else {
                    $librosMismoAnio = false;
                }
            }
            return $librosMismoAnio;*/
            $arrayLibrosLeidosEnAnio = array_filter($this->getArrayLibros(), function($libro) use ($anio){ return $libro->getanioEdicion() == $anio;});
            return $arrayLibrosLeidosEnAnio;
        }

        /**
         * Métod 4: darLibrosPorAutor - 
         * Retorna los libros leídos cuyo autor coincida con el ingresado
         * por parámetro.
         * @return string
         */
        public function darLibrosPorAutor($nombreAutor) {
            $mismoAutor = "";
            $coleccionLecturas = $this->getArrayLibros();
            foreach ($coleccionLecturas as $libro) {
                if ($libro->getNombreAutor == $nombreAutor) {
                    $mismoAutor = $libro;
                } else {
                    $mismoAutor = false;
                }
            }
            return $mismoAutor;
        }

        public function __toString() {
            $objLibro = $this->getObjLibro();
            $cadena = "-- DATOS DEL LIBRO--\n".$objLibro->__toString();
                    //."\n| Colección de libros leídos: ".$this->getArrayLibros();
            return $cadena;
        }
    }
?>