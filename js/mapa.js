let mapa = document.querySelector('#mapa');

var map;
var h2 = document.querySelector('#distancia');
var h3 = document.querySelector('#km');

var iconHouse = L.icon({
    iconUrl: 'imagens/pngwing.com.png',
    iconSize: [40,40]
});

// Função executada quando a geolocalização é obtida com sucesso
function success(pos){
    console.log(pos.coords.latitude, pos.coords.longitude);

    h2.textContent = `Sua coordenada é: Latitude:${pos.coords.latitude}, Longitude:${pos.coords.longitude}`;

    var casa = L.latLng(-25.467892800886762, -49.1306297830648);
    var posi = L.latLng(pos.coords.latitude, pos.coords.longitude);

    mapa.textContent = '';

    if (map === undefined) {
        map = L.map('mapid').setView([pos.coords.latitude, pos.coords.longitude], 0);
    }

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    }).addTo(map);

    L.marker(casa, {icon: iconHouse}).addTo(map).bindPopup('Minha casa!').openPopup();

    L.marker(posi).addTo(map).bindPopup('Sua posição!').openPopup();

    L.Routing.control({
        waypoints: [casa, posi],
        routeWhileDragging: false
    })
    .on('routesfound', function (e) {
        var route = e.routes[0];
        var distanciaKm = (route.summary.totalDistance / 1000).toFixed(2);
        console.log('Distância total da rota: ' + distanciaKm + ' km');

        h3.textContent = `${distanciaKm} km`;
    })
    .addTo(map);
}

// Função executada se der erro ao obter a localização
function error(err){
    console.log(err);
}

navigator.geolocation.getCurrentPosition(success, error, {
    enableHighAccuracy: true
});