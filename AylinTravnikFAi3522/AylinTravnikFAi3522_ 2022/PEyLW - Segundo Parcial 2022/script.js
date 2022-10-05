function vaciarFormulario(){
    document.getElementById("txCandidato").value = "";
    document.getElementById("txDNI").value = "";
    document.getElementById("txSexo").value = "";

}

//HACE EL BORDE ROJO
function failBordeRojo(campo){
    campo.style.borderColor = "red";
}

function LimpiarBordesFormulario(){
    Candidato = document.getElementById("txCandidato");
    DNI =document.getElementById("txDNI");
    Sexo = document.getElementById("txSexo");

    Candidato.style.borderColor = "";
    DNI.style.borderColor = "";
    Sexo.style.borderColor = "";
   
}

//empieza con el click aca
function verificarForm(){
    //declara variables q se usaran
    var valor, string,  formularioCorrecto ;
    //crea un booleanno para hacer la diferencia entre bien o mal
    formularioCorrecto = true;

//trae el valor ingresado en candidato y lo pone todo en minuscula
    valor= document.getElementById("txCandidato").value.toLowerCase();
    
    //si el campo esta vacio o no es un valor valido, cambia a false y hace el borde rojo
   

    //BUSCAR QUE ERA isNaN poque no me acuerdo

    if (valor.value == "" || !isNaN(valor.value)) {
        failBordeRojo(document.getElementById("txCandidato"));
        formularioCorrecto = false;
    }
    else{
        //si no es valor q debe ser de votante, hace rojo tamb
        if (!(valor =="kodos" || valor =="kang" || valor =="blanco")){
        failBordeRojo(document.getElementById("txCandidato"));
        formularioCorrecto = false;
        }
    }

 //si el valor de dni lo pasa de string a numerico
 //crea una variable contadora para el while y un booleano para salir tamb
    valor = parseInt(document.getElementById("txDNI").value);
    var i =0;
    var existe = false;
    
//mientras existe sea false o sea el contador menor a la longitud de registro de votantes
 //el registro de votntes esta declarado en otro script por eso no se declara de nuevo
 
 
 //QUE HACE REGISTROVOTANTES??? NO SE Q LONGITUD PUEDE TENER
    while(existe == false &&i < RegistroVotantes.length){
        if(RegistroVotantes[i] == valor){
            DNIexistente = true;
            alert("Esta persona ya emitió su voto. El fraude está mal claro que sí");
            formularioCorrecto = false;
            //si s verifica que en el rregistro hay un dni igual, entoces vacia el formulario y saca los bordes rojos
            vaciarFormulario();
            LimpiarBordesFormulario();}
        i++;}
    
   //si el campo esta vacio o        entonces hace el borde rojo
    if (valor.value == "" || !isNaN(valor.value)) {
        failBordeRojodocument.getElementById("txDNI");
        formularioCorrecto = false;
    }
    else{
        //si el valor es menor a 1millon y mayor a 999millones da borde rojo
        if(600000 > valor || valor < 99999999) {
            failBordeRojo(document.getElementById("txDNI"));
            formularioCorrecto = false;
        }
    }

    //valida el sexo ahora
    valor = document.getElementById("txSexo");
  
  //si es un valor diferente a m o f da falso.....YO PONDRIA UPERCASE PA SEA MAYUSCULA O MINUSCCULA
    if (! (valor.value == "M" || valor.value == "F")){
        formularioCorrecto = false;
        failBordeRojo(document.getElementById("txSexo"));
    }

// PORQUE USA RETURN????? SERA PARA MOSTRAR EL VALOR ??? aaaahh es para mostrar la validacion sino no te la muestra en pantalla

    return formularioCorrecto;
}

var RegistroVotantes = new Array();


//ACA COMIENZA LA VERIFICACION CON EL CLICK EN REGISTRAR
function revisarForm(){
    
    var formularioCorrecto, total;  
    var formularioCorrecto = verificarForm(); //llama a la funcion de mas arriba la verificacion tiene que salir true y sigue aca
    //si el formulario esta correcto se guarda en formularioCorrecto
    var voto = document.getElementById("txCandidato").value.toUpperCase(); //cambia todo en mayuscula
    //NO ENTIENDO EL USO DE INNERHTML ACA...NO ERA PARA ESCRIBIR???
   var  resultadosKang= document.getElementById("ResultadosKang").innerHTML;
   //lo convierte en nro
    var  rKang= parseInt(resultadosKang);
    var resultadosKodos= document.getElementById("ResultadosKodos").innerHTML;
    //lo convierte en nro
    var rKodos= parseInt(resultadosKodos);
   var  resultadosBlanco= document.getElementById("ResultadosBlanco").innerHTML;
   //lo convierte en nro
   var  rBlanco =parseInt (resultadosBlanco);
   var DNI= document.getElementById("txDNI");
    votante= "-"+DNI.value+ "-"; 
   
    
     //si la validacion del formulario es true hace el contador
    if (formularioCorrecto) {
        
        if ( voto == "KANG") {
            total=  rKang +1; 

            // guarda el contador en resultadosKang
            document.getElementById("ResultadosKang").innerHTML=total;
        }
        
        else if ( voto == "KODOS" ) {
            total=  rKodos +1; 
            document.getElementById("ResultadosKodos").innerHTML=total;
        }
        
        else if ( voto == "BLANCO") {
            total=  rBlanco +1; 
            document.getElementById("ResultadosBlanco").innerHTML=total;
            }
           //ESTO NO LO ENTIENDO
            RegistroVotantes[RegistroVotantes.length] = DNI.value;
            
           // votantes es el cuaddro del final con todos lo q votaron con su DNI los muestra
            Votantes.innerHTML+=votante+"\n";
            
           //vacia el formulario de nuevo para un nuevo ingreso
            vaciarFormulario();
            
            //saca los bordes
            LimpiarBordesFormulario();
        }
    }
    