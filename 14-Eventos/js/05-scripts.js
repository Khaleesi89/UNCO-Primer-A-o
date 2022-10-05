//evntos de scroll
window.addEventListener('scroll', ()=>{
    const scrollPX = window.scrollY;
    //console.log(scrollPX); 
})

window.addEventListener('scroll', ()=>{

    const premium = document.querySelector('.premium');
    const ubicacion = premium.getBoundingClientRect();//pa saber ubicacion

    //console.log(ubicacion);
    if(ubicacion.top < 784){
        console.log('El elemento ya esta visible');
    }else{
        console.log('Aun no se ve');
    }
})