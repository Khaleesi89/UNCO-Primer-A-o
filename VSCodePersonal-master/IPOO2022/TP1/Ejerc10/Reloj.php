<?php

class Reloj {
    //Declaración de atributos (private)
    private $segundos;
    private $minutos;
    private $horas;

    //Sección del método constructor
    public function __construct($segundos, $minutos, $horas) {
        $this->segundos=$segundos;
        $this->minutos=$minutos;
        $this->horas=$horas;
    }
    //Sección de métodos get
    public function getSegundos() {
        return $this->segundos;
    }
    public function getMinutos() {
        return $this->minutos;
    }
    public function getHoras() {
        return $this->horas;
    }
    //Sección de métodos set
    public function setSegundos($segundos) {
        $this->segundos=$segundos;
    }
    public function setMinutos($minutos) {
        $this->minutos=$minutos;
    }
    public function setHoras($horas) {
        $this->horas=$horas;
    }

    public function puestaCero() {
        $this->setSegundos(00);
        $this->setMinutos(00);
        $this->setHoras(00);
    }
        
    public function incremento() {
        do {
            if ($this->getHoras() == 23 && $this->getMinutos() == 59 && $this->getSegundos() == 59) {
                $this->puestaCero();
                echo "\n| ".$this->getHoras().":".$this->getMinutos().":".$this->getSegundos();
            } else {
                if ($this->getMinutos() >= 59 && $this->getSegundos() >= 59) {
                    $this->setHoras($this->getHoras() + 1);
                    $this->setMinutos(00);
                }
                //Si los segundos llegan a 59, se suma un minuto
                if ($this->getSegundos() >= 59) {
                    $this->setMinutos($this->getMinutos() + 1);
                }
                //Si los segundos llegan a 59, se resetean a 0
                if ($this->getSegundos() >= 59) {
                    $this->setSegundos(00);
                } else {
                    //Se suman segundos hasta que lleguen a 59
                    $this->setSegundos($this->getSegundos() + 1);
                }
                $horas = $this->getHoras();
                $minutos = $this->getMinutos();
                $segundos = $this->getSegundos();
                echo "$horas:$minutos:$segundos\n";
            }
        } while ($horas = 24);
    }

    //Método __toString
    public function __toString() {
        return "\n| ".$this->getHoras().":".$this->getMinutos().":".$this->getSegundos();
    }
}