<?php 

    class Teatro {
        private $nombreTeatro;
        private $direccionTeatro;
        private $funcionesTeatro;
    
        public function __construct($nomTeatro, $dirTeatro, $aFuncionesTeatro) {
            $this->nombreTeatro = $nomTeatro;
            $this->direccionTeatro = $dirTeatro;
            $this->funcionesTeatro = $aFuncionesTeatro;
        }
        
        public function get_NombreTeatro() {
            return $this->nombreTeatro;
        }
        public function get_DireccionTeatro() {
            return $this->direccionTeatro;
        }
        public function get_FuncionesTeatro() {
            return $this->funcionesTeatro;
        }
        
        public function set_NombreTeatro($nombreTeatro) {
            $this->nombreTeatro = $nombreTeatro;
        }
        public function set_DireccionTeatro($dirTeatro) {
            $this->direccionTeatro = $dirTeatro;
        }
        public function set_FuncionesTeatro($funcionesTeatro) {
            $this->funcionesTeatro = $funcionesTeatro;
        }
        
        private function armarCadenaArrayFunciones() {
            $aFunciones = $this->get_FuncionesTeatro();
            $cFunciones = "";
            for ($i=0; $i<count($aFunciones); $i++){
                $nroFuncion = $i + 1; 
                $cFunciones = $cFunciones." ".$nroFuncion.
                ") Nombre: ". $aFunciones[$i]["nombre"].
                " - Precio: $".$aFunciones[$i]["precio"]."\n";   
            }
            return $cFunciones;
        }
        
        public function __toString() {
            $cadena = $this->armarCadenaArrayFunciones();
            $datoTeatro = "| Teatro: ".$this->get_NombreTeatro().
                        "\n| Dirección: ".$this->get_DireccionTeatro().
                        "\n".($cadena==""?"No hay funciones. ": "Funciones\n".$cadena); 
            return $datoTeatro;
        }

        //Dado el nombre de una funcion, modifica el nombre/precio por uno nuevo
        public function modificar_NombrePrecioFuncion($nombreFuncion, $nombreNuevo, $precioNuevo) {
            $i = 0;
            $bandera = false;
            $eltosArreglo = $this->get_FuncionesTeatro();
            while($i<count($eltosArreglo) && !$bandera) {
                $unaFuncion = $eltosArreglo[$i];
                if($unaFuncion["nombre"] == $nombreFuncion) {
                    $unaFuncion["nombre"] = $nombreNuevo;
                    $unaFuncion["precio"] = $precioNuevo;
                    $eltosArreglo[$i] = $unaFuncion;
                    $bandera = true;
                }
                $i++;
            }
            $this->set_FuncionesTeatro($eltosArreglo);
            return $bandera;
        }

        public function modificar_NombrePrecioFuncionconId($nroFuncion, $nombreNuevo, $precioNuevo) {
            $eltosArreglo = $this->get_FuncionesTeatro();
            $bandera = false;
            if ($nroFuncion >= 0 && $nroFuncion < count($eltosArreglo)) {
                $unaFuncion = $eltosArreglo[$nroFuncion];
                $unaFuncion["nombre"]=$nombreNuevo;
                $unaFuncion["precio"]=$precioNuevo;
                $eltosArreglo[$nroFuncion] = $unaFuncion;
                $bandera = true;
            }
            $this->set_FuncionesTeatro($eltosArreglo);
            return $bandera;
        }
    }
?>