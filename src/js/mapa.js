import L from 'leaflet';
var mapa = L.map('mapid').setView([-11.91733, -77.0481664,13], 16);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(mapa);

L.marker([-11.91733, -77.0481664,16]).addTo(mapa)
/*mensaje de ubicacion */
    .bindPopup('Club Zonal.<br> Sinchi Roca.')
    .openPopup();