<?php
/** Desarrollar una clase Cafetera con los atributos capacidadMaxima (la cantidad máxima de café que puede
* contener la cafetera) y cantidadActual (la cantidad actual de café que hay en la cafetera). Implementar los
* siguientes métodos:
* a) Método constructor __construct() que recibe como parámetros los valores iniciales para los atributos de la clase.
* b) Los método de acceso de cada uno de los atributos de la clase.
* c) llenarCafetera(): la cantidad actual debe ser igual a la capacidad de la cafetera.
* d) servirTaza($cantidad): simula la acción de servir una taza con la capacidad indicada. Si la cantidad actual de café
* “no alcanza” para llenar la taza, se sirve lo que quede y se envía un mensaje al consumidor para que sepa porque no se
* le sirvió un taza completa.
* e) vaciarCafetera(): pone la cantidad de café actual en cero.
* f) agregarCafe($cantidad): añade a la cafetera la cantidad de café indicada.
* g) Redefinir el método __toString() para que retorne la información de los atributos de la clase.
* h) Crear un script Test_Cafetera que cree un objeto Cafetera e invoque a cada uno de los métodos implementados.
*/

class Cafetera {
    private $capacidadMaxima;
    private $cantidadActual;

    //Métodos de acceso
    public function getCapacidadMaxima() {
        return $this->capacidadMaxima;
    }
    public function setCapacidadMaxima($capacidad) {
        $this->capacidadMaxima = $capacidad;
        return $this;
    }

    public function getCantidadActual() {
        return $this->cantidadActual;
    }
    public function setCantidadActual($cantActual) {
        $this->cantidadActual = $cantActual;
        return $this;
    }

    //Métodos
    public function __construct($capacidad, $cantActual) {
        $this->capacidadMaxima=$capacidad;
        $this->cantidadActual=$cantActual;
    }

    //llenarCafetera(): La cantidad actual debe ser igual a la capacidad de la cafetera.
    public function llenarCafetera() {
        //$cantidadActual == $capacidadMaxima
        if ($this->getCantidadActual() <= $this->getCapacidadMaxima()) {
            $cafetera = $this->setCapacidadMaxima($this->getCantidadActual());
        }
        return $cafetera;
    }

    //servirTaza($cantidad): Simula la acción de servir una taza con la capacidad indicada. Si la cantidad actual de café “no alcanza” para llenar la taza,
    //se sirve lo que quede y se envía un mensaje al consumidor para que sepa porque no se le sirvió un taza completa.
    public function servirTaza($cantidad) {
        if ($this->getCantidadActual() < $cantidad) {
            echo "| Cantidad de café disponible: ".$this->getCantidadActual()."\n";
            echo "| Cantidad de café pedido: ".$cantidad."\n";
            echo "  + Disculpe. El café no es suficiente para llenar su taza.\n";
            $taza = $this->getCantidadActual();
        }
        return $taza;
    }

    //vaciarCafetera(): Pone la cantidad de café actual en cero.
    public function vaciarCafetera() {
        if ($this->getCantidadActual() == 0) {
            $cafetera = $this->setCantidadActual($this->getCantidadActual(0));
        }
        return $cafetera;
    }

    //agregarCafe($cantidad): Añade a la cafetera la cantidad de café indicada.
    public function agregarCafe($cantidad) {
        if ($cantidad > $this->getCapacidadMaxima()) {
            echo "| Cantidad de café que quiere agregar: ".$cantidad."\n";
            echo "  + ERROR. Supera la capacidad de la cafetera.\n";
            $cafetera = $this->getCantidadActual();
        } elseif (($cantidad + $this->getCantidadActual()) > $this->getCapacidadMaxima()) {
            echo "  + ERROR. Supera el límite de la cafetera.\n";
            $cafetera = $this->getCantidadActual();
        } else {
            $cafetera = $this->setCantidadActual($this->getCantidadActual() + $cantidad);
        }
        return $cafetera;
    }

    public function __toString() {
        return "| Capacidad Máxima: ".$this->getCapacidadMaxima()." - Cantidad Actual: ".$this->getCantidadActual()."\n";
    }
}