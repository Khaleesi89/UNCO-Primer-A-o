//querySelector, retorna maximo un elemento, busca por selectores de css
const card = document.querySelector('.card');

//podemos tener selectores especificos como css
const info = document.querySelector('.premium .info');
console.log(info);

//seleccionar el segundo card, con :nth-child(x) vas seleccionando el numero(x) de elemento que sea
const segundoCard = document.querySelector('section.hospedaje .card:nth-child(2)');
console.log(segundoCard);

//seleccionar formulario
const formulario = document.querySelector('#formulario');
console.log(formulario);

//sellecinar elementos html
const navegacin = document.querySelector('nav');
console.log(navegacin);