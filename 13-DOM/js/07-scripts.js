//cambiar css
const textoEncabezado = document.querySelector('h1');
textoEncabezado.style.color ='red';

//lo mejor es tocar css cambiando clases

const card = document.querySelector('.card');
card.classList.add('nueva-clase', 'segunda-clase');
card.classList.remove('segunda-clase');