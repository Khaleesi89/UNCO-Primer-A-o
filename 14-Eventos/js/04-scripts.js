//eventos de formulario
const formulario = document.querySelector('#formulario');

formulario.addEventListener('submit', validarFormulario);

function validarFormulario(e){
    e.preventDefault();//previene el action del formulario

    console.log(e.target.action);
}