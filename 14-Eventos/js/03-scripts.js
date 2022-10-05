//eventos de eclado
const busqueda = document.querySelector('.busqueda');

busqueda.addEventListener('input', (e)=>{
    console.log(e.target.value);
});

busqueda.addEventListener('keyup', ()=>{
    console.log(busqueda.value);
});//este funciona practicamente igual

//keydown es cuando apretas una tecla
//keyup cuando soltas la tecla
//blur cuando entraste a un elemento y clickeas afuera del mismo
//copy se activa cuando das ctrl+c
//paste se activa cuando das ctrl+v
//cut cuando ctrl+x
//input se activa con el de aprtar teclas, copiar, pegar, cortar.. todo menos blur
