<?php
include_once("tateti.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* ... COMPLETAR ... */
/*$datos[0]= array('apellido' => 'Klimisch',
                   'nombrePila' => 'Marcia Leonela',
                   'legajo' => 'FAI-3573',
                   'carrera' => 'TUDW',
                   'mail' => 'marcia.klimisch@est.fi.uncoma.edu.ar',
                   'github' => 'Khaleesi89'
                   );
  $datos[1]= array('apellido' => 'Duarte',
                   'nombrePila' => 'Micaela Florencia',
                   'legajo' => 'FAI-3252',
                   'carrera' => 'TUDW',
                   'mail' => 'micaela.duarte@est.fi.uncoma.edu.ar',
                   'github' => 'micaeladuarte'
                   );
  $datos[2]= array('apellido' => 'Hitter',
                   'nombrePila' => 'Maximiliano Ariel',
                   'legajo' => 'FAI-3523',
                   'carrera' => 'TUDW',
                   'mail' => 'maximiliano.hitter@est.fi.uncoma.edu.ar',
                   'github' => 'MaximilianoHitter'
                   );

    Klimisch, Marcia Leonela. FAI-3573. TUDW. marcia.klimisch@est.fi.uncoma.edu.ar. Khaleesi89.
    Duarte, Micaela Florencia. FAI-3252. TUDW. micaela.duarte@est.fi.uncoma.edu.ar. micaeladuarte.
    Hitter, Maximiliano Ariel. FAI-3523. TUDW. maximiliano.hitter@est.fi.uncoma.edu.ar. MaximilianoHitter. 
*/
 
/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/
/** Función para cargar juegos, esta función se usa, al inicio del programa para cargar una colección de juegos (1)
 * @param void
 * @return array
 */
function cargarJuegos()
{
    /*esta usa otras funciones, como la función (5) agregarJuego
    array $juntarColeccion, $unJuego
    */
$juntarColeccion=[];

$jg1 = ["jugadorCruz" => "AMARILIS", "jugadorCirculo" => "MILOS",    "puntosCruz" => 1, "puntosCirculo" => 1];
$jg2 = ["jugadorCruz" => "ZENDA",    "jugadorCirculo" => "AMARILIS", "puntosCruz" => 3, "puntosCirculo" => 0];
$jg3 = ["jugadorCruz" => "ZENDA",    "jugadorCirculo" => "MILOS",    "puntosCruz" => 0, "puntosCirculo" => 4];
$jg4 = ["jugadorCruz" => "CALIXTO",  "jugadorCirculo" => "TRUMAN",   "puntosCruz" => 1, "puntosCirculo" => 1];
$jg5 = ["jugadorCruz" => "AMARILIS", "jugadorCirculo" => "MILOS",    "puntosCruz" => 5, "puntosCirculo" => 0];
$jg6 = ["jugadorCruz" => "FEDORA",   "jugadorCirculo" => "CALIXTO",  "puntosCruz" => 0, "puntosCirculo" => 3];
$jg7 = ["jugadorCruz" => "TRUMAN",   "jugadorCirculo" => "AMARILIS", "puntosCruz" => 4, "puntosCirculo" => 0];
$jg8 = ["jugadorCruz" => "CALIXTO",  "jugadorCirculo" => "TRUMAN",   "puntosCruz" => 1, "puntosCirculo" => 1];
$jg9 = ["jugadorCruz" => "TRUMAN",   "jugadorCirculo" => "FEDORA",   "puntosCruz" => 2, "puntosCirculo" => 0];
$jg10= ["jugadorCruz" => "MILOS",    "jugadorCirculo" => "ZENDA",   "puntosCruz" => 1, "puntosCirculo" => 1];

array_push($juntarColeccion, $jg1, $jg2, $jg3, $jg4, $jg5, $jg6, $jg7, $jg8, $jg9, $jg10);

    return $juntarColeccion;
}

/** Funcion para seleccionar opcion, esta función se encarga de presentar por pantalla las opciones del switch y validar lo ingresado(2)
 * @param void
 * @return int
 */
function seleccionarOpcion()
{
    /*Se utiliza la siguiente función (3) para validar el dato ingresado
    int $val1, $val2, $numerito
    */
    echo "1) Jugar al tateti.\n";
    echo "2) Mostrar un juego.\n";
    echo "3) Mostrar el primer juego ganador.\n";
    echo "4) Mostrar porcentaje de juegos ganados.\n";
    echo "5) Mostrar resumen de Jugador.\n";
    echo "6) Mostrar listado de juegos Ordenado por jugador O.\n";
    echo "7) Salir.\n";
    $val1 = 1;
    $val2 = 7;
    $numerito = validarValor($val1, $val2);
    return $numerito;
}

/** Funcion para pedir número en un rango y validarlo, se pasan los valores del rango por parametro y dentro de la funcion se le pide al usuario (3)
 * @param int $valor1
 * @param int $valor2
 * @return int
 */
function validarValor($valor1, $valor2)
{
    /* int $seleccion
     */
    echo "Ingrese un número entre el " . $valor1 . " y el " . $valor2 . "\n";
    $seleccion = trim(fgets(STDIN));
    while (($seleccion > $valor2 || $seleccion < $valor1) && !is_numeric($seleccion)) {
        echo "Número inválido, debe estar entre " . $valor1 . " y el " . $valor2 . "\n";
        $seleccion = trim(fgets(STDIN));
    }
    return $seleccion;
}

/** Funcion para mostrar el juego buscado, se ingresa un int y un array por parametro y se muestra $array[$int] por pantalla (4)
 * @param int $num
 * @param array $juegos
 * @return void
 */
function mostrarJuego($num, $juegos)
{
    
    if($juegos[$num]['puntosCruz'] > $juegos[$num]['puntosCirculo']){
        echo "***********************************\n";
        echo "Juego TATETI: " . $num . " (gano X)\n";
        echo "Jugador X: " . $juegos[$num]['jugadorCruz'] . " obtuvo " . $juegos[$num]['puntosCruz'] . " puntos\n";
        echo "Jugador O: " . $juegos[$num]['jugadorCirculo'] . " obtuvo " . $juegos[$num]['puntosCirculo'] . " puntos\n";
        echo "***********************************\n";
    }elseif($juegos[$num]['puntosCirculo'] > $juegos[$num]['puntosCruz']){
        echo "***********************************\n";
        echo "Juego TATETI: " . $num . " (gano O)\n";
        echo "Jugador X: " . $juegos[$num]['jugadorCruz'] . " obtuvo " . $juegos[$num]['puntosCruz'] . " puntos\n";
        echo "Jugador O: " . $juegos[$num]['jugadorCirculo'] . " obtuvo " . $juegos[$num]['puntosCirculo'] . " puntos\n";
        echo "***********************************\n";
    }else{
        echo "***********************************\n";
        echo "Juego TATETI: " . $num . " (empate)\n";
        echo "Jugador X: " . $juegos[$num]['jugadorCruz'] . " obtuvo " . $juegos[$num]['puntosCruz'] . " puntos\n";
        echo "Jugador O: " . $juegos[$num]['jugadorCirculo'] . " obtuvo " . $juegos[$num]['puntosCirculo'] . " puntos\n";
        echo "***********************************\n";
    }
}

/** Funcion para agregar juego, se pasa por parametro un array de coleccion y un array de juego y se añade el juego a la ultima posicion de la coleccion (5) 
 * @param array $coleccion
 * @param array $seleccionado
 * @return array
 */
function agregarJuego($coleccion, $seleccionado)
{
    if (count($coleccion) > 0) {
        $coleccion[count($coleccion)] = $seleccionado;
    } else {
        $coleccion[0] = $seleccionado;
    }
    return $coleccion;
}


/** Funcion para obtener primer juego ganado, se pasa por parametro una coleccion y un nombre, y se devuelve la posicion del array donde se encontro como ganador ese nombre (6)
 * @param array $todosJuegos
 * @param string $nombreJugador
 * @return int
 */
function primerGanado($todosJuegos, $nombreJugador)
{
    /*retornar número de indice del jugador que gano o sino retornar -1
    int $cont, $numGanador
    boolean $flag1
    */
    $cont = 0;
    $flag1 = false;
    $numGanador = -1;
    do{
        if ($nombreJugador == $todosJuegos[$cont]['jugadorCruz'] && ($todosJuegos[$cont]['puntosCruz'] > $todosJuegos[$cont]['puntosCirculo'])) {
            $flag1 = true;
            $numGanador = $cont;
        }elseif($nombreJugador == $todosJuegos[$cont]['jugadorCirculo'] && ($todosJuegos[$cont]['puntosCirculo'] > $todosJuegos[$cont]['puntosCruz'])){
            $flag1 = true;
            $numGanador = $cont;
        }
        $cont++;
    }while(($cont < (count($todosJuegos))) && !$flag1);

    return $numGanador;

}


/** Funcion para obtener resumen, se pasa por parametro la coleccion y el nombre y se muestran todos los datos de ese nombre (7)
 * @param array $todosLosJuegos
 * @param string $nombreResumen
 * @return array
 */


function resultadosObtener ($todosLosJuegos, $nombreResumen)
{
    $umbral = count($todosLosJuegos);
    $resumenPorJugador = [
        'nombre' => $nombreResumen,
        'juegosGanados' => 0,
        'juegosPerdidos' => 0,
        'juegosEmpatados' => 0,
        'puntosTotales' => 0
    ];
    for ($i = 0; $i<$umbral; $i++){
        $jugadorX = $todosLosJuegos[$i]['jugadorCruz'];
        $jugadorO = $todosLosJuegos[$i]['jugadorCirculo'];
        $puntosX = $todosLosJuegos[$i]['puntosCruz'];
        $puntosO = $todosLosJuegos[$i]['puntosCirculo'];

        if (($jugadorX == $nombreResumen) || ($jugadorO == $nombreResumen)) {
            if ($puntosX == $puntosO) {
                $resumenPorJugador['juegosEmpatados']++;
                $resumenPorJugador['puntosTotales'] = $resumenPorJugador['puntosTotales'] + $puntosO;
            }
        }elseif ($jugadorX == $nombreResumen) {
            if ($puntosX > $puntosO) {
                $resumenPorJugador['juegosGanados']++;
                $resumenPorJugador['puntosTotales'] = $resumenPorJugador['puntosTotales'] + $puntosX;
            }else {
                $resumenPorJugador['juegosPerdidos']++;
                $resumenPorJugador['puntosTotales'] = $resumenPorJugador['puntosTotales'] + $puntosX;
            }
        }elseif ($jugadorO = $nombreResumen) {
            if ($puntosO > $puntosX){
                $resumenPorJugador['juegosGanados']++;
                $resumenPorJugador['puntosTotales'] = $resumenPorJugador['puntosTotales'] + $puntosO;
            }else{
                $resumenPorJugador['juegosPerdidos']++;
                $resumenPorJugador['puntosTotales'] = $resumenPorJugador['puntosTotales'] + $puntosO;
            }
        }
    }
    return $resumenPorJugador;

}


/** Funcion pedir valor de simbolo, validarlo y devolverlo (8)
 * @param void
 * @return string
 */
function obtenerSimbolo()
{
    /*pedir simbolo, validarlo y devolverlo
    boolean $validado
    string $simbol
    */
    echo "Por favor ingrese un símbolo, sea X o O:\n";
    $validado = true;
    $simbol = trim(fgets(STDIN));
    $simbol = strtoupper($simbol);
    while ($validado) {
        if ($simbol == "X") {
            $validado = false;
        } elseif ($simbol == "O") {
            $validado = false;
        } else {
            echo "Ingrese un caracter válido: \n";
            $simbol = trim(fgets(STDIN));
            $simbol = strtoupper($simbol);
        }
    }
    return $simbol;
}


/** Función retornar juegos ganados/perdidos, se pasa por parametro la coleccion de juegos (9)
 * @param array $muchosJuegos
 * @return int
 */
function obtenerGanados($muchosJuegos)
{
    /*Devolver cantidad de juegos ganados
    int $ganados, $t
    */
    $ganados = 0;
    for ($t = 0; $t < count($muchosJuegos); $t++) {
        if ($muchosJuegos[$t]['puntosCruz'] !=1 && $muchosJuegos[$t]['puntosCirculo'] !=1) {
            $ganados++;
        }
    }
    return $ganados;
}

/** Función para obtener la cantidad de ganados segun un simbolo (10)
 * @param array $pocosJuegos
 * @param string $simboloElegido
 * @return int
 */
function ganadosSegunSimbolo($pocosJuegos, $simboloElegido)
{
    /*devuelve la cantidad de juegos ganados segun simbolo
    int $contadorX, $contadorO, $numeroSimbolo, $j
    */
    $contadorX = 0;
    $contadorO = 0;
    for ($j = 0; $j < count($pocosJuegos); $j++) {
        if ($pocosJuegos[$j]['puntosCruz'] > $pocosJuegos[$j]['puntosCirculo']) {
            $contadorX++;
        } elseif ($pocosJuegos[$j]['puntosCirculo'] > $pocosJuegos[$j]['puntosCruz']) {
            $contadorO++;
        }
    }
    if ($simboloElegido == "X") {
        $numeroSimbolo = $contadorX;
    } elseif ($simboloElegido == "O") {
        $numeroSimbolo = $contadorO;
    }
    return $numeroSimbolo;
}

/** Función de comparación para uasort, esta función toma los parametros pasados por la función uasort, los compara y devuelve 0, 1 o -1
 * @param array $a
 * @param array $b
 * @return int
*/
function cmp($a,$b)
{
    //int $comparador
    $comparador = 0;
    if ($a['jugadorCirculo'] < $b['jugadorCirculo']){
        $comparador = -1;
    }elseif ($b['jugadorCirculo'] < $a['jugadorCirculo']){
        $comparador = 1;
    }
    return $comparador;
}


/** Función para obtener los juegos del jugador O (11)
 * @param array $algunosJuegos
 * @return void
 */
function juegosOrdenadosDeO($algunosJuegos){
    //Ordenar y mostrar los juegos ordenados por el nombre del jugador O
    /* La función uasort sirve para ordenamiento de arrays, se le pasan como parámetro un array y el nombre de una función que realice la
    debida comparación. Dentro de la función se debe hacer referencia a qué campos del array se desean comparar, y una vez realizada la comparación,
    la función retorna 0 si ambos campos son iguales (nuestra función compara qué string es mayor), -1 si el segundo campo es mayor y 1 si el primer 
    campo es mayor, y la funcion uasort obtiene ese parámetro y decide si mantener el orden de estos dos campos o modificarlo. */

    /**La función print_r se utiliza para mostrar por pantalla el contenido de arrays, sería similar a armar una estructura como un for/foreach para 
    mostrar dicho array(si fuese indexado), pero la función print_r realiza la impresión de cada linea del array sin necesidad de pasar como parámetro 
    el index o campo asociativo a mostrar 
    */


    /**DESCRIPCION DE LA FUNCION uasort SEGUN EL MANUAL DE PHP */

    /** uasort : ordena una matriz con una función de comparación definida por el usuario y mantiene la asociación de índices. Ordena arrayen su lugar de 
     * modo que sus claves mantengan su correlación con los valores con los que están asociados, utilizando una función de comparación definida por el usuario. 
     * Esto se utiliza principalmente al ordenar matrices asociativas donde el orden real de los elementos es significativo.
     * PARAMETROS:
                    * array : La matriz de entrada
                    *callback: La función de comparación debe devolver un número entero menor, igual o mayor que cero si el primer argumento se considera
                    *respectivamente menor, igual o mayor que el segundo.
     * VALORES:
                    * Siempre vuelve true.
     */
        /**DESCRIPCION DE LA FUNCION print_r SEGUN EL MANUAL DE PHP */

    /** print_r : imprime información legible por humanos sobre una variable.
     * PARAMETROS: 
                    * value: La expresión que se imprimirá 
     */
    uasort($algunosJuegos, 'cmp');
    print_r($algunosJuegos);
    /*foreach ($algunosJuegos as $key => $value) {
        mostrarJuego($key, $algunosJuegos);
    }*/
}

/** Funcion para validar si el usuario ingresado existe 
 * @param string $nombreJugadorResum
 * @param array $completoJuegos
 * @return boolean

*/

function comprobarJugador ($nombreJugadorResum, $completoJuegos){

    $respuestaJugador = in_array($nombreJugadorResum, $completoJuegos);
    return $respuestaJugador;
}





/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

/** Declaración de variables: */
/** Array $juego, $jugados, $jugadosCrudo
* int $numJuego, $i, $opcion, $j, $cont, $valorUno , $valorDos ,$soloGyP, $cantGanadosSimbol, $l,
* string $nombreGanador , $simbolo, $jugadorResumen, 
* boolean $flag, $salir,  $bandera, 
* float $promedioSimbolo, 
*/
/** Inicialización de variables: */
$jugadosCrudo = [];
$juego = [];
$salir = true;

/** Proceso: */
$jugadosCrudo = cargarJuegos();
/**Switch para la botonera o menu selector */

do {
    $opcion = seleccionarOpcion();

    switch ($opcion) {
        case 1:
            /**Jugar tateti */
            $juego = jugar();
            imprimirResultado($juego);
            /** Guardar resultado en crudo*/
            $jugadosCrudo = agregarJuego($jugadosCrudo, $juego);
            break;
        case 2:
            /** Mostrar un juego*/
            if (count($jugadosCrudo) > 0) {
                echo "Ingrese el número de juego que desea ver: \n";
                $valorUno = 0;
                $valorDos = (count($jugadosCrudo)-1);
                $numJuego = validarValor($valorUno, $valorDos);
                /** Mostrar el juego pedido */
                mostrarJuego($numJuego, $jugadosCrudo);
            } else {
                echo "No hay ningún juego registrado.\n";
            }
            break;
            case 3:
                /** Mostrar el primer juego ganador*/
                if (count($jugadosCrudo) > 0) {
                    echo "Ingrese el nombre del Jugador a buscar: ";
                    $nombreGanador = trim(fgets(STDIN));
                    $nombreGanador = strtoupper($nombreGanador);
                    $numeroDeGanador = primerGanado($jugadosCrudo, $nombreGanador);
                    if ($numeroDeGanador >= 0) {
                        mostrarJuego($numeroDeGanador, $jugadosCrudo);
                    } else {
                        echo "El jugador " . $nombreGanador . " no ha ganado ningún juego.\n";
                    }
                } else {
                    echo "No hay ningún juego registrado.\n";
                }
                break;
            case 4:
                /** Mostrar porcentaje de juegos ganados*/ 
                if (count($jugadosCrudo) > 0) {
                    $simbolo = obtenerSimbolo();
                    $soloG = obtenerGanados($jugadosCrudo);
                    $cantGanadosSimbol = ganadosSegunSimbolo($jugadosCrudo, $simbolo);
                    $promedioSimbolo = ($cantGanadosSimbol / $soloG) * 100;
                    echo $simbolo . " ganó el " . $promedioSimbolo . "% de las partidas ganadas.\n";
                } else {
                    echo "No hay ningún juego registrado.\n";
                }
                break;
            case 5:
                /** Mostrar resumen de jugador*/
                if (count($jugadosCrudo) > 0) {
                    echo "Ingrese el nombre de un jugador para ver su resumen: \n";
                    $jugadorResumen = trim(fgets(STDIN));
                    $jugadorResumen = strtoupper($jugadorResumen);
                    //Comprobar si el jugador existe
                    $existeOno = false;
                    $existeOno = comprobarJugador($jugadorResumen,$jugadosCrudo);
                    if ($existeOno) {
                        echo "El jugador no posee registros.\n";
                    } else {
                        resultadosObtener($jugadosCrudo, $jugadorResumen);
                    }
                } else {
                    echo "No hay ningún juego registrado.\n";
                }
                break;
            case 6:
                /** Mostrar listado de juegos ordenado por jugador O */
                if (count($jugadosCrudo) > 0) {
                    juegosOrdenadosDeO($jugadosCrudo);
                } else {
                    echo "No hay ningún juego registrado.\n";
                }
                break;
            case 7:
                /**salir*/
                $salir = false;
                break;
            default:
                echo "Ingrese un número del 1 al 7.\n";
                echo "\n";
        }
    } while ($salir);
    
