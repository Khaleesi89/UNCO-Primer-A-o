<?php


class Torneo{
    private $identificacion;
    private $colecPartidos;
    private $importePremios;
    private $localidad;

    public function __construct($codigo,$arrayPartidos,$cashPremios,$ciudad){
        $this->colecPartidos = $arrayPartidos;
        $this->importePremios = $cashPremios;
        $this->identificacion = $codigo;
        $this->localidad = $ciudad;
    }
    

    public function getColecPartidos(){
        return $this->colecPartidos;
    }

    public function setColecPartidos($arrayPartidos){
        $this->colecPartidos = $arrayPartidos;
    }

    public function getImportePremios(){
        return $this->importePremios;
    }

    public function setImportePremios($cashPremios){
        $this->importePremios = $cashPremios;
    }

    public function getIdentificacion(){
        return $this->identificacion;
    }

    public function setIdentificacion($codigo){
        $this->identificacion = $codigo;
    }

    public function getLocalidad(){
        return $this->localidad;
    }

    public function setLocalidad($ciudad){
        $this->localidad = $ciudad;
    }

    public function mostrarArrayPartidos(){
        $array = $this->getColecPartidos();
        $mostrar = "";
        for($i=0; $i< count($array);$i++){
            $partido = $array[$i];
            $mostrar .= "----PARTIDO NRO". $i;
            $mostrar .= $partido; 
        }
        return $mostrar;

    }

    public function __toString()
    {
        $partiditos = $this->mostrarArrayPartidos();
        $info = "
        COLECCION DE PARTIDOS: {$partiditos}
        IMPORTE DE PREMIOS: {$this->getImportePremios()}
        CIUDAD : {$this->getLocalidad()}
        ";
        return $info;
    }


    public function ingresarPartido($ObjEquipo1, $ObjEquipo2, $fecha, $tipo){
        $objPartido = null;
        // aca se verifica q la cantidad de jugadores y categoria sean las mismas
        if($ObjEquipo1->getCantJugadores() == $ObjEquipo2->getCantJugadores() && $ObjEquipo1->getObjCategoria() == $ObjEquipo2->getObjCategoria()){
            if($tipo == "Futbol"){
                // el count+1 es para poner el codigo siguiente en el array
                // se pone 0 0 porque la cantidad de goles al inicio de un partido es 0
                $objPartido = new Futbol(count($this->getColecPartidos())+1,$fecha,0,0,$ObjEquipo1,$ObjEquipo2);
                $array = $this->getColecPartidos();
                // el corchete se pone y significa q hace como un array push
                $array[]= $objPartido;
                $this->setColecPartidos($array);
            }
            if($tipo == "Basket"){
                // el count+1 es para poner el codigo siguiente en el array
                // se pone 0 0 porque la cantidad de goles al inicio de un partido es 0
                // el ultimo cero es de las infraccions..q  al iniciar un partido no tienen 
                $objPartido = new Basket(count($this->getColecPartidos())+1,$fecha,0,0,$ObjEquipo1,$ObjEquipo2,0);
                $array = $this->getColecPartidos();
                // el corchete se pone y significa q hace como un array push
                $array[]= $objPartido;
                $this->setColecPartidos($array);
            }

        }
        return $objPartido;
    }

    /* Implementar el método darGanadores($deporte) en la clase Torneo que recibe por parámetro si se trata
    de un partido de futbol o de basquetbol y en base al parámetro busca entre esos partidos los equipos
    ganadores (equipo con mayor cantidad de goles). El método retorna una colección con los objetos de los
    equipos encontrados. */

    public function darGanadores($deporte){
        $arrayGanadores = array();
        foreach($this->getColecPartidos() as $partido){
            if(is_a($partido, $deporte)){
                $arrayGanadores[] = $partido->getGanador();
            }
        }
        return $arrayGanadores;
    }


    /*Implementar el método calcularPremioPartido($OBJPartido) que debe retornar un arreglo asociativo
    donde una de sus claves es ‘equipoGanador’ y contiene la referencia al equipo ganador; y la otra clave
    es ‘premioPartido’ que contiene el valor obtenido del coeficiente del Partido por el importe configurado
    para el torneo. */

    public function calcularPremioPartido($ObjPartido){
        $infoPremio["equipoGanador"] = $ObjPartido->getGanador();
        $infoPremio["premioPartido"] = $ObjPartido->coeficientePartido() * $this->getImportePremios();
        return $infoPremio;
    }


    public function ingresarUnPartido($partido){
        $array  = $this->getColecPartidos();
        $array[] = $partido;
        $this->setColecPartidos($array);
    }

   /* 4.    Implementar el método obtenerEquipoGanadorTorneo() en la clase Torneo que recorre la lista de
            partidos y se queda con aquel equipo que gano mas partidos. El método debe retornar un arreglo
            asociativo con el objeto de la clase Equipo (correspondiente al equipo ganador del torneo) y otra clave
            con la cantidad de goles realizados en todo el torneo. Ayuda: Puede utilizar un arreglo asociativo donde
            almacene cada equipo, la cantidad de partidos ganados y los goles realizados por ese equipo. Luego
            retornar un arreglo asociativo que contenga la instancia del equipo, la cantidad de goles y partidos
            ganados.*/

    public function obtenerEquipoGanadorTorneo(){
        $Lpartidos =$this->getColecPartidos();
        $coleccEquiposGanadores = [];
        foreach ($Lpartidos as $objPartido) {
            $arrayGanador = $objPartido->getGanador();
            if($arrayGanador != null){
                $arrayAsoc = array();
                $arrayAsoc ["objEquipo"] = $arrayGanador["equipo"];
                $arrayAsoc ["CantGanados"] = 1;
                $arrayAsoc ["CantGoles"] = $arrayGanador["goles"];
                array_push($coleccEquiposGanadores,$arrayAsoc);
            }

        }


        
    }


    public function incorporarEquipo($coleccionGanadores,$arregloAsoc){

        foreach ($coleccionGanadores as $arregloGanador){
            $objEquipo = $arregloGanador["objEquipo"];
            $nombre = $objEquipo->getNombre();

        }
        return $coleccionGanadores;
    }




    /* 5.   Implementar el método obtenerPremioTorneo() en la clase Torneo que calcula el premio económico
            que debe ser otorgado al equipo ganador del Torneo Provincial o Nacional. El premio económico es
            otorgado al equipo que ha ganado mas partidos, y si se trata de un torneo Nacional al premio económico
            se adiciona el 10% del monto del premio por la cantidad de partidos ganados. Redefinir el método
            cuando lo considere necesario e invoque al método del punto 4 para obtener el equipo ganador y su
            información.*/

    public function obtenerPremioTorneo(){

    }



   
}