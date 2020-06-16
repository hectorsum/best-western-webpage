import {pages} from "../controllers/index";


//Seleccionando id del contenido index static
let content = document.getElementById('root')

const router = async (route) =>{
    content.innerHTML = ''
    switch(route){
        case '#/':
            return console.log('Inicio')
        case '#/nosotros':
            return console.log('nosotros')
        case '#/habitaciones':
            return console.log('habitaciones')
        case '#/servicios':
            return console.log('servicios')
        default:
            content.appendChild(pages.notfound())
            break;
    }
}

export { router };