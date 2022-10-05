
<?php


class Terminal{
    private $denominacion;
    private $direccion;
    private $coleccionEmpresas;


    public function __construct($nombre,$address,$arrayEmpresasOBJ){
        $this->denominacion = $nombre;
        $this->direccion = $address;
        $this->coleccionEmpresas = $arrayEmpresasOBJ;

        
    }

    public function getDenominacion(){
        return $this->denominacion;
    }

    public function setDenominacion($nombre){
        $this->denominacion = $nombre;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function setDireccion($address){
        $this->direccion = $address;
    }

    public function getColeccionEmpresas(){
        return $this->coleccionEmpresas;
    }

    public function setColeccionEmpresas($arrayEmpresasOBJ){
        $this->coleccionEmpresas = $arrayEmpresasOBJ;
    }

    public function __toString()
    {
        $array = $this->getColeccionEmpresas();
        $string= $this->mostrarEmpresas($array);
        $info="
        -----TERMINAL------
        DENOMINACION: {$this->getDenominacion()}
        DIRECCION: {$this->getDireccion()}
        EMPRESAS: $string
        ";
        return $info;
    }


    /*FALTA FUNCION PARA MOSTRAR LAS EMPRESAS */
   
    public function mostrarEmpresas($arrayCompleto){
        $stringObj = "";
        foreach ($arrayCompleto as $key) {
           
            $stringObj = " " .$key;
        }
        return $stringObj;
    }


   /* 5. Implementar el método darViajeMenorValor() recorre cada una de las empresas vinculadas a la terminal
    y retorna una colección de objetos de viaje. Cada viaje es el de menor valor dentro de la colección de
    viajes de esa empresa. */ 

    public function darViajeMenorValor(){
        $empresasArray = $this->getColeccionEmpresas();
        $a = count($empresasArray);
        $coleccMenorValor = null;
        $salida = true;
        $i = 0;
        $menorValor = 10000000;
        while($salida && $i < $a){
            $empresa = $empresasArray [$i];
            $viajes = $empresa->getColeccViajes();
            $tot = count($viajes);
            for ($i=0; $i < $tot ; $i++) { 
               $viaje = $viajes[$i];
               $importe = $viaje->importeTotal();
               if($menorValor > $importe){
                   $menorValor = $importe;
                   $coleccMenorValor = $viaje;
               }else{
                $salida = false;
               }
                $i++;
            }
        }
        return $coleccMenorValor;
    }



     /*AGREGA VIAJES A LA COLECCION */

     public function empresasAgregar($empresa){
        $colec = $this->getColeccionEmpresas();
        array_push($colec,$empresa);
        $this->setColeccionEmpresas($colec);


    }

}