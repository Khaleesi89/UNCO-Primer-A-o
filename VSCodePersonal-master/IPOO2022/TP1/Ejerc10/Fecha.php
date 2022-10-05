<?php
//Almacena el día, mes y año (en forma abreviada y extendida).
/** Diseñar e implementar la clase Fecha. La clase deberá disponer de los atributos mínimos y necesarios
* para almacenar el día, el mes y el año, además de métodos que devuelvan un String con la fecha en forma
* abreviada (16/02/2000) y extendida (16 de febrero de 2000) . Implementar una función incremento, que
* reciba como parámetros un entero y una fecha, que retorne una nueva fecha, resultado de incrementar la
* fecha recibida por parámetro en el numero de días definido por el parámetro entero.
* Nota 1: Son años bisiestos los múltiplos de cuatro que no lo son de cien, salvo que lo sean de cuatrocientos, en cuyo caso si son bisiestos.
* Nota 2: Para la solución de este problema puede ser útil definir un método incrementa_un_dia.
*/

class Fecha {
    //Declaración de atributos
    private $dia;
    private $mes;
    private $anio;

    public function __construct($dia, $mes, $anio) {
        $this->dia=$dia;
        $this->mes=$mes;
        $this->anio=$anio;
    }

    //Métodos de acceso
    public function getDia() {
        return $this->dia;
    }
    public function getMes() {
        return $this->mes;
    }
    public function getAnio() {
        return $this->anio;
    }

    public function setDia($dia) {
        $this->dia = $dia;
    }
    public function setMes($mes) {
        $this->mes = $mes;
    }
    public function setAnio($anio) {
        $this->anio = $anio;
    }

    //Sección de metodos
    public function fechaExtendida() {
        $arrayMeses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        $diaFebrero = $this->obtenerDiaFebrero();
        if (($this->getDia()>30) && (($this->getMes()==1) || ($this->getMes()==4) || ($this->getMes()==6) || ($this->getMes()==9) || ($this->getMes()==11))) {
            $fechaArmada = "Ese día no existe.";
        } elseif (($this->getDia()>31) && (($this->getMes()==3) || ($this->getMes()==5) || ($this->getMes()==7) || ($this->getMes()==8) || ($this->getMes()==10) || ($this->getMes()==12))) {
            $fechaArmada = "Ese día no existe.";
        } elseif (($this->getDia()>$diaFebrero) && ($this->getMes()==2)) {
            $fechaArmada = "Ese día no existe.";
        } else {
            $fechaArmada = $this->getDia()." de ".$arrayMeses[$this->getMes() - 1]." del ".$this->getAnio();
        }
        return $fechaArmada;
    }

    public function fechaAbreviada() {
        $diaFebrero = $this->obtenerDiaFebrero();
        if (($this->getDia()>30) && (($this->getMes()==1) || ($this->getMes()==4) || ($this->getMes()==6) || ($this->getMes()==9) || ($this->getMes()==11))) {
            $fechaArmada = "Ese día no existe.";
        } elseif (($this->getDia()>31) && (($this->getMes()==3) || ($this->getMes()==5) || ($this->getMes()==7) || ($this->getMes()==8) || ($this->getMes()==10) || ($this->getMes()==12))) {
            $fechaArmada = "Ese día no existe.";
        } elseif (($this->getDia()>$diaFebrero) && ($this->getMes()==2)) {
            $fechaArmada = "Ese día no existe.";
        } else {
            $fechaArmada = $this->getDia()." de ".$this->getMes()." del ".$this->getAnio();
        }
        return $fechaArmada;
    }

    public function esBisiesto() {
        $bisiesto = (($this->getAnio() % 4) == 4 && ($this->getAnio() % 100) != 0 && ($this->getAnio() % 400) != 0);
        return $bisiesto;     
    }

    public function obtenerDiaFebrero() {
        if ($this->esBisiesto()) {
            $diasFebrero = 29;
        } else {
            $diasFebrero = 28;
        }
        return $diasFebrero;
    }

    public function incremento($entero) {
        for ($i=1; $i<=$entero; $i++) {
            $this->incrementaDia();
        }
    }

    public function incrementaDia() {
        $diaFebrero = $this->obtenerDiaFebrero();
        if (($this->getDia() >= 30) && (($this->getMes()==1) || ($this->getMes()==4) || ($this->getMes()==6) || ($this->getMes()==9) || ($this->getMes()==11))) {
            $this->incrementar_dia_limite();
        } elseif (($this->getDia() >= 31) && (($this->getMes()==3) || ($this->getMes()==5) || ($this->getMes()==7) || ($this->getMes()==8) || ($this->getMes()==10) || ($this->getMes()==12))) {
            $this->incrementar_dia_limite();
        } elseif (($this->getDia() == $diaFebrero) && ($this->getMes() == 2)) {
            $this->incrementar_dia_limite();
        } else {
            $this->setDia($this->getDia() + 1);
        }
        $fechaIncrementada = $this->getDia()." de ".$this->getMes()." del ".$this->getAnio();
        return $fechaIncrementada;
    }
    
    public function incrementar_dia_limite() {
        $this->setDia(1);
        if ($this->getMes() == 12) {
            $this->setMes(1);
            $this->setAnio($this->getAnio() + 1);
        } else {
            $this->setMes($this->getMes() + 1);
        }
    }
}
?>