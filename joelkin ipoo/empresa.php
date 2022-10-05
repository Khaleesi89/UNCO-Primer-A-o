<?php
include_once 'BaseDatos.php';
class Empresa
{
 private $idempresa;
 private $enombre;
 private $edireccion;
 private $mensajeoperacion;

    /**
     * Devuelve un array con todos los viajes asociados a esta empresa en la base de datos
     *
     * @return null|array      /// ESTO TIENE DIFERENTE D CELESTE
     */
    function listarViajes(){
        $arreglo = null;
        $base = new BaseDatos();

        $consulta = "SELECT * FROM viaje WHERE idempresa=".$this->getIdEmpresa();


        if($base->Iniciar()){
            if($base->Ejecutar($consulta)){
                $arreglo = array();
                while($row2=$base->Registro()){
                    $idviaje = $row2['idviaje'];
                    $vdestino = $row2['vdestino'];
                    $vcantmaxpasajeros = $row2['vcantmaxpasajeros'];
                    $rdocumento = $row2['rdocumento'];
                    $idempresa = $row2['idempresa'];
                    $rnumeroempleado = $row2['rnumeroempleado'];
                    $vimporte = $row2['vimporte'];
                    $tipoAsiento = $row2['tipoAsiento'];
                    $idayvuelta = $row2['idayvuelta'];

                    $class = new Viaje($idviaje, $vdestino, $vcantmaxpasajeros, $rdocumento, $idempresa, $rnumeroempleado, $vimporte, $tipoAsiento, $idayvuelta/*#,$coleccionPasajeros#*/);
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
     * Ejecuta el método Eliminar() de todos los viajes asociados a la empresa y sus pasajeros
     *
     * @return false
     */
    public function eliminarViajesAsociados()
    {
        $resp = false;
        $listaViajes = $this->listarViajes();

        foreach ($listaViajes as $viaje) {
            $listaPasajeros = $viaje->listarPasajeros();
            foreach ($listaPasajeros as $pasajero) {
                $pasajero->Eliminar();
            }
            $viaje->Eliminar();
        }
        return $resp;
    }

    /**
     * Este método devuelve un booleano si se encontró la empresa correspondiente a el id empresa pasado por parametro
     * También actualiza los datos del $this para que sean equivalentes a los de la empresa encontrada
     *
     * @param $idempresa
     * @return bool
     */
    public function Buscar($idempresa){
        $base = new BaseDatos();
        $consulta = "SELECT * FROM empresa WHERE idempresa=".$idempresa;
        $resp = false;
        if($base->Iniciar()){
            if($base->Ejecutar($consulta)){
                if($row2=$base->Registro()){
                    $this->setIdEmpresa($idempresa);
                    $this->setENombre($row2['enombre']);
                    $this->setEDireccion($row2['edireccion']);
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
     * Este metodo retorna todas las filas de la tabla empresa en un array, si hay algun error en la consulta retorna null
     *
     * @return null|array
     */
    public function Listar(){
        $arreglo = null;
        $base = new BaseDatos();

        $consulta = "SELECT * FROM empresa";

        if($base->Iniciar()){
            if($base->Ejecutar($consulta)){
                $arreglo = array();
                while($row2=$base->Registro()){
                    $idempresa = $row2['idempresa'];
                    $enombre = $row2['enombre'];
                    $edireccion = $row2['edireccion'];

                    $class = new Empresa($idempresa,$enombre,$edireccion);
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
        $consulta = "INSERT INTO empresa(idempresa,enombre,edireccion)
        VALUES ({$this->getIdEmpresa()},'{$this->getENombre()}','{$this->getEDireccion()}')";
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
        $consulta = "UPDATE empresa SET enombre='{$this->getENombre()}', edireccion='{$this->getEDireccion()}' WHERE idempresa={$this->getIdEmpresa()}";
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
     * Este metodo elimina una fila de la base de datos, si esta corresponde a el actual valor de $this->idempresa
     * Retorna true si la operacion se realizó exitosamente, y false si no
     *
     * @return bool
     */
    public function Eliminar(){
        $base = new BaseDatos();
        $resp = false;
        if($base->Iniciar()){
            $consulta = "DELETE FROM empresa WHERE idempresa={$this->getIdEmpresa()}";
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

    public function __toString(){
        return "||__'{$this->getENombre()}'-{$this->getIdEmpresa()}__||\n".
            "||__DIRECCION: {$this->getEDireccion()}__||\n"
            ;
    }

    public function __construct($idempresa=0, $enombre="", $edireccion="")
    {
        $this->idempresa = $idempresa;
        $this->enombre = $enombre;
        $this->edireccion = $edireccion;
    }

    public function getIdEmpresa(){
        return $this->idempresa;
    }
    public function setIdEmpresa($idempresa){
        $this->idempresa = $idempresa;
    }

    public function getENombre(){
        return $this->enombre;
    }
    public function setENombre($enombre){
        $this->enombre = $enombre;
    }

    public function getEDireccion(){
        return $this->edireccion;
    }
    public function setEDireccion($edireccion){
        $this->edireccion = $edireccion;
    }

    public function getMensajeOperacion(){
        return $this->mensajeoperacion;
    }
    public function setMensajeOperacion($mensajeoperacion){
        $this->mensajeoperacion=$mensajeoperacion;
    }
}