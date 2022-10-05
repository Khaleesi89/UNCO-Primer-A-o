<?php
    class Viaje {
        private $codigoViaje;
        private $destino;
        private $capacidadPasajeros;
        private $pasajeros;

    //Métodos de acceso
    public function getCodigoViaje() {
        return $this->codigoViaje;
    }
    public function getDestino() {
        return $this->destino;
    }
    public function getCapacidadPasajeros() {
        return $this->capacidadPasajeros;
    }
    public function getPasajeros() {
        return $this->pasajeros;
    }

    public function setCodigoViaje($codigoViaje) {
        $this->codigoViaje = $codigoViaje;
    }
    public function setDestino($destino) {
        $this->destino = $destino;
    }
    public function setCapacidadPasajeros($capacidadPasajeros) {
        $this->capacidadPasajeros = $capacidadPasajeros;
    }
    public function setPasajeros($pasajeros) {
        $this->pasajeros = $pasajeros;
    }
    
    //Métodos
    public function __construct($codigoViaje, $destino, $capacidadPasajeros, $pasajeros) {
        $this->codigoViaje = $codigoViaje;
        $this->destino = $destino;
        $this->capacidadPasajeros = $capacidadPasajeros;
        $this->pasajeros = $pasajeros;
    }

    /**
     * Método 1: datosViaje - 
     * Retorna un arreglo con los datos de los viajes.
     * @return array
     */
    public function datosViaje($codigoViaje, $destino, $capacidadPasajeros) {
        $this->setCodigoViaje($codigoViaje);
        $this->setDestino($destino);
        $this->setCapacidadPasajeros($capacidadPasajeros);
    }

    /**
     * Método 2: agregarPasajeros - 
     * Retorna un arreglo con los datos de los pasajeros agregados (agrega pasajeros).
     * @return array
     */
    public function agregarPasajeros($nuevoPasajero) {
        $arrayPasajeros = $this->getPasajeros();
        $indMaximo = count($nuevoPasajero) - 1;
        for ($i=0; $i<=$indMaximo; $i++) {
            array_push($arrayPasajeros, $nuevoPasajero[$i]);
        }        
        $this->setPasajeros($arrayPasajeros);
    }

    /**
     * Método 3: eliminarPasajeros - 
     * Elimina a un pasajero determinado.
     */
    public function eliminarPasajeros($indicePasajero) {
        $indice = $indicePasajero - 1;
        $arrayPasajeros = $this->getPasajeros();
        array_splice($arrayPasajeros, $indice, 1);
        $this->setPasajeros($arrayPasajeros);
    }

    /**
     * Método 4: modificarPasajeros - 
     * Modifica los datos de un pasajero.
     * NOTA: Se puede usar "*" para dejar algún dato igual/sin modificar.
     */
    public function modificarPasajeros($indicePasajero, $nombre, $apellido, $dni) {
        $indice = $indicePasajero - 1;
        $arrayPasajeros = $this->getPasajeros();
        if ($nombre != "*") {
            $arrayPasajeros[$indice]["nombre"] = $nombre;
        }
        if ($apellido != "*") {
            $arrayPasajeros[$indice]["apellido"] = $apellido;
        }
        if ($dni != "*") {
            $arrayPasajeros[$indice]["dni"] = $dni;
        }
        $this->setPasajeros($arrayPasajeros);
    }

    /**
     * Método 5: mostrarPasajeros - 
     * Muestra los datos de un pasajero.
     * @return string
     */
    public function mostrarPasajeros($indicePasajero) {
        $arrayPasajeros = $this->getPasajeros();
        if ($indicePasajero > (count($arrayPasajeros) - 1)) {
            $cadena = "\n>>> ERROR. El número ingresado no tiene un pasajero asignado.\n";
        } else {
            for ($i=0; $i<(count($arrayPasajeros) - 1); $i++) {
            $cadena = "\n| Pasajero N°: ".($indicePasajero).
                        "\n| Nombre: ".$arrayPasajeros[$indicePasajero]["nombre"].
                        "\n| Apellido: ".$arrayPasajeros[$indicePasajero]["apellido"].
                        "\n| Documento: ".$arrayPasajeros[$indicePasajero]["dni"]."\n";
            }
        }
        return $cadena;
    }

    /**
     * Método 6: modificarDatosViaje - 
     * Modifica los datos del viaje.
     * @return boolean
     */
    public function modificarDatosViaje($codViaje, $destino, $capacidadMaxima) {
        $bandera = true;
        if ($codViaje != "*") {
            $this->setCodigoViaje($codViaje);
        }
        if ($destino != "*") {
            $this->setDestino($destino);
        }
        if ($capacidadMaxima != "*") {
            $this->setCapacidadPasajeros($capacidadMaxima);
        }
        //print_r($unViaje);
        return $bandera;
    }

    public function __toString() {
        $cadena = "\n| Codigo de viaje: ".$this->getCodigoViaje()."\n"
                    ."| Destino: ".$this->getDestino()."\n"
                    ."| Capacidad de pasajeros: ".$this->getCapacidadPasajeros()."\n"
                    ."| Cantidad de pasajeros: " .count($this->getPasajeros())."\n"; 
        return $cadena;
    }
}
?>