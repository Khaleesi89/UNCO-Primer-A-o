const nav = document.querySelector('.navegacion');

nav.addEventListener('click', ()=>{
    console.log('Click en nav');
});

nav.addEventListener('mouseenter', ()=>{
    console.log('entrando a la navegacion');
    nav.style.backgroundColor = 'white';
});//cuando pasas el mouse sobre la navegacion

nav.addEventListener('mouseout', ()=>{
    console.log('salir de la navegacion');
    nav.style.backgroundColor = 'transparent';
});

//mousedown cuando clickeo y mouseup cuando suelto el click
//dblclick es dobleclick

