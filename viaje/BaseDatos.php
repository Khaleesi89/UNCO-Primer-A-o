<?php
    class BaseDatos {
        private $HOSTNAME;
        private $BASEDATOS;
        private $USUARIO;
        private $CLAVE;
        private $CONEXION;
        private $QUERY;
        private $RESULT;
        private $ERROR;

        /**
         * Constructor de la clase que inicia las variables instancias de las clases
         * vinculadas a la conección con el Servidor de BD.
         */
        public function __construct() {
            $this->HOSTNAME = "127.0.0.1";
            $this->BASEDATOS = "bdviajes";
            $this->USUARIO = "root";
            $this->CLAVE = "";
            $this->RESULT = 0;
            $this->QUERY = "";
            $this->ERROR = "";
        }

        /**
         * Función que retorna una cadena con una pequeña descripción del error (si lo hubiera).
         * @return string
         */
        public function getError() {
            return "\n".$this->ERROR;
        }
        
        /**
         * Inicia la conección con el Servidor y la Base Datos Mysql.
         * Retorna true si la coneccion con el servidor se pudo establecer (false en caso contrario).
         * @return boolean
         */
        public function Iniciar() {
            $resp = false;
            //Manual mySql: $conexion = @mysqli_connect($this->HOSTNAME, $this->USUARIO, $this->CLAVE, $this->BASEDATOS);
            //if (!$link) {die('Connect Error: ' . mysqli_connect_errno());}
            $conexion = mysqli_connect($this->HOSTNAME, $this->USUARIO, $this->CLAVE, $this->BASEDATOS);
            if ($conexion) {
                if (mysqli_select_db($conexion, $this->BASEDATOS)) {
                    $this->CONEXION = $conexion;
                    unset($this->QUERY);
                    unset($this->ERROR);
                    $resp = true;
                } else {
                    $this->ERROR = mysqli_errno($conexion).": ".mysqli_error($conexion);
                }
            } else {
                $this->ERROR = mysqli_errno($conexion).": ".mysqli_error($conexion);
            }
            return $resp;
        }
        
        /**
         * Ejecuta una consulta en la Base de Datos.
         * Recibe la consulta en una cadena enviada por parámetro.
         * @param string $consulta
         * @return boolean
         */
        public function Ejecutar($consulta) {
            $resp = false;
            unset($this->ERROR);
            $this->QUERY = $consulta;
            if ($this->RESULT = mysqli_query($this->CONEXION, $consulta)) {
                $resp = true;
            } else {
                $this->ERROR = mysqli_errno($this->CONEXION).": ".mysqli_error($this->CONEXION);
            }
            return $resp;
        }
        
        /**
         * Devuelve un registro retornado por la ejecución de una consulta (el puntero se desplaza al siguiente registro de la consulta).
         * @return boolean
         */
        public function Registro() {
            $resp = null;
            if ($this->RESULT) {
                unset($this->ERROR);
                if ($temp = mysqli_fetch_assoc($this->RESULT)) {
                    $resp = $temp;
                } else {
                    mysqli_free_result($this->RESULT);
                }
            } else {
                $this->ERROR = mysqli_errno($this->CONEXION).": ".mysqli_error($this->CONEXION);
            }
            return $resp;
        }
        
        /**
         * Devuelve el id de un campo AUTOINCREMENT (utilizado como clave de una tabla).
         * Retorna el ID numérico del registro insertado (devuelve NULL en caso que la ejecucion de la consulta falle).
         * @param string $consulta
         * @return int id de la tupla insertada
         */
        public function devuelveIDInsercion($consulta) {
            $resp = null;
            unset($this->ERROR);
            $this->QUERY = $consulta;
            if ($this->RESULT = mysqli_query($this->CONEXION, $consulta)) {
                $id = mysqli_insert_id($this->CONEXION);
                //$id = mysqli_insert_id();
                $resp = $id;
            } else {
                $this->ERROR = mysqli_errno($this->CONEXION).": ".mysqli_error($this->CONEXION);
            }
            return $resp;
        }

        public function DevolverID() {   
            $last_id = $this->CONEXION->insert_id;
            return $last_id;
        }
    }
?>