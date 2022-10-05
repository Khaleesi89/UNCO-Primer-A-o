<?php
    //nombre, apellido, numero de documento y teléfono + idViaje
    class Pasajero {
        private $dni;
        private $nombre;
        private $apellido;
        private $telefono;
        private $objviaje; //es objeto viaje
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
        public function getDni() {
            return $this->dni;
        }
        public function getTelefono() {
            return $this->telefono;
        }
        public function getObjviaje() {
            return $this->objviaje;
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
        public function setDni($dni) {
            $this->dni = $dni;
        }
        public function setTelefono($telefono) {
            $this->telefono = $telefono;
        }
        public function setObjviaje($idViajes) {
            $this->objviaje = $idViajes;
        }
        public function setmensajeoperacion($mensajeoperacion){
            $this->mensajeoperacion = $mensajeoperacion;
        }

        /**************************************/
        /************  CONSTRUCT **************/
        /**************************************/

        public function __construct() {
            $this->nombre = "";
            $this->apellido = "";
            $this->dni = "";
            $this->telefono = "";
            $this->idviaje = null;
        }

        /**************************************/
        /************   CARGAR   **************/
        /**************************************/

        public function cargar($dni, $nombre, $apellido, $telefono, $objViaje) {		
            $this->setDni($dni);
            $this->setNombre($nombre);
            $this->setApellido($apellido);
            $this->setTelefono($telefono);
            //$viaje = new Viaje();
            //$viaje->buscar($idViaje);
            $this->setObjviaje($objViaje);
        }


        /**************************************/
        /************  TOSTRING  **************/
        /**************************************/
        public function __toString() {
            
            $cadena = "
            ********* PASAJERO *************
            Nombre: {$this->getNombre()}
            Apellido: {$this->getApellido()}
            DNI: {$this->getDni()}
            Teléfono: {$this->getTelefono()}
            ID Viaje: {$this->getObjviaje()} 
            ********************************
            ";
            return $cadena;
        }

        /**************************************/
        /************   BUSCAR   **************/
        /**************************************/

        public function buscar($nroDocumento) {
            $baseDatos = new BaseDatos();
            $consulta = "SELECT * FROM pasajero WHERE rdocumento = ".$nroDocumento;
            $resp = false;

            if ($baseDatos->iniciar()) {
                if ($baseDatos->ejecutar($consulta)) {
                    if ($row2 = $baseDatos->registro()) {
                        //Se busca el objViaje por el código de viaje:
                        $objViaje = new Viaje();
                        $objViaje->Buscar($this->getObjviaje());

                        $this->setDni($nroDocumento);
                        $this->setNombre($row2['pnombre']);
                        $this->setApellido($row2['papellido']);
                        $this->setTelefono($row2['ptelefono']);
                        $this->setObjviaje($row2['idviaje']); 
                        //$this->getIdviaje($objViaje->getCodigoViaje());
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
        /************   LISTAR   **************/
        /**************************************/

        public function listar($condicion = ""){
            $arrayPasajeros = null;
            $base = new BaseDatos();
            $consultaPasajero = "SELECT * from pasajero ";
            //Si la condición recibida por parámetro no está vacia, se arma un nuevo string para la consulta en la BD:
            if ($condicion != "") {
                $consultaPasajero = $consultaPasajero.' where '.$condicion;
            }

            $consultaPasajero .= " order by papellido ";
            //echo $consultaResponsable;
            if ($base->Iniciar()) {
                if ($base->Ejecutar($consultaPasajero)) {				
                    $arrayPasajeros = array();
                    while ($row2 = $base->Registro()) {
                        $dni = $row2['rdocumento'];
                        $objPasajero = new Pasajero();
                        $objPasajero->buscar($dni);
                        array_push($arrayPasajeros, $objPasajero);
                    }
                 } else {
                    $this->setmensajeoperacion($base->getError());
                }
            } else {
                 $this->setmensajeoperacion($base->getError());
            }	
            return $arrayPasajeros;
        }


        /**************************************/
        /************   INSERTAR **************/
        /**************************************/

        public function insertar() {
            $base = new BaseDatos();
            $resp = false;
            $idViaje = $this->getObjviaje()->getIdViaje();
            //echo $idViaje;
            $consultaInsertar = "INSERT INTO pasajero(rdocumento, pnombre, papellido, ptelefono, idviaje) 
                                VALUES ('".$this->getDni()."',
                                        '".$this->getNombre()."',
                                        '".$this->getApellido()."',
                                        '".$this->getTelefono()."',
                                        '".$idViaje."')"; 
            //echo $consultaInsertar;
            if ($base->Iniciar()) {
                if ($base->Ejecutar($consultaInsertar)) {
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
        /************  MODIFICAR **************/
        /**************************************/

        public function modificar() {
            $resp = false; 
            $baseDatos = new BaseDatos();
            $consultaModifica = "UPDATE pasajero SET pnombre = '".$this->getNombre()."',
                                                papellido = '".$this->getApellido()."',
                                                ptelefono = '".$this->getTelefono()."',
                                                idviaje = '".$this->getObjviaje()."'
                                                WHERE rdocumento = ". $this->getDni();
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
        /************   ELIMINAR **************/
        /**************************************/

        public function eliminar() {
            $baseDatos = new BaseDatos();
            $resp = false;
            if ($baseDatos->Iniciar()) {
                $consultaBorra = "DELETE FROM pasajero WHERE rdocumento = ".$this->getDni();
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