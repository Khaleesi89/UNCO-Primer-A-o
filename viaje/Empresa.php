<?php
    class Empresa {
        private $idEmpresa;
        private $enombre;
        private $edireccion;
        private $mensajeoperacion;

       

        /**************************************/
        /************     GET    **************/
        /**************************************/

        public function getIdEmpresa() {
            return $this->idEmpresa;
        }
        public function getEnombre() {
            return $this->enombre;
        }
        public function getEdireccion() {
            return $this->edireccion;
        }
        public function getMensajeOperacion() {
            return $this->mensajeoperacion;
        }
 
        /**************************************/
        /************     SET    **************/
        /**************************************/


        public function setIdEmpresa($idEmpresa) {
            $this->idEmpresa = $idEmpresa;
        }
        public function setEnombre($enombre) {
            $this->enombre = $enombre;
        }
        public function setEdireccion($edireccion) {
            $this->edireccion = $edireccion;
        }
        public function setMensajeOperacion($mensajeoperacion){
            $this->mensajeoperacion = $mensajeoperacion;
        }

        
        /**************************************/
        /************  CONSTRUCT **************/
        /**************************************/

        public function __construct() {
            $this->idEmpresa = 0;
            $this->enombre = "";
            $this->edireccion = "";
        }

        /**************************************/
        /************   CARGAR   **************/
        /**************************************/

        public function cargar($idEmpresa, $nombreEmpresa, $direccionEmpresa) {
            $this->setIdEmpresa($idEmpresa);
            $this->setEnombre($nombreEmpresa);
            $this->setEdireccion($direccionEmpresa);
        }


        /**************************************/
        /************  TOSTRING  **************/
        /**************************************/

        public function __toString() {
               
            $info = "
                ***********EMPRESA **************
                ID EMPRESA: {$this->getIdEmpresa()}
                NOMBRE EMPRESA: {$this->getEnombre()}
                DIRECCIÓN EMPRESA: {$this->getEdireccion()}
                *********************************
                ";
            return $info;
        }


        /**************************************/
        /************    BUSCAR  **************/
        /**************************************/

        public function buscar($idEmpresa) {
            $baseDatos = new BaseDatos();
            $consulta = "SELECT * FROM empresa WHERE idempresa = ".$idEmpresa;
            $resp = false;

            if ($baseDatos->iniciar()) {
                if ($baseDatos->ejecutar($consulta)) {
                    if ($empresa = $baseDatos->registro()) {
                        $this->setIdEmpresa($empresa['idempresa']);
                        $this->setEnombre($empresa['enombre']);
                        $this->setEdireccion($empresa['edireccion']);
                        $resp = true;
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
        /************    LISTAR  **************/
        /**************************************/

        public function listar($condicion = "") {
            $arrayEmpresas = null;
            $base = new BaseDatos();
            $consultaEmpresa = "SELECT * FROM empresa";
            if ($condicion != "") {
                $consultaEmpresa = $consultaEmpresa.' where '.$condicion;
            }
            $consultaEmpresa .= " order by idempresa ";
            if ($base->Iniciar()) {
                if ($base->Ejecutar($consultaEmpresa)) {				
                    $arrayEmpresas = array();
                    while ($empresa = $base->Registro()) {
                        $nuevaEmpresa = new Empresa();
                        $nuevaEmpresa->buscar($empresa['idempresa']);
                        array_push($arrayEmpresas, $nuevaEmpresa);
                    }
                 } else {
                    $this->setmensajeoperacion($base->getError());
                }
            } else {
                 $this->setmensajeoperacion($base->getError());
            }	
            return $arrayEmpresas;
        }

        /**************************************/
        /************  INSERTAR  **************/
        /**************************************/

        public function insertar() {
            $base = new BaseDatos();
            $resp = false;
            $consultaInsertar = "INSERT INTO empresa VALUES({$this->getIdEmpresa()}, '{$this->getEnombre()}','{$this->getEdireccion()}')";

            //$consultaInsertar = "INSERT INTO empresa(idempresa, enombre, edireccion)
                                //VALUES (".$this->getIdEmpresa().",'".$this->getEnombre()."','".$this->getEdireccion()."')";
                                        
            if ($base->Iniciar()) {
                if ($base->Ejecutar($consultaInsertar)) {
                    //$this->setIdEmpresa($base->devuelveIDInsercion($consultaInsertar));
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
        /************  MODIFCAR  **************/
        /**************************************/

        public function modificar() {
            $resp = false; 
            $baseDatos = new BaseDatos();
            $consultaModifica = "UPDATE empresa SET enombre = '".$this->getEnombre()."',
                                                edireccion = '".$this->getEdireccion()."'
                                                WHERE idempresa = ". $this->getIdEmpresa();
            if ($baseDatos->Iniciar()) {
                if ($baseDatos->Ejecutar($consultaModifica)) {
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
        /************   ELIMINAR  *************/
        /**************************************/

        public function eliminar() {
            $baseDatos = new BaseDatos();
            $resp = false;
            if ($baseDatos->Iniciar()) {
                $consultaBorra = "DELETE FROM empresa WHERE idempresa = ".$this->getIdEmpresa();
                if ($baseDatos->Ejecutar($consultaBorra)) {
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