<?php

	class Libro {
		private $ISBN;
		private $titulo;
		private $anioEdicion;
		private $editorial;
		private $nombreAutor;
		private $apellidoAutor;

		public function __construct($ISBN, $titulo, $anioEdicion, $editorial, $nombreAutor, $apellidoAutor) {
			$this->ISBN = $ISBN;
			$this->titulo = $titulo;
			$this->anioEdicion = $anioEdicion;
			$this->editorial = $editorial;
			$this->nombreAutor = $nombreAutor;
			$this->apellidoAutor = $apellidoAutor;	
		}
		
		public function getISBN() {
			return $this->ISBN;
		}
		public function gettitulo() {
			return $this->titulo;
		}
		public function getanioEdicion() {
			return $this->anioEdicion;
		}
		public function geteditorial() {
			return $this->editorial;
		}
		public function getnombreAutor() {
			return $this->nombreAutor;
		}
		public function getapellidoAutor() {
			return $this->apellidoAutor;
		}

		public function setISBN($ISBN) {
			$this->ISBN = $ISBN;
		}
		public function settitulo($titulo) {
			$this->titulo = $titulo;
		}
		public function setanioEdicion($anioEdicion) {
			$this->anioEdicion = $anioEdicion;
		}
		public function seteditorial($editorial) {
			$this->editorial = $editorial;
		}
		public function setnombreAutor($nombreAutor) {
			$this->nombreAutor = $nombreAutor;
		}
		public function setapellidoAutor($apellidoAutor) {
			$this->apellidoAutor = $apellidoAutor;
		}

        //Indica si el libro pertenece a una editorial dada
		public function perteneceEditorial($perteneceEditorial) {
			$resultado = false;
			if ($this->geteditorial() == $perteneceEditorial) {
				$resultado = true;
			}
			return $resultado;
		}

        //Dada una colección de libros, indica si el libro pasado por parámetro ya se encuentra en dicha colección
		public function iguales($plibro, $arrayColeccion) {
            foreach ($arrayColeccion as $libro) {
                if ($plibro == $libro) {
                    $valor = true;
                } else {
                    $valor = false;
                }
                return $valor;
            }
		}

        //Retorna los años que han pasado desde que el libro fue editado
		public function aniosdesdeEdicion() {
            $anioEdicion = $this->getanioEdicion();
            $Year = date("Y");
            //echo "The current year is $Year.";
			if ($anioEdicion == $Year) {
				$valor = $anioEdicion;
                echo "  + Último año de edición: ".$anioEdicion."\n";
			} else {
				$valor = $Year - $anioEdicion;
                echo "  + Años desde su última edición: ".$valor."\n";
			}
		}

		//Método que retorna un arreglo asociativo con todos los libros publicados por la editorial dada
		public function librodeEditoriales($arregloAutor, $peditorial) {
			$arregloAutor = array();
			for ($i=0; $i<count($arregloAutor); $i++) {
				if ($peditorial == $this->gettitulo()->geteditorial()){
					array_push($this->gettitulo());
				}
			}
		}

        //Retorna la información de los atributos de la clase
		public function __toString() {
			$cadena= "| Codigo ISBN: ".$this->getISBN()."\n"
					."| Título: ".$this->gettitulo()."\n"
					."| Año de Edición: ".$this->getanioEdicion()."\n"
					."| Editorial: " .$this->geteditorial()."\n"
					."| Nombre del autor: " .$this->getnombreAutor()."\n"
					."| Apellido del autor: ".$this->getapellidoAutor()."\n";
			return $cadena;
		}
	}
?>