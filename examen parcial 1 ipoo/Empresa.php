<?php

/*1. Se registra la siguiente información: identificación, nombre y la colección de Viajes que realiza.
2. Método constructor que recibe como parámetros los valores iniciales para los atributos.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase. */



class Empresa{
    private $identificacion;
    private $nombre;
    private $coleccViajes = [];

    public function __construct($idEmpresa, $nameEmpresa, $arrayViajes){
        $this->identificacion = $idEmpresa;
        $this->nombre = $nameEmpresa;
        $this->coleccViajes = $arrayViajes;
        
    }
    


    public function getIdentificacion(){
        return $this->identificacion;
    }

    public function setIdentificacion($idEmpresa){
        $this->identificacion = $idEmpresa;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nameEmpresa){
        $this->nombre = $nameEmpresa;
    }

    public function getColeccViajes(){
        return $this->coleccViajes;
    }

    public function setColeccViajes($arrayViajes){
        $this->coleccViajes = $arrayViajes;
    }

    public function __toString(){
        $coleccionesViajes = $this->mostrarViajes();

        $info="
        IDENTIFICACION DE LA EMPRESA: {$this->getIdentificacion()}
        NOMBRE DE LA EMPRESA:  {$this-> getNombre()}
        COLECCION DE VIAJES:  {$coleccionesViajes}
        ";
        return $info;
        
    }

    public function mostrarViajes(){
        $viagem ="";
        $colexViajes = $this-> getColeccViajes();
        for ($i=0; $i< count($colexViajes);$i++){
            $objViagemcito = $colexViajes[$i];
            $viagem = $viagem . "-----viaje" . ($i);
            $viagem = $viagem . $objViagemcito . "\n";
        }
        return $viagem;

    }
    /*5. Implementar el método darViajeADestino($elDestino) que recibe por parámetro un destino junto a una
cantidad de asientos y retorna una colección con todos los viajes disponibles a ese destino. */

    public function darViajeADestino($elDestino, $cantAsientos){
        $arrayViajecitos = $this->getColeccViajes();
        //$w = 0;
        $salidita = true;
        while ($salidita){
            for ($i=0; $i < count($arrayViajecitos) ; $i++) { 
                $viajeResulta = $arrayViajecitos[$i];
                $destinoResulta = $viajeResulta->getDestino();
                if ($elDestino == $destinoResulta){
                    $arrayDeViagesDestino= [];
                    $arrayDeViagesDestino = $arrayDeViagesDestino . $viajeResulta;
                }
            }

        }
        


    }



/*6. Implementar el método incorporarViaje($objViaje) que recibe como parámetro un viaje, verifica que no
se encuentre registrado ningún otro viaje al mismo destino, en la misma fecha y con el mismo horario de
partida. El método retorna verdadero si la incorporación del viaje se realizó correctamente y falso en caso
contrario.*/ 

    public function incorporarViaje($objViaje){
        $verificarColecViajes = $this-> getColeccViajes();
        $destinoObjViaje = $objViaje->getDestino();
        $fechaObjViaje = $objViaje->getFecha();
        $horarioObjViaje = $objViaje->getHoraPartida();
        $i=0;
        $bandera=true;
        while($bandera){
            $viajeOtro = $verificarColecViajes[$i];
            $destinoViaje = $viajeOtro->getDestino();
            $fechaViaje = $viajeOtro->getFecha();
            $horarioViaje = $viajeOtro->getHoraPartida();
            if($destinoObjViaje == $destinoViaje){
                if($fechaObjViaje == $fechaViaje){
                    if($horarioObjViaje ==  $horarioViaje){
                        $bandera = false;
                    }
                }
            }
            $i++;
        }
        return $bandera;

    }
    

/* 7. Implementar el método venderViajeADestino($canAsientos, $destino) método que recibe por parámetro
la cantidad de asientos y el destino y se registra la asignación del viaje en caso de ser posible. (invocar
al método asignarAsientosDisponibles). El método retorna la instancia del viaje asignado o null en caso
contrario. */     /*SE PREGUNTO A LA PROFE QUE FALTABAN PARAMETROS PRAA CREAR LA CLSE VIAJE PERO ELLA ME EXPLLICO QUE ESTO ERA PARA VERIFICAR SI YA TENGO UN VIAJE HECHO Y QUE SI LA CANTIAD D ASIENTOS
ESTAN DISPONIBLE, INCORPORO ESOS ASIENTOS A VIAJE YA HECHO*/

        public function venderViajeADestino($canAsientos, $destino){
            $arrayViajess= $this->getColeccViajes();
            $c = 0;
            $resultado =true;
            while($resultado){
                $viajeMismo = $arrayViajess[$c];
                $destinyViaje = $viajeMismo->getDestino();
                if($destino == $destinyViaje){
                    $esPosible = $viajeMismo->asignarAsientosDisponibles($canAsientos);
                    if($esPosible){
                        $resultado = $viajeMismo;
                    }
                }else{
                    $resultado = null;
                }
                $c++;
            }


            return $resultado;
        }




/* 8. Implementar el método montoRecaudado que retorna el monto recaudado por la Empresa.
( tener en cuenta los asientos vendidos y el importe del viaje) */

        public function montoRecaudado($asientosVendidos, $viajeImporte){
            $recaudacionTotal = $asientosVendidos * $viajeImporte;
            return $recaudacionTotal;

        }


}