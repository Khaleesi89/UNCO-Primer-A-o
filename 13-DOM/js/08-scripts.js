//traversing de dom
const navegacion = document.querySelector('.navegacion');
console.log(navegacion);
console.log(navegacion.childNodes);//los espacios en blanco son considerados elementos
console.log(navegacion.children);//elementos hijos
console.log(navegacion.children[1].nodeName);
console.log(navegacion.children[1].nodeType);//hay que buscar en la documentación el código que representa para saber a que tipo d atributo haces referencia

const card = document.querySelector('.card');
console.log(card.children[1].children[2].textContent);
//Se trata a cada padre como un array de sus hijos

console.log(card.children[0].src);
card.children[0].src = 'img/hacer2.jpg';

//traversing de hijo al padre
console.log(card.parentElement);//selecciona el html del padre, mejor este
console.log(card.parentNode.parentNode);//selecciona la clase del padre

/*con children vas bajando a los hijos del elemento, y con parentNode o parentElement vas subiendo a los padres del elemento*/ 

//seleccionar el siguiente elemento hermano
console.log(card.nextElementSibling);
console.log(card.nextElementSibling.nextElementSibling);

//ultimo card
const ultimoCard = document.querySelector('.card:nth-child(4)');
console.log(ultimoCard);
console.log(ultimoCard.previousElementSibling);

//
console.log(navegacion.firstElementChild);
console.log(navegacion.lastElementChild);
