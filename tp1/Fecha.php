<?php

/* Diseñar e implementar la clase Fecha.*/
/*La clase deberá disponer de los atributos mínimos y necesarios
para almacenar el día, el mes y el año, además de métodos que devuelvan un String con la fecha en forma
abreviada (16/02/2000) y extendida (16 de febrero de 2000) . Implementar una función incremento, que
reciba como parámetros un entero y una fecha, que retorne una nueva fecha, resultado de incrementar la
fecha recibida por parámetro en el numero de días definido por el parámetro entero.
Nota 1: Son años bisiestos los múltiplos de cuatro que no lo son de cien, salvo que lo sean de
cuatrocientos, en cuyo caso si son bisiestos.
Nota 2: Para la solución de este problema puede ser útil definir un método <incrementa_un_dia */

class Fecha{
    private $dia;
    private $mes; 
    private $anio;

    public function __construct($day, $month,$year){
        $this->dia = $day;
        $this->mes = $month;
        $this->anio = $year;
    }
    

    public function getDia(){
    return $this->dia;
    }
    public function setDia($day){
    $this->dia = $day;
    }

    public function getMes(){
    return $this->mes;
    }
    public function setMes($month){
    $this->mes = $month;
    }
    public function getAnio(){
    return $this->anio;
    }
    public function setAnio($year){
    $this->anio = $year;
    }


    public function concatenacionFechas(){
        $fechaConcatenada= $this->getDia() ."/". $this->getMes() ."/". $this->getAnio();
        return $fechaConcatenada;
    }

    public function stringFecha(){
        $monthMes = $this->getMes();
        $dayDay=$this->getDia();
        $anioCorre= $this->getAnio();
        //while($monthMes<=12){
            if ($monthMes ==1){
                $mesecito = "Enero";
            }elseif ($monthMes ==2){
                $mesecito = "Febrero";
            }elseif ($monthMes ==3){
                $mesecito = "Marzo";
            }elseif ($monthMes ==4){
                $mesecito = "Abril";
            }elseif ($monthMes ==5){
                $mesecito = "Mayo";
            }elseif ($monthMes ==6){
                $mesecito = "Junio";
            }elseif ($monthMes ==7){
                    $mesecito = "Julio";
            }elseif ($monthMes ==8){
                $mesecito = "Agosto";
            }elseif ($monthMes ==9){
                $mesecito = "Septiembre";
            }elseif ($monthMes ==10){
                $mesecito = "Octubre";
            }elseif ($monthMes ==11){
                $mesecito = "Noviembre";
            }else{
                $mesecito = "Diciembre";
            }
            
    //} 
        $anioExten= "$dayDay de $mesecito de $anioCorre";
        return $anioExten;
    }

    //porque no me concatena la fecha// error linea 83 y 92
    //que signifca cuando la variable month,dayDay y la de año son tipo de archivo mixed...q es eso???

    public function incrementaUnDia(){
        
    }


    public function __toString(){
        $fechaAbrev = $this->concatenacionFechas();
        $fechExtendidita= $this->stringFecha();
       
        $stringFechas = "
        FECHA EXTENDIDA: $fechExtendidita;
        FECHA ABREVIADA: $fechaAbrev;
        ";
        return $stringFechas;
    }


}


