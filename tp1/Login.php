<?php

/*Implementar una clase Login que almacene el nombreUsuario, contraseña, frase que permite recordar la
contraseña ingresada y las ultimas 4 contraseñas utilizadas. Implementar un método que permita validar
una contraseña con la almacenada y un método para cambiar la contraseña actual por otra nueva, el
sistema deja cambiar la contraseña siempre y cuando esta no haya sido usada recientemente (es decir no se
encuentra dentro de las cuatro almacenadas). Implementar el método recordar que dado el usuario,
muestra la frase que permite recordar su contraseña.*/ 

class Login{

    private $nombreUsuario;
    private $password;
    private $frase;
    private $colecContras=[];

    public function __construct($usuario,$clave,$fraseRecordatorio){
        $this->nombreUsuario =$usuario;
        $this->password =$clave;
        $this->frase =$fraseRecordatorio;
    }

    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }
    public function setNombreUsuario ($usuario) {
        $this->nombreUsuario = $usuario;
    }
    
    public function getPassword() {
        return $this->password;
    }
    public function setPassword($clave) {
        $this->password = $clave;
    }

    public function getFrase() {
        return $this->frase;
    }
    public function setFrase($fraseRecordatorio) {
        $this->frase = $fraseRecordatorio;
    }

    public function getColecContras() {
        return $this->colecContras;
    }
    public function setColecContras($arrayContrasenias) {
        $this->colecContras = $arrayContrasenias;
    }

    public function validarPassword($clave){
        $resultado = true;
        $arrayPassw = $this->getColecContras();
        $resultado = in_array($clave , $arrayPassw);
        /*if ($resultado == false){
            array_push($clave,$arrayPassw);
            return $this->setColecContras($arrayPassw);
       }*/
       return $resultado;
    }


        // SE PUEDE LIMITAR LA CANTIDAD DE ELEMENTOS EN UN ARRAY???
        // QUE RETORNA??? estoy confundida porq yo hago el set y tendria que retornar el get actualizado??
     //o la variable q use en el set???
     //desp si retorna true, que hago??? si no puedo usar echo,, qq hago para q el usuario se pa que no puede usar esa contraseña??
     // si el valor de in_array es true, que hace??? retorna el array como esta??? 
     // porq en la funcion de arriba ya estoy incorporado a la clave al array...pero como hago para retornar?? cuando hago true o false en el retorno
     // en el test hago un if con lo q debe mostrarme en pantalla???


    public function nuevaPassword($clave){
        $arrayPreliminar = $this->getColecContras();
        $neto = $this->validarPassword($clave);
        if ($neto){
            $arrayPreliminar = array_unshift($arrayPreliminar,$clave);
            $arrayPreliminar[3] = "";
        }

    }

    public function recordarFrase ($usuario){
        $frasecita = $this->getFrase();
        return $frasecita;
    }


    public function __toString(){
        
        $str = "
        USUARIO: {$this->getNombreUsuario()}
        CONTRASEÑA: {$this->getPassword()}
        FRASE: {$this->getFrase()};
        ";
        return $str;


    }
}

  

