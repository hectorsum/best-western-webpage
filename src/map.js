const loadGoogleMapsApi = require('load-google-maps-api');
class Map {
    static loadGoogleMapsApi() {
        return loadGoogleMapsApi({
            // Lee el archivo .env donde contiene la key, y busca GOOGLEMAPS_KEY en ella para obtener la key
            key: process.env.GOOGLEMAPS_KEY
        });
    }
    static createMap(googleMaps, mapElement) {
        return new googleMaps.Map(mapElement, {
            center: {
                lat: 45.520562,
                lng: -122.677438
            },
            zoom: 14
        });
    }
}
export {
    Map
};