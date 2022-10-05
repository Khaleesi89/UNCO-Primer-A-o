<?php

include "Cuota.php";
include "Prestamo.php";

class Financiera{
/* 1. Se registra la siguiente información: denominación, dirección y la colección de prestamos otorgados.*/ 

//ATRIBUTOS//
private $denominacion;
private $direccion;
private $colecPrestamosOtorgados=[];

/*2. Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase 
denominación, dirección.*/ 

//CONSTRUCTOR//

public function __construct($denom, $direxion){
    $this->denominacion = $denom;
    $this->direccion = $direxion;
}

/*3. Los métodos de acceso para  cada una de las variables instancias de la clase. */

public function getDireccion(){
    return $this->direccion;
}

public function setDireccion($direxion){
    $this->direccion = $direxion;
}

public function getDenominacion(){
    return $this->denominacion;
}

public function setDenominacion($denom){
    $this->denominacion = $denom;
}

public function getColecPrestamosOtorgados(){
    return $this->colecPrestamosOtorgados;
}

public function setColecPrestamosOtorgados($collecCuotas){
    $this->colecPrestamosOtorgados = $collecCuotas;
}



/*4. Redefinir el método _toString  para que retorne la información de los atributos de la clase. */

public function __toString(){
    $info = "
    DENOMINACIÓN: {$this->getDenominacion()} \n;
    DIRECCIÓN: {$this->getDireccion()} \n;
    COLECCION DE PRESTAMOS OTORGADOS: {$this->getColecPrestamosOtorgados()}\n";
    return $info;
}

/*5. Implementar  el método incorporarPrestamo  que recibe por parámetro un nuevo préstamo. */ 

    public function incorporarPrestamo($objPrestamo){

    $arrayPepito = $this->getColecPrestamosOtorgados();
       array_push($arrayPepito, $objPrestamo);
       $this->setColecPrestamosOtorgados($arrayPepito);      
        
    }

/*6. Implementar el método otorgarPrestamoSiCalifica, método que recorre la lista de prestamos que no 
han sido generadas sus cuotas. Por cada préstamo, se corrobora que su monto dividido la cantidad_de_cuotas
no supere  el 40 % del neto del solicitante, si la verificación es satisfactoria se invoca al método otorgarPrestamo.*/  

    public function otorgarPrestamosSiCalifica(){
        $arrayPrestamos = $this->getColecPrestamosOtorgados();
        for ($i=0; $i < count($arrayPrestamos); $i++) { 
            $presta1= $arrayPrestamos[$i];
             $colecCuotitas= $presta1->getColeccionCuotas();
             if(count($colecCuotitas)==0){//me encuentro un prestamos que no esta otorggado
                $objpersona= $presta1->getPersona();
                $cuotas = $presta1->getCantDeCuotas();
                $monto = $objpersona->getNeto();
                if((($monto/100)*40) > (($monto/$cuotas))){
                        $presta1->otorgarPrestamo();
                        array_push($arrayPrestamos,$presta1);
                        $this->setColecPrestamosOtorgados($arrayPrestamos);

                }


             } 
        }
}

/*7. Implementar el método informarCuotaPagar(idPrestamo) que recibe por parámetro la identificación del préstamo, se busca 
el préstamo en la colección de prestamos y si es encontrado se obtiene la siguiente cuota a pagar. El método debe retornar la 
referencia a  la cuota. Utilizar para su implementación el método darSiguienteCuotaPagar */

    public function informarCuotaPagar($idPrestamo){
        $arrayParaBuscar = $this->getColecPrestamosOtorgados();
        foreach ($arrayParaBuscar as $key => $value){
            $objPrestamito = $value;
            $identificador = $objPrestamito->getIdentificacion();
            if($identificador==$idPrestamo){
                $cuotaApagar = $objPrestamito->darSiguienteCuotaPagar();
                return $cuotaApagar;
            }
        }
    }
}