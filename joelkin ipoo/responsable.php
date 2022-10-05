<?php
include_once 'BaseDatos.php';
class Responsable{
    private $rnumeroempleado;
    private $rnumerolicencia;
    private $rnombre;
    private $rapellido;

    /**
     * Este método devuelve un booleano si se encontró el viaje correspondiente a el rnumeroempleado pasado por parametro
     * También actualiza los datos del $this para que sean equivalentes a los del responsable encontrado
     *
     * @param $nroEmpleado
     * @return bool
     */
    public function Buscar($nroEmpleado){
        $base = new BaseDatos();
        $consulta = "SELECT * FROM responsable WHERE rnumeroempleado=".$nroEmpleado;
        $resp = false;
        if($base->Iniciar()){
            if($base->Ejecutar($consulta)){
                if($row2=$base->Registro()){
                    $this->setRNumeroEmpleado($nroEmpleado);
                    $this->setRNumeroLicencia($row2['rnumerolicencia']);
                    $this->setRNombre($row2['rnombre']);
                    $this->setRApellido($row2['rapellido']);
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
     * Este metodo retorna todas las filas de la tabla responsable en un array, si hay algun error en la consulta retorna null
     *
     * @param $condicion
     * @return null|array
     */
    public function Listar(){
        $arreglo = null;
        $base = new BaseDatos();

        $consulta = "SELECT * FROM responsable";

        $consulta .= " ORDER BY rapellido";

        if($base->Iniciar()){
            if($base->Ejecutar($consulta)){
                $arreglo = array();
                while($row2=$base->Registro()){
                    $nroEmpleado = $row2['rnumeroempleado'];
                    $nroLicencia = $row2['rnumerolicencia'];
                    $nombre = $row2['rnombre'];
                    $apellido = $row2['rapellido'];
                    $class = new Responsable($nroEmpleado,$nroLicencia,$nombre,$apellido);
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
        $consulta = "INSERT INTO responsable(rnumeroempleado,rnumerolicencia,rnombre,rapellido)
        VALUES ({$this->getRNumeroEmpleado()},{$this->getRNumeroLicencia()},'{$this->getRNombre()}','{$this->getRApellido()}')";
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
        $consulta = "UPDATE responsable SET rnumerolicencia={$this->getRNumeroLicencia()}, 
        rnombre='{$this->getRNombre()}', rapellido='{$this->getRApellido()}' WHERE rnumeroempleado={$this->getRNumeroEmpleado()}";
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
            $consulta = "DELETE FROM responsable WHERE rnumeroempleado={$this->getRNumeroEmpleado()}";
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
        return "||__".strtoupper($this->getRApellido()).",{$this->getRNombre()}__||\n".
        "||__NRO. EMPLEADO: {$this->getRNumeroEmpleado()}__||\n".
        "||__NRO. LICENCIA: {$this->getRNumeroLicencia()}__||\n"
        ;
    }

    public function __construct($rnumeroempleado=0,$rnumerolicencia=0,$rnombre="",$rapellido=""){
        $this->rnumeroempleado = $rnumeroempleado;
        $this->rnumerolicencia = $rnumerolicencia;
        $this->rnombre = $rnombre;
        $this->rapellido = $rapellido;
    }
    
    public function getRNumeroEmpleado(){
        return $this->rnumeroempleado;
    }
    public function setRNumeroEmpleado($rnumeroempleado){
        $this->rnumeroempleado = $rnumeroempleado;
    }
    
    public function getRNumeroLicencia(){
        return $this->rnumerolicencia;
    }
    public function setRNumeroLicencia($rnumerolicencia){
        $this->rnumerolicencia = $rnumerolicencia;
    }
    
    public function getRNombre(){
        return $this->rnombre;
    }
    public function setRNombre($rnombre){
        $this->rnombre = $rnombre;
    }
    
    public function getRApellido(){
        return $this->rapellido;
    }
    public function setRApellido($rapellido){
        $this->rapellido = $rapellido;
    }
    
    public function getMensajeOperacion(){
        return $this->mensajeoperacion;
    }
    public function setMensajeOperacion($mensajeoperacion){
        $this->mensajeoperacion=$mensajeoperacion;
    }
}
