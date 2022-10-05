<?php
    /* atributos: hora_desde y hora_hasta (que indican el horario de atención de la tienda),
    estado (abierta o cerrada), dirección y dueño. El atributo dueño debe referenciar a un
    objeto de la clase Persona implementada en el punto 1 */

    class Disquera {
        private $hora_desde; //7, 8 indican el horario de atención
        private $hora_hasta;
        private $estado; //tienda ABIERTA o CERRADA
        private $direccion;
        private $objDuenio; //objeto de la clase Persona

        //Métodos de acceso
        public function getHora_desde(){
            return $this->hora_desde;
        }
        public function getHora_hasta(){
            return $this->hora_hasta;
        }
        public function getEstado(){
            return $this->estado;
        }
        public function getDireccion(){
            return $this->direccion;
        }
        public function getObjDuenio(){
            return $this->objDuenio;
        }

        public function setHora_desde($hora_desde) {
            $this->hora_desde = $hora_desde;
        }
        public function setHora_hasta($hora_hasta) {
            $this->hora_hasta = $hora_hasta;
        }
        public function setEstado($estado) {
            $this->estado = $estado;
        }
        public function setDireccion($direccion) {
            $this->direccion = $direccion;
        }
        public function setObjDuenio($objDuenio) {
            $this->objDuenio = $objDuenio;
        }

        //Métodos varios
        public function __construct($hora_desde, $hora_hasta, $estado, $direccion, $objDuenio) {
            $this->hora_desde = $hora_desde;
            $this->hora_hasta = $hora_hasta;
            $this->estado = $estado;
            $this->direccion = $direccion;
            $this->objDuenio = $objDuenio;
        }

        /**
         * Método 1: dentroHorarioAtencion - 
         * Dada 1 hora y min. retorna TRUE si la tienda debe encontrarse abierta en ese horario.
         * FALSE en caso contrario.
         */
        public function dentroHorarioAtencion($hora, $minutos) {
            $enHorario = false;
            if ($minutos != 0) {
                $hora = $hora + 1;
                //$enHorario = false;
            }
            $AbiertoDesde = $this->getHora_desde();
            $AbiertoHasta = $this->getHora_hasta();
            if ($hora < $AbiertoHasta && $hora > $AbiertoDesde) {
                $enHorario = true;
            }
            return $enHorario;
        }

        /**
         * Método 2: abrirDisquera - 
         * Dada 1 hora y min. corrobora que se encuentra dentro del horario de atención.
         * Cambia el estado de la disquera sólo si es un horario válido para su apertura.
         */
        public function abrirDisquera($hora, $minutos) {
            $horario = $this->dentroHorarioAtencion($hora, $minutos);
            if ($horario) {
                $this->setEstado("Abierto");
            } else {
                $this->setEstado("Cerrado");
            }
        }

        /**
         * Método 3: cerrarDisquera - 
         * Dada 1 hora y min. corrobora que se encuentra fuera del horario de atención.
         * Cambia el estado de la disquera sólo si es un horario válido para su cierre.
         */
        //public function cerrarDisquera($hora, $minutos) {
            //No haría falta porque el método 2 ya señala si su estado es ABIERTO o CERRADO.
        //}

        public function __toString() {
            $objPersona = $this->getObjDuenio();
            $cadena = "| Horario de apertura: ".$this->getHora_desde()." hs\n".
                    "| Horario de cierre: ".$this->getHora_hasta()." hs\n".
                    "| Estado: ".$this->getEstado()."\n".
                    "| Dirección: ".$this->getDireccion()."\n".
                    "| Datos del dueño: \n".$objPersona->__toString();
            return $cadena;
        }
    }
?>