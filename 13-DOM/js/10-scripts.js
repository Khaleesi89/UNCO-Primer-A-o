//generar html desde js
const enlace = document.createElement('a');
//asignaler el texto
enlace.textContent = "nuevo enlace";
//añadir el href
enlace.href = './nuevo-enlace';
//darle el target
enlace.target = '_blank';
//definir donde mostrarlo
const navegacion = document.querySelector('.navegacion');
//con appendChild le agregas (al final) al padre el elemento
navegacion.appendChild(enlace);
//agregar en otro lado del padre
navegacion.insertBefore(enlace, navegacion.children[1]);
//
enlace.classList.add('nuevo-enlace');
//probarlo
console.log(enlace);

//agregar webadas
enlace.onclick = miFuncion;

function miFuncion(){
    alert('diste click hueon');
}

//Crear un card de forma dinamica
const parrafo1 = document.createElement('p');
parrafo1.textContent = 'Concierto';
parrafo1.classList.add('categoria', 'concierto');

const parrafo2 = document.createElement('p');
parrafo2.textContent = 'Concierto de rock';
parrafo2.classList.add('titulo');

const parrafo3 = document.createElement('p');
parrafo3.textContent = '$800 por persona';
parrafo3.classList.add('precio');

//padre
const info = document.createElement('div');
info.classList.add('info');
info.appendChild(parrafo1);
info.appendChild(parrafo2);
info.appendChild(parrafo3);

console.log(info);

//crear imagen
const imagen = document.createElement('img');
imagen.src = 'img/hacer2.jpg';
imagen.alt = 'imagen de algo';

//padre del padre
const card = document.createElement('div');
card.classList.add('card');
card.appendChild(imagen);
card.appendChild(info);

const contenedor = document.querySelector('.contenedor-cards');
//section.appendChild(card);
contenedor.insertBefore(card, contenedor.children[0]);