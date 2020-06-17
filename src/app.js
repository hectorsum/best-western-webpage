import "./styles.scss";
import $ from 'jquery';
import "./img/logo.svg";
import "./img/ubication.png";
import "./img/whatsapp.png";
import "./img/phone.png";
import "./img/email.png";
import "./video/video.mp4";
import "./img/wifi.jpg";
import "./img/cafe.jpg";
import "./img/lavanderia.jpg";
import "./img/telefono.jpg";
import "./img/wifi.jpg";
import "./img/matromonial.jpg";



const header = document.querySelector("header");
const main = document.querySelector(".bienvenidos");


const sectionOneOptions = { 
    //Adding some margin to my navbar so that applies the effect before hits .bienvenidos div
    rootMargin: "-100px 0px 0px 0px"
}

//Nav animation
const sectionOneObserver = new IntersectionObserver(function(entries, sectionOneObserver){
    entries.forEach(entry => {
        if(!entry.isIntersecting){
            console.log('scroll')
            $('header').addClass('nav-scrolled');
        }else{
            console.log('no scrol')
            $('header').removeClass('nav-scrolled');
        }
    });
},
sectionOneOptions);
sectionOneObserver.observe(header);


//Nav var animation ul
$('.navigation .item .enlace').on('click', function () {
    $('.enlace').removeClass('active')
    $(this).addClass('active')
})


const portfolioItems = document.getElementsByClassName('descrip-servicio')
    Object.keys(portfolioItems).forEach(elem =>{
        portfolioItems[elem].addEventListener('mouseover',() => {
          portfolioItems[elem].classList.add('darken--description');
        })
        portfolioItems[elem].addEventListener('mouseout',() => {
          portfolioItems[elem].classList.remove('darken--description');
        })
})



