//seleccionar boton
const botonFooter = document.querySelector('.btn-flotante');
botonFooter.addEventListener('click', desplegar);
//botonFooter.onclick = desplegar();


//crear footer
const footer = document.querySelector('.footer');

console.log(botonFooter);

function desplegar(){
    //footer.classList.add('activo');
    if(footer.classList.contains('activo')){
        footer.classList.remove('activo');
        botonFooter.classList.remove('activo');
        botonFooter.textContent = 'Idioma y Moneda';
    }else{
        footer.classList.add('activo');
        botonFooter.classList.add('activo');
        botonFooter.textContent = 'Cerrar';
    };
}

console.log(footer.classList);