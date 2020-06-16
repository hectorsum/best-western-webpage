import "./styles.scss";
import $ from 'jquery';
import "./img/logo.svg"
import "./img/ubication.png"
import "./img/whatsapp.png"
import "./img/phone.png"
import "./img/email.png"
import "./video/video.mp4"

const header = document.querySelector("header");
const main = document.querySelector(".bienvenidos");




const sectionOneOptions = { }

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