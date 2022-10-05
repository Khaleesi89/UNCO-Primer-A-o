<?php
class CuentaBancaria {
    private $objPersona;
    private $saldoActual;
    private $interesAnual;

    //Métodos de acceso
    public function getObjPersona() {
        return $this->objPersona;
    }
    public function getSaldoActual() {
        return $this->saldoActual;
    }
    public function getInteresAnual() {
        return $this->interesAnual;
    }

    public function setObjPersona($objPersona) {
        $this->objPersona = $objPersona;
    }
    public function setSaldoActual($saldoActual) {
        $this->saldoActual = $saldoActual;
    }
    public function setInteresAnual($interesAnual) {
        $this->interesAnual = $interesAnual;
    }

    public function __construct($objPersona, $saldoActual, $interesAnual) {
        $this->objPersona = $objPersona;
        $this->saldoActual = $saldoActual;
        $this->interesAnual = $interesAnual;
    }

    public function actualizarSaldo() {
        $saldoActualizado = $this->setSaldoActual(($this->getInteresAnual()/365) + $this->getSaldoActual());
        return $saldoActualizado;
    }

    public function depositar($cantidad) {
        $this->setSaldoActual($this->getSaldoActual() + $cantidad);
        return $this->getSaldoActual();
    }

    public function retirar($cantidad) {
        if ($this->getSaldoActual() >= $cantidad) {
            $this->setSaldoActual($this->getSaldoActual() - $cantidad);
            $alerta = "$".round($this->getSaldoActual());
        } else {
            $alerta = "No hay saldo suficiente.\n";
        }
        return $alerta;
    }

    public function __toString() {
        $objPersona = $this->getObjPersona();
        $cadena = "| Apellido, Nombre del titular: ".$objPersona->getApellido().", ".$objPersona->getNombre()."\n".
                "| Tipo-N° de Documento: ".$objPersona->getTipoDocumento()."-".$objPersona->getDni()."\n".
                "| Saldo actual de la cuenta: $".$this->getSaldoActual()."\n".
                "| Interés anual: ".$this->getInteresAnual()."\n";
        return $cadena;
    }
}
?>