<?php

//el de seba
class Viaje{
    private $idViaje;
    private $vDestino;
    private $vCantidadMax;
    private $arrayObjPasajero;
    private $objEmpresa;
    private $objResponsable;
    private $vImporte;    
    private $tipoAsiento;
    private $idaVuelta;    
    private $mensajeError;

    /**************************************/
    /**************** SET *****************/
    /**************************************/

    
    public function setIdViaje($idViaje){
        $this->idViaje = $idViaje;
    }

    
    public function setVDestino($vDestino){
        $this->vDestino = $vDestino;
    }
 
    public function setVCantidadMax($vCantidadMax){
        $this->vCantidadMax = $vCantidadMax;
    }

    public function setArrayObjPasajero($arrayObjPasajero){
        $this->arrayObjPasajero = $arrayObjPasajero;
    }

    public function setObjEmpresa($objEmpresa){
        $this->objEmpresa = $objEmpresa;
    }

    
    public function setObjResponsable($objResponsable){
        $this->objResponsable = $objResponsable;
    }

    public function setVImporte($vImporte){
        $this->vImporte = $vImporte;
    }

    
    public function setTipoAsiento($tipoAsiento){
        $this->tipoAsiento = $tipoAsiento;
    }
 
    public function setIdaVuelta($idaVuelta){
        $this->idaVuelta = $idaVuelta;
    }
    
    
    public function setMensajeError($mensajeError){
        $this->mensajeError = $mensajeError;
    }

    /**************************************/
    /**************** GET *****************/
    /**************************************/

    
    public function getIdViaje(){
        return $this->idViaje;
    }

    
    public function getVDestino(){
        return $this->vDestino;
    }

     
    public function getVCantidadMax(){
        return $this->vCantidadMax;
    }

   
    public function getArrayObjPasajero(){
        return $this->arrayObjPasajero;
    }
 
    public function getObjEmpresa(){
        return $this->objEmpresa;
    }

    
    public function getObjResponsable(){
        return $this->objResponsable;
    }

    
    public function getVImporte(){
        return $this->vImporte;
    }

    public function getTipoAsiento(){
        return $this->tipoAsiento;
    }

    
    public function getIdaVuelta(){
        return $this->idaVuelta;
    }

    
    
    public function getMensajeError(){
        return $this->mensajeError;
    }


    /**************************************/
    /************ CONSTRUCTOR **************/
    /**************************************/
    public function __construct(){
        $this->idViaje = "";
        $this->vDestino = "";
        $this->vCantidadMax = "";
        $this->arrayObjPasajero = [];
        $this->objEmpresa = "";
        $this->objResponsable = "";
        $this->vImporte = "";
        $this->tipoAsiento = "";
        $this->idaVuelta = "";
    }

    /**************************************/
    /************ CARGAR **************/
    /**************************************/

    public function cargar($idViaje, $vDestino, $vCantidadMax, $idEmpresa, $idResponsable, $vImporte, $tipoAsiento, $idaVuelta){		
        $this->setIdViaje($idViaje);
        $this->setVDestino($vDestino);
        $this->setVCantidadMax($vCantidadMax);
        $objEmpresa = new Empresa();
        $objEmpresa->buscar($idEmpresa);
        $this->setObjEmpresa($objEmpresa);
        $objResponsable = new Responsable();
        $objResponsable->buscar ($idResponsable);
        $this->setObjResponsable($objResponsable);
        $this->setVImporte($vImporte);
        $this->setTipoAsiento($tipoAsiento);
        $this->setIdaVuelta($idaVuelta);
    }
    
    
    
    /**************************************/
    /************  INSERTAR  **************/
    /**************************************/




    public function insertar(){
        $baseDatos = new BaseDatos();
        $resp = false;
        $objEmpresa = $this->getObjEmpresa();
        $idEmpresa = $objEmpresa->getIdEmpresa();
        $objResponsable = $this->getObjResponsable();
        $idResonsable= $objResponsable->getNroEmpleado();
        $consulta = "INSERT INTO viaje (idviaje,vdestino,vcantmaxpasajeros,idempresa,rnumeroempleado,vimporte,tipoAsiento,idayvuelta) VALUES (".$this->getIdViaje().",'".$this->getVDestino()."',".$this->getVCantidadMax().",". $idEmpresa.",".$idResonsable.",".$this->getVImporte().",'".$this->getTipoAsiento()."','".$this->getIdaVuelta()."')";
        if($baseDatos->iniciar()){
            if($baseDatos->ejecutar($consulta)){
                $resp = true;
            }else{
                $this->setMensajeError($baseDatos->getERROR());
            }
        }else{
            $this->setMensajeError($baseDatos->getERROR());
        }
        return $resp;
    }

    

    /**************************************/
    /************  MODIFICAR **************/
    /**************************************/ 

    public function modificar(){
        $baseDatos = new BaseDatos();
        $resp = false;
        $empresa =$this->getObjEmpresa();
        $idEmpres = $empresa->getIdEmpresa();
        $responsable= $this->getObjResponsable();
        $idResp = $responsable->getNroEmpleado();

        $consulta = "UPDATE viaje SET vdestino='{$this->getVDestino()}', 
        vcantmaxpasajeros={$this->getVCantidadMax()}, idempresa={$idEmpres}, 
        rnumeroempleado={$idResp}, vimporte={$this->getVImporte()},
         tipoAsiento='{$this->getTipoAsiento()}', idayvuelta='{$this->getIdaVuelta()}'
          WHERE idviaje={$this->getIdViaje()}";
          //echo $consulta;
        /*$consulta = "UPDATE viaje SET vdestino = {$this->getVdestino()}, vcantmaxpasajeros = {$this->getVCantidadMax()}, idempresa = {$idEmpres}, rnumeroempleado = {$idResp}, vimporte = {$this->getVimporte()}, tipoAsiento = '{$this->getTipoAsiento()}', idayvuelta = '{$this->getIdaVuelta()}' WHERE idviaje = {$this->getIdviaje()}";*/
        
       /* $consulta = "UPDATE viaje SET vdestino = '".$this->getVDestino()."',  vcantmaxpasajeros = ".$this->getVCantidadMax().",idempresa = ".$idEmpres.", rnumeroempleado = ".$idResp.",vimporte = ".$this->getVImporte().",tipoAsiento = ".$this->getTipoAsiento().",idayvuelta = '".$this->getIdaVuelta()."' WHERE idviaje = ".$this->getIdViaje(); */
       /* $consulta = "UPDATE viaje SET vdestino = '".$this->getVdestino()."',
                                      vcantmaxpasajeros = '".$this->getVCantidadMax()."',
                                      idempresa = '".$idEmpres."',
                                      rnumeroempleado = '".$idResp."',
                                      vimporte = '".$this->getVImporte()."',
                                      tipoAsiento = '".$this->getTipoAsiento()."',
                                      idayvuelta = '".$this->getIdaVuelta()."'
                                      WHERE idviaje = ". $this->getIdviaje();*/
/*
        $consulta = "UPDATE viaje 
                    SET idViaje = ".$this->getIdViaje().",
                    vdestino = '".$this->getVDestino()."', 
                    vcantmaxpasajeros = ".$this->getVCantidadMax().", 
                    vimporte = ".$this->getVImporte().",
                    tipoAsiento = '".$this->getTipoAsiento()."',
                    idayvuelta = '".$this->getIdaVuelta()."',
                    idempresa = ".$idEmpres.", 
                    rnumeroempleado = ".$idResp." WHERE idviaje =".$this->getIdViaje();*/
                    
        if($baseDatos->iniciar()){
            if($baseDatos->ejecutar($consulta)){
                $resp = true;
            }else{
                $this->setMensajeError($baseDatos->getERROR());
            }
        }else{
            $this->setMensajeError($baseDatos->getERROR());
        }
        return $resp;
    }

    

    /**************************************/
    /************  ELIMINAR  **************/
    /**************************************/


    public function eliminar(){
        $baseDatos = new BaseDatos();
        $resp = false;
        $consulta = "DELETE FROM viaje WHERE idviaje = ".$this->getIdViaje();
        if($baseDatos->iniciar()){
            if($baseDatos->ejecutar($consulta)){
                $resp = true;
            }else{
                $this->setMensajeError($baseDatos->getERROR());
            }
        }else{
            $this->setMensajeError($baseDatos->getERROR());
        }
        return $resp;
    }



    /**************************************/
    /************   BUSCAR   **************/
    /**************************************/


    public function buscar($idViaje){
        $baseDatos = new BaseDatos();
		$consulta="SELECT * FROM viaje WHERE idviaje = ".$idViaje;
		$resp = false;
		if($baseDatos->iniciar()){
			if($baseDatos->ejecutar($consulta)){
				if($viaje=$baseDatos->registro()){
                    //$objReponsable = new Responsable();
                    //$objEmpresa = new Empresa();
                    //se comento porque ya no es necesario obtener el id de empresa y responsable
                    //$objReponsable->buscar($viaje['rnumeroempleado']);					
                    //$objEmpresa->buscar($viaje['idempresa']);	
                    $this->setIdViaje($viaje['idempresa']);
                    //$this->setIdViaje($idViaje);
					$this->setVDestino($viaje['vdestino']);
					$this->setVCantidadMax($viaje['vcantmaxpasajeros']);
					$this->setObjEmpresa($viaje['idempresa']);
					$this->setObjResponsable($viaje['rnumeroempleado']);
					$this->setVImporte($viaje['vimporte']);
					$this->setTipoAsiento($viaje['tipoAsiento']);
					$this->setIdaVuelta($viaje['idayvuelta']);
					$resp= true;
				}

		 	}else{
                $this->setMensajeError($baseDatos->getERROR());
			}
		 }else{
            $this->setMensajeError($baseDatos->getERROR());
		 }		
		 return $resp;
	}	



    /**************************************/
    /************   LISTAR   **************/
    /**************************************/


    public function listar($condicion = ""){
	    $resp = [];
        $baseDatos = new BaseDatos();
		$consultaViaje = "SELECT * FROM viaje ";
		if($condicion != ""){
		    $consultaViaje .=' where '.$condicion;
		}
		if($baseDatos->iniciar()){
			if($baseDatos->ejecutar($consultaViaje)){				
				while($viaje=$baseDatos->registro()){
                    $objViaje = new Viaje();
                    $objViaje->buscar($viaje['idviaje']);
					array_push($resp, $objViaje);
				}
		 	}else {
                $resp = $this->setMensajeError($baseDatos->getERROR());
			}
		 }else{
            $resp = $this->setMensajeError($baseDatos->getERROR());
		 }	
		 return $resp;
	}	

    public function listarPasajeros() {
        $arregloPasajeros = null;
        $base = new BaseDatos();
        $consulta = "SELECT * FROM pasajero WHERE idviaje = ".$this->getIdViaje();
        $consulta .= " ORDER BY papellido";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                $arregloPasajeros = array();
                while ($row2=$base->Registro()) {
                    $dni = $row2['rdocumento'];
                    $nombre = $row2['pnombre'];
                    $apellido = $row2['papellido'];
                    $telefono = $row2['ptelefono'];
                    $idViaje = $row2['idviaje'];

                    $pasajero = new Pasajero();
                    $pasajero->cargar($dni, $nombre, $apellido, $telefono, $idViaje);
                    array_push($arregloPasajeros, $pasajero);
                }
            } else {
                $this->setMensajeError($base->getError());
            }
        } else {
            $this->setMensajeError($base->getError());
        }
        return $arregloPasajeros;
    }

    /**************************************/
    /************  TOSTRING  **************/
    /**************************************/
    
    public function __toString() {
       
        $strRespons = "";
        $strEmpresa = "";
        $responsable = new Responsable();
        $empresa = new Empresa();
       /* $codigoempresa = $this->getObjEmpresa();
        $codigoempleado = $this->getObjResponsable();
        $empresa = $empresa->listar($codigoempresa);
        $responsable = $responsable->listar($codigoempleado);*/
       //responsable 
        if ($responsable->Buscar($this->getObjResponsable())) {
            $strRespons .= $responsable;
        }
        //empresa 
        if($empresa->Buscar($this->getObjEmpresa())){
            $strEmpresa .= $empresa;
        }
        
        $info = "
        *********DATOS DEL VIAJE**********************
        Código del viaje: {$this->getIdViaje()}
        Destino: {$this->getVDestino()}
        Capacidad de pasajeros: {$this->getVCantidadMax()}
        Tipo de asiento: {$this->getTipoAsiento()}
        Trayectoria: {$this->getIdaVuelta()}
        Importe del viaje: {$this->getVImporte()}
        ID Empresa: 
        {$empresa}
        n° empleado: 
        {$responsable}
        ***********************************************                    
        ";
                
        return $info;
    }


}

?>