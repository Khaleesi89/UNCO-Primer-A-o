<?php
include_once 'BaseDatos.php';
class Viaje
{
    private $idviaje;
    private $vdestino;
    private $vcantmaxpasajeros;
    private $idempresa;
    private $rnumeroempleado;
    private $vimporte;
    private $tipoAsiento;
    private $idayvuelta;
    private $coleccionpasajeros;
    private $mensajeoperacion;

    /**
     * Este método devuelve el mayor valor alcanzado por el campo AUTO_INCREMENT (idviajes) de la tabla viajes
     *
     * @return null|array
     */
    public function devolverIdInsercion(){
        $base = new BaseDatos();
        $resp = null;
        $consulta = "SELECT `AUTO_INCREMENT`
                    FROM  INFORMATION_SCHEMA.TABLES
                    WHERE TABLE_SCHEMA = 'bdviajes'
                    AND   TABLE_NAME   = 'viaje';";
        if($base->Iniciar()){
            if($base->Ejecutar($consulta)){
                if($row2=$base->Registro()){
                    $resp = $row2['AUTO_INCREMENT'];
                }
            }   else {
                $this->setMensajeOperacion($base->getError());
            }
        }   else{
            $this->setMensajeOperacion($base->getError());
        }
        return $resp;
    }

    /**
     * Devuelve un array con todos los pasajeros asociados a este viaje en la base de datos
     *
     * @return null|Array
     * */
    public function listarPasajeros(){
        $arreglo = null;
        $base = new BaseDatos();

        $consulta = "SELECT * FROM pasajero WHERE idviaje=".$this->getIdViaje();

        $consulta .= " ORDER BY papellido";

        if($base->Iniciar()){
            if($base->Ejecutar($consulta)){
                $arreglo = array();
                while($row2=$base->Registro()){
                    $rdocumento = $row2['rdocumento'];
                    $pnombre = $row2['pnombre'];
                    $papellido = $row2['papellido'];
                    $ptelefono = $row2['ptelefono'];
                    $idviaje = $row2['idviaje'];

                    $pasajero = new Pasajero($rdocumento,$pnombre,$papellido,$ptelefono,$idviaje);
                    $arreglo[] = $pasajero;
                }
            }	else{
                $this->setmensajeoperacion($base->getError());
            }
        }	else{
            $this->setmensajeoperacion($base->getError());
        }
        return $arreglo;
    }


    /**
     * Este método devuelve un booleano si se encontró el viaje correspondiente a el id viaje pasado por parametro
     * También actualiza los datos del $this para que sean equivalentes a los del viaje encontrado
     *
     * @param int $idViaje
     * @return bool
     */
    public function Buscar($idViaje){
        $base = new BaseDatos();
        $consulta = "SELECT * FROM viaje WHERE idviaje=".$idViaje;
        $resp = false;
        if($base->Iniciar()){
            if($base->Ejecutar($consulta)){
                if($row2=$base->Registro()){
                    $this->setIdViaje($idViaje);
                    $this->setVDestino($row2['vdestino']);
                    $this->setVCantMaxPasajeros($row2['vcantmaxpasajeros']);
                    $this->setIdEmpresa($row2['idempresa']);
                    $this->setRNumeroEmpleado($row2['rnumeroempleado']);
                    $this->setVImporte($row2['vimporte']);
                    $this->setTipoAsiento($row2['tipoAsiento']);
                    $this->setIdaYVuelta($row2['idayvuelta']);
                    $this->setColeccionPasajeros($this->listarPasajeros());
                    $resp = true;
                }
            }   else{
                $this->setMensajeOperacion($base->getError());
            }
        }   else{
            $this->setMensajeOperacion($base->getError());
        }
        return $resp;
    }

    /**
     * Este metodo retorna todas las filas de la tabla viaje en un array, si hay algun error en la consulta retorna null
     *
     * @return null|array
     */
    public function Listar(){
        $arreglo = null;
        $base = new BaseDatos();

        $consulta = "SELECT * FROM viaje";


        if($base->Iniciar()){
            if($base->Ejecutar($consulta)){
                $arreglo = array();
                while($row2=$base->Registro()){
                    $idviaje = $row2['idviaje'];
                    $vdestino = $row2['vdestino'];
                    $vcantmaxpasajeros = $row2['vcantmaxpasajeros'];
                    $idempresa = $row2['idempresa'];
                    $rnumeroempleado = $row2['rnumeroempleado'];
                    $vimporte = $row2['vimporte'];
                    $tipoAsiento = $row2['tipoAsiento'];
                    $idayvuelta = $row2['idayvuelta'];
                    $coleccionPasajeros = $this->listarPasajeros();

                    $class = new Viaje($idviaje, $vdestino, $vcantmaxpasajeros, $idempresa, $rnumeroempleado, $vimporte, $tipoAsiento, $idayvuelta,$coleccionPasajeros);
                    $arreglo[] = $class;
                }
            }	else{
                $this->setmensajeoperacion($base->getError());
            }
        }	else{
            $this->setmensajeoperacion($base->getError());

        }
        return $arreglo;
    }

    /**
     * Este metodo inserta una fila en la base de datos con los valores actuales del $this
     * Retorna true si la operacion se realizó exitosamente, y false si no
     * @return bool
     */
    public function Insertar(){
        $base = new BaseDatos();
        $resp = false;
        $consulta = "INSERT INTO viaje(idviaje,vdestino,vcantmaxpasajeros,idempresa,rnumeroempleado,vimporte,tipoAsiento,idayvuelta)
        VALUES ({$this->getIdViaje()},'{$this->getVDestino()}',{$this->getVCantMaxPasajeros()},{$this->getIdEmpresa()},{$this->getRNumeroEmpleado()},{$this->getVImporte()},'{$this->getTipoAsiento()}','{$this->getIdaYVuelta()}')";
        if($base->Iniciar()){
            if($base->Ejecutar($consulta)){
                $resp = true;
            }	else{
                $this->setmensajeoperacion($base->getError());
            }
        } else{
            $this->setmensajeoperacion($base->getError());
        }
        return $resp;
    }

    /**
     * Este metodo modifica una fila de la base de datos con los valores actuales del $this
     * Retorna true si la operacion se realizó exitosamente, y false si no
     *
     * @return bool
     */
    public function Modificar(){
        $resp = false;
        $base = new BaseDatos();
        $consulta = "UPDATE viaje SET vdestino='{$this->getVDestino()}', 
        vcantmaxpasajeros={$this->getVCantMaxPasajeros()}, idempresa={$this->getIdEmpresa()}, 
        rnumeroempleado={$this->getRNumeroEmpleado()}, vimporte={$this->getVImporte()}, tipoAsiento='{$this->getTipoAsiento()}', idayvuelta='{$this->getIdaYVuelta()}' WHERE idviaje={$this->getIdViaje()}";
        if($base->Iniciar()){
            if($base->Ejecutar($consulta)){
                $resp = true;
            }   else{
                $this->setMensajeOperacion($base->getError());
            }
        }   else{
            $this->setMensajeOperacion($base->getError());
        }
        return $resp;
    }

    /**
     * Este metodo elimina una fila de la base de datos, si esta corresponde a el actual valor de $this->idviaje
     * Retorna true si la operacion se realizó exitosamente, y false si no
     *
     * @return bool
     */
    public function Eliminar(){
        $base = new BaseDatos();
        $resp = false;
        if($base->Iniciar()){
            $consulta = "DELETE FROM viaje WHERE idviaje={$this->getIdViaje()}";

            if($base->Ejecutar($consulta)){
                $resp = true;
            }   else{
                $this->setMensajeOperacion($base->getError());
            }
        }   else{
            $this->setMensajeOperacion($base->getError());
        }
        return $resp;
    }

    /**
     * Este método muestra los pasajeros del viaje como una serie de renglones de datos
     *
     * @param $idViaje
     * @return string
     */
    public function mostrarPasajeros($idViaje){
        $string = "||____________________________||\n";
        $base = new BaseDatos();

        $consulta = "SELECT * FROM pasajero WHERE idViaje=".$idViaje;

        $consulta .= " ORDER BY papellido";

        if($base->Iniciar()){
            if($base->Ejecutar($consulta)){
                $arreglo = array();
                while($row2=$base->Registro()){
                    $rdocumento = $row2['rdocumento'];
                    $pnombre = $row2['pnombre'];
                    $papellido = $row2['papellido'];
                    $ptelefono = $row2['ptelefono'];
                    $idviaje = $row2['idviaje'];

                    $pasajero = new Pasajero($rdocumento,$pnombre,$papellido,$ptelefono,$idviaje);
                    $string.="||\n"."||__".strtoupper($pasajero->getPApellido()).",{$pasajero->getPNombre()}__||\n".
                        "||__DNI: {$pasajero->getRDocumento()}__||\n||__TELEFONO: {$pasajero->getPTelefono()}__||\n";
                }
            }	else{
                $this->setmensajeoperacion($base->getError());
            }
        }	else{
            $string.= "||\n||______NO HAY PASAJEROS______||\n";
            $this->setmensajeoperacion($base->getError());
        }
        $string.="||____________________________";
        return $string;
    }

    public function __toString(){
        $string = "||__VIAJE NRO {$this->getIdViaje()}__||\n".
            "||__DESTINO: {$this->getVDestino()}__||\n".
            "||__MAXIMO PASAJEROS: {$this->getVCantMaxPasajeros()}__||\n".
            "||__PASAJEROS__||\n".$this->mostrarPasajeros($this->getIdViaje()).
            "||\n";
        $resp = new Responsable();
        if($resp->Buscar($this->getRNumeroEmpleado())){
            $string .= "||__RESPONSABLE VIAJE__||\n||\n".$resp;
        }
        $empresa = new Empresa();
        if($empresa->Buscar($this->getIdEmpresa())){
            $string.= "||____________________________||\n||__EMPRESA ASOCIADA__||\n||\n".$empresa;
        }

        $string.="||__IMPORTE: {$this->getVImporte()}__||\n".
            "||__TIPO ASIENTO: {$this->getTipoAsiento()}__||\n".
            "||__¿ES IDA Y VUELTA?: {$this->getIdaYVuelta()}__||\n\n"
            ;

        return $string;
    }

    public function vaciarCampos(){
        $this->idviaje = 0;
        $this->vdestino = "";
        $this->vcantmaxpasajeros = 0;
        $this->idempresa = 0;
        $this->rnumeroempleado = 0;
        $this->vimporte = 0;
        $this->tipoAsiento = "";
        $this->idayvuelta = "";
        $this->coleccionpasajeros = [];
    }

    public function __construct($idviaje=0, $vdestino="", $vcantmaxpasajeros=0, $idempresa=0, $rnumeroempleado=0, $vimporte=0, $tipoAsiento="", $idayvuelta="",$coleccionpasajeros=[])
    {
        $this->idviaje = $idviaje;
        $this->vdestino = $vdestino;
        $this->vcantmaxpasajeros = $vcantmaxpasajeros;
        $this->idempresa = $idempresa;
        $this->rnumeroempleado = $rnumeroempleado;
        $this->vimporte = $vimporte;
        $this->tipoAsiento = $tipoAsiento;
        $this->idayvuelta = $idayvuelta;
        $this->coleccionpasajeros = $coleccionpasajeros;
    }


    public function getIdViaje(){
        return $this->idviaje;
    }
    public function setIdViaje($idviaje){
        $this->idviaje = $idviaje;
    }

    public function getVDestino(){
        return $this->vdestino;
    }
    public function setVDestino($vdestino){
        $this->vdestino = $vdestino;
    }

    public function getVCantMaxPasajeros(){
        return $this->vcantmaxpasajeros;
    }
    public function setVCantMaxPasajeros($vcantmaxpasajeros){
        $this->vcantmaxpasajeros = $vcantmaxpasajeros;
    }

    public function getIdEmpresa(){
        return $this->idempresa;
    }
    public function setIdEmpresa($idempresa){
        $this->idempresa = $idempresa;
    }

    public function getRNumeroEmpleado(){
        return $this->rnumeroempleado;
    }
    public function setRNumeroEmpleado($rnumeroempleado){
        $this->rnumeroempleado = $rnumeroempleado;
    }

    public function getVImporte(){
        return $this->vimporte;
    }
    public function setVImporte($vimporte){
        $this->vimporte = $vimporte;
    }

    public function getTipoAsiento(){
        return $this->tipoAsiento;
    }
    public function setTipoAsiento($tipoAsiento){
        $this->tipoAsiento = $tipoAsiento;
    }

    public function getIdaYVuelta(){
        return $this->idayvuelta;
    }
    public function setIdaYVuelta($idayvuelta){
        $this->idayvuelta = $idayvuelta;
    }

    public function getColeccionPasajeros(){
        return $this->coleccionpasajeros;
    }
    public function setColeccionPasajeros($coleccionpasajeros){
        $this->coleccionpasajeros = $coleccionpasajeros;
    }

    public function getMensajeOperacion(){
        return $this->mensajeoperacion;
    }
    public function setMensajeOperacion($mensajeoperacion){
        $this->mensajeoperacion = $mensajeoperacion;
    }
}