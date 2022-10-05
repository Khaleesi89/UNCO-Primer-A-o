const encabezado = document.querySelector('.contenido-hero h1');
console.log(encabezado);
//Acceder al texto
console.log(encabezado.innerText);//no encuentra textos ocultos
console.log(encabezado.textContent);//encuentra textos ocultos
console.log(encabezado.innerHTML);//se trae el html

const textoEncabezado = document.querySelector('.contenido-hero h1').textContent;
console.log(textoEncabezado);
document.querySelector('.contenido-hero h1').textContent = "No hay hospedaje para nadie";

const imagen = document.querySelector('.card img');
console.log(imagen);
imagen.src = 'img/hacer2.jpg';