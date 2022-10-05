<?php
    
    class Responsable {
        private $nombre;
        private $apellido;
        private $nroEmpleado;
        private $nroLicencia;
        private $mensajeoperacion;
        
        /**************************************/
        /************     GET    **************/
        /**************************************/

        public function getNombre() {
            return $this->nombre;
        }
        public function getApellido() {
            return $this->apellido;
        }
        public function getNroEmpleado() {
            return $this->nroEmpleado;
        }
        public function getNroLicencia() {
            return $this->nroLicencia;
        }
        public function getmensajeoperacion() {
            return $this->mensajeoperacion;
        }

        /**************************************/
        /************     SET    **************/
        /**************************************/

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function setApellido($apellido) {
            $this->apellido = $apellido;
        }
        public function setNroEmpleado($nroEmpleado) {
            $this->nroEmpleado = $nroEmpleado;
        }
        public function setNroLicencia($nroLicencia) {
            $this->nroLicencia = $nroLicencia;
        }
        public function setmensajeoperacion($mensajeoperacion){
            $this->mensajeoperacion = $mensajeoperacion;
        }

        
        /**************************************/
        /************   CONSTRUCT  **************/
        /**************************************/

        public function __construct() {
            $this->nroEmpleado = 0;
            $this->nroLicencia = "";
            $this->nombre = "";
            $this->apellido = "";
        }

        /**************************************/
        /************   CARGAR **************/
        /**************************************/

        public function cargar($nroEmpleado, $nroLicencia, $nombre, $apellido) {
            $this->setNroEmpleado($nroEmpleado);
            $this->setNroLicencia($nroLicencia);
            $this->setNombre($nombre);
            $this->setApellido($apellido);
        }

        /**************************************/
        /************  TO STRING   **************/
        /**************************************/

        public function __toString() {
            $info = "********RESPONSABLE*************
                    Nombre: {$this->getNombre()}
                    Apellido: {$this->getApellido()}
                    N° de empleado: {$this->getNroEmpleado()}
                    N° de licencia: {$this->getNroLicencia()}
                    *********************
                    ";
            return $info;
        }

        /**************************************/
        /************  BUSCAR    **************/
        /**************************************/

        public function buscar($nroEmpleado) {
            $baseDatos = new BaseDatos();
            $consulta = "SELECT * FROM responsable WHERE rnumeroempleado = ".$nroEmpleado;
            $resp = false;

            if ($baseDatos->iniciar()) {
                if ($baseDatos->ejecutar($consulta)) {
                    if ($row2 = $baseDatos->registro()) {
                        $this->setNroEmpleado($nroEmpleado);
                        $this->setNroLicencia($row2['rnumerolicencia']);
                        $this->setNombre($row2['rnombre']);
                        $this->setApellido($row2['rapellido']);
                        $resp= true;
                    }
                } else {
                    $this->setMensajeOperacion($baseDatos->getError());
                }
            } else {
                $this->setMensajeOperacion($baseDatos->getError());
            }
            return $resp;
        }

        /**************************************/
        /************   LISTAR   **************/
        /**************************************/

        public function listar($condicion = ""){
            $arregloResponsable = null;
            $base = new BaseDatos();
            $consulta = "SELECT * from responsable ";
            if ($condicion != "") {
                $consulta = $consulta.' WHERE '.$condicion;
            }

            $consulta .= " order by rapellido ";
            if ($base->Iniciar()) {
                if ($base->Ejecutar($consulta)) {				
                    $arregloResponsable = array();
                    while ($row2 = $base->Registro()) {
                        $nuevoResponsable = new Responsable();
                        $nuevoResponsable->buscar($row2['rnumeroempleado']);
                        array_push($arregloResponsable, $nuevoResponsable);
                    }
                 } else {
                     $this->setmensajeoperacion($base->getError());
                     
                }
            } else {
                 $this->setmensajeoperacion($base->getError());
            }	
            return $arregloResponsable;
        }

        /**************************************/
        /************ INSERTAR   **************/
        /**************************************/

        public function insertar() {
            $base = new BaseDatos();
            $resp = false;
            $insert = "INSERT INTO responsable(rnumeroempleado, rnumerolicencia, rnombre, rapellido) 
                                VALUES ('".$this->getNroEmpleado()."',
                                        '".$this->getNroLicencia()."', 
                                        '".$this->getNombre()."',
                                        '".$this->getApellido()."')";
            if ($base->Iniciar()) {
                if ($base->Ejecutar($insert)) {
                    $resp = true;
                } else {
                    $this->setmensajeoperacion($base->getError());	
                }
            } else {
                $this->setmensajeoperacion($base->getError());
            }
            return $resp;
        }

        /**************************************/
        /************ MODIFICAR  **************/
        /**************************************/

        public function modificar() {
            $resp = false; 
            $baseDatos = new BaseDatos();
            $modif = "UPDATE responsable SET rnumerolicencia = '".$this->getNroLicencia()."',
                                                rnombre = '".$this->getNombre()."',
                                                rapellido = '".$this->getApellido()."'
                                                WHERE rnumeroempleado = ". $this->getNroEmpleado();
            if ($baseDatos->Iniciar()) {
                if ($baseDatos->Ejecutar($modif)) {
                    $resp = true;
                } else {
                    $this->setmensajeoperacion($baseDatos->getError());
                }
            } else {
                $this->setmensajeoperacion($baseDatos->getError());
            }
            return $resp;
        }
        
        /**************************************/
        /************  ELIMINAR  **************/
        /**************************************/
        
        public function eliminar() {
            $baseDatos = new BaseDatos();
            $resp = false;
            if ($baseDatos->Iniciar()) {
                $eliminar = "DELETE FROM responsable WHERE rnumeroempleado = ".$this->getNroEmpleado();
                if ($baseDatos->Ejecutar($eliminar)) {
                    $resp = true;
                } else {
                    $this->setmensajeoperacion($baseDatos->getError());	
                }
            } else {
                $this->setmensajeoperacion($baseDatos->getError());
            }
            return $resp;
        }
    }
?>