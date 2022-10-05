<?php

class CuentaBancaria{
    private $nroCuenta;
    private $dniCliente;
    private $saldoActual;
    private $interesAnual;




    public function __construct($idCuenta,$idCliente,$cashDisponible,$interesCuenta){
        $this->nroCuenta = $idCuenta;
        $this->dniCliente = $idCliente;
        $this->saldoActual = $cashDisponible;
        $this->interesAnual = $interesCuenta;
    }   


    

    public function getNroCuenta(){
        return $this->nroCuenta;
    }

    public function setNroCuenta($idCuenta){
        $this->nroCuenta = $idCuenta;
    }

    public function getDniCliente(){
        return $this->dniCliente;
    }

    public function setDniCliente($idCliente){
        $this->dniCliente = $idCliente;
    }

    public function getSaldoActual(){
        return $this->saldoActual;
    }

    public function setSaldoActual($cashDisponible){
        $this->saldoActual = $cashDisponible;
    }

    public function getInteresAnual(){
        return $this->interesAnual;
    }

    public function setInteresAnual($interesCuenta){
        $this->interesAnual = $interesCuenta;
    }


    public function actualizarSaldo(){
        //actualizará el saldo de la cuenta aplicándole el interés diario (interés anual dividido entre 365 aplicado al saldo actual).
        $saldoHoy = $this->getSaldoActual();
        $intAnual = $this->getInteresAnual();
        $interesDiario = $intAnual / 365;
        $totalDelDia = $saldoHoy*$interesDiario;
        return $totalDelDia;
    }

    public function depositar($cant){
        //permitirá ingresar una cantidad de dinero en la cuenta.
        $saldo = $this->getSaldoActual();
        $saldoResultante = $saldo + $cant;
        return $saldoResultante;
    }

    public function retirar($cant){
        //permitirá retirar una cantidad de dinero en la cuenta.
        $saldo = $this->getSaldoActual();
        $saldoResultante = $saldo - $cant;
        return $saldoResultante;

    }

    public function __toString(){
        $info = "
        NUMERO DE CUENTA: {$this->getNroCuenta()}
        NUMERO DE DNI:  {$this->getDniCliente()}
        SALDO ACTUAL:  {$this->getSaldoActual()}
        TAZA DE INTERES ANUAL:  {$this->getInteresAnual()}
        ";
        return $info;
        
    }

}