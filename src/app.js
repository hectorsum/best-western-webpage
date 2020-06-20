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
import "./img/individual-room.jpeg";
import "./img/double-room.jpg";
import "./img/triple-room.jpg";
import "./img/quad-room.jpg";
import "./img/twin-room.jpg";
import "./img/queen-room.jpg";
import "./img/king-room.jpg";

import "./img/client-quantity.svg";
import "./img/bed-quantity.svg";
import "./img/telephone.svg";

const header = document.querySelector("header");
const main = document.querySelector(".bienvenidos");


const sectionOneOptions = { 
    //Adding some margin to my navbar so that applies the effect before hits .bienvenidos div
    rootMargin: "-100px 0px 0px 0px"
}
//todo: Nav animation
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


//todo: Nav bar animation ul HOME
$('.navigation .item .enlace').on('click', function () {
    $('.enlace').removeClass('active')
    $(this).addClass('active')
})

//todo: Bedrooms animation (zooming photo)
// $('div .bedroom-content img').on('mouseenter',function(){
//   console.log('aumentando')
//   $(this).animate({'width':'100%'},200);
// })
// $('div .bedroom-content img').on('mouseleave',function(){
//   console.log('aumentando')
//   $(this).animate({'width':'100%'},200);
// })

//todo: Bedrooms animation (ul tag zooming)
// $('.bed-items li').on('mouseenter',function(){
//   $(this).animate({'font-size':'18px','left':'0','top':'0'},100).fadeIn(200)
// })
// $('.bed-items li').on('mouseleave',function(){
//   $(this).animate({'font-size':'16px'},100).fadeIn(200)
// })

//todo: services animation
const portfolioItems = document.getElementsByClassName('descrip-servicio')
    Object.keys(portfolioItems).forEach(elem =>{
        portfolioItems[elem].addEventListener('mouseover',() => {
          portfolioItems[elem].classList.add('darken--description');
        })
        portfolioItems[elem].addEventListener('mouseout',() => {
          portfolioItems[elem].classList.remove('darken--description');
        })
})

$('.bedroom-nav a').on('click',function(){
  $('.bedroom-nav a').removeClass('active-item');
  $(this).addClass('active-item');
})

// Animation hotel rooms
$(function(){
  //Removing class hide, so its showing first element
  $('.content-info-array .content-info').show()

  $('.bed-items li a').on('click',function(){
    $('.content-info-array .content-info').hide()
    var enlace = $(this).attr('href');
    $(enlace).removeClass('hide-panel');
    $(enlace).show(200);
    
    return false //Not to load again the page after click on a tag
  })
})

