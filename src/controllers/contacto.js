import view from "../views/contacto.html";
import {Map} from "../map";
export default() => {
    const divElement = document.createElement('div');
    divElement.innerHTML = view


    document.addEventListener("DOMContentLoaded", function() {
        let mapElement = document.getElementById('map');

        Map.loadGoogleMapsApi().then(function (googleMaps) {
            Map.createMap(googleMaps, mapElement);
        });
    });

    return divElement;
}