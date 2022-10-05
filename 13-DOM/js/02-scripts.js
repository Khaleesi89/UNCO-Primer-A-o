//getElementsByClassName
//no se usa mucho

const header = document.getElementsByClassName('header');
console.log(header);

const hero = document.getElementsByClassName('hero');
console.log(hero);

//si las clases existen mas de una vez te trae todas
const contenedores = document.getElementsByClassName('contenedor');
console.log(contenedores);

const noExiste = document.getElementsByClassName('asd');
console.log(noExiste);
