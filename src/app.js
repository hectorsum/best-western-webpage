import "./styles.scss";
import $ from 'jquery';
import "./img/logo.svg"
import "./img/ubication.png"
import "./img/whatsapp.png"
import "./img/phone.png"
import "./img/email.png"
import {
    router
} from "./routers/index.routes"
router(window.location.hash) // Validación apenas entre a la página

//Nav var animation ul
$('.navigation .item .enlace').on('click', function () {
    $('.enlace').removeClass('active')
    $(this).addClass('active')
})


window.addEventListener('hashchange', () => {
    router(window.location.hash)
})