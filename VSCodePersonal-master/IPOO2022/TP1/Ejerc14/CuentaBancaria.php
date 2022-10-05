<?php
    class CuentaBancaria { 
        //Atributos
        private $titular;
        private $documento;
        private $saldoActual;
        private $interesAnual;
    
        //Constructores
        public function __construct($titular, $documento, $saldoActual, $interesAnual) {
            $this->titular = $titular;
            $this->documento = $documento;
            $this->saldoActual = $saldoActual;
            $this->interesAnual = $interesAnual;
        }

        public function Cuenta($saldoActual) {
            $this->setSaldoActual($saldoActual);
        }

        public function saldoCuenta($saldoActual) {
            //$titular = $this->getTitular();
            //Si la cantidad es menor que cero, lo ponemos a cero
            if ($saldoActual < 0) {
                $cantidad = 0;
            } else {
                $cantidad = $saldoActual;
            }
            return $cantidad;
        }
    
        //Métodos de acceso
        public function getTitular() {
            return $this->titular;
        }
        public function getDocumento() {
            return $this->documento;
        }
        public function getSaldoActual() {
            return $this->saldoActual;
        }
        public function getInteresAnual() {
            return $this->interesAnual;
        }

        public function setTitular($titular) {
            $this->titular = $titular;
        }
        public function setDocumento($documento) {
            $this->documento = $documento;
        }
        public function setSaldoActual($saldoActual) {
            $this->saldoActual = $saldoActual;
        }
        public function setInteresAnual($interesAnual) {
            $this->interesAnual = $interesAnual;
        }

        //actualizarSaldo(): actualizará el saldo de la cuenta aplicándole el interés diario (interés anual / 365 --> saldo actual)
        public function actualizarSaldo() {
            $interesAnual = $this->getInteresAnual();
            $saldoActual = $this->getSaldoActual();
            $interesDiario = $interesAnual / 365;
            $actualizacion = $saldoActual * $interesDiario;
            $nuevoSaldo = $saldoActual + $actualizacion;
            return $nuevoSaldo;
        }
        /*
        public function actualizarSaldo($saldo, $interes){
            $saldoActu = $this->getSaldoActual(); //130000
            $intActu = $this->getInteresAnual(); //10 int diaria del 0.027%
            $nuevoSaldo = $saldoActu * ($intActu / 365);
            return $nuevoSaldo;
        }*/

        //depositar($cant): Permite ingresar una cantidad de dinero en la cuenta
        public function depositar($cantidad) {
            $this->setSaldoActual($this->getSaldoActual() + $cantidad);
            return $this->getSaldoActual();
        }
    
        //retirar($cant): Permite sacar una cantidad de dinero de la cuenta (si hay saldo)
        public function retirar($cantidad) {
            if ($this->getSaldoActual() > 0 && $this->getSaldoActual() >= $cantidad) {
                $this->setSaldoActual($this->getSaldoActual() - $cantidad);
                //Si no queda saldo, el saldo actual pasa a ser de 0
                if ($this->getSaldoActual() <= 0) {
                    $this->setSaldoActual(0);
                }
            }
            return $this->getSaldoActual();
        }
    
        //Devuelve el estado de la cuenta
        public function __toString() {
            //return "El titular ".$this->getTitular()." (DNI: ".$this->getDocumento().") tiene $".$this->getSaldoActual()." en la cuenta";
            $datosCuenta = "| Titular: ".$this->getTitular().
                        "\n| DNI: ".$this->getDocumento().
                        "\n| Saldo Inicial: ".$this->getSaldoActual().
                        "\n| Interés Anual: ".$this->getInteresAnual()."\n"; 
            return $datosCuenta;
        }
    }
?>