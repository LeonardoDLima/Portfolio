// Seleciona o título que será usado para o mapa
let mapa = document.querySelector('#mapa');

// Declara as variáveis do mapa e dos elementos HTML que vão exibir informações
var map;
var h2 = document.querySelector('#distancia'); // Exibe coordenadas
var h3 = document.querySelector('#km'); // Exibe a distância em km

// Ícone personalizado para marcar "Minha casa" no mapa
var iconHouse = L.icon({
    iconUrl: 'imagens/pngwing.com.png',
    iconSize: [40,40] // Tamanho do ícone
});

// Função executada quando a geolocalização é obtida com sucesso
function success(pos){
    console.log(pos.coords.latitude, pos.coords.longitude); // Mostra as coordenadas no console

    // Exibe as coordenadas no elemento <div id="distancia">
    h2.textContent = `Sua coordenada é: Latitude:${pos.coords.latitude}, Longitude:${pos.coords.longitude}`;

    // Define os pontos fixos: casa (fixa) e posição do usuário (dinâmica)
    var casa = L.latLng(-25.467892800886762, -49.1306297830648);
    var posi = L.latLng(pos.coords.latitude, pos.coords.longitude);

    mapa.textContent = ''; // Limpa o título (está vazio)

    // Cria o mapa se ainda não existir
    if (map === undefined) {
        map = L.map('mapid').setView([pos.coords.latitude, pos.coords.longitude], 0);
    }

    // Adiciona o tile padrão do OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    }).addTo(map);

    // Adiciona marcador da casa no mapa
    L.marker(casa, {icon: iconHouse}).addTo(map).bindPopup('Minha casa!').openPopup();

    // Adiciona marcador da posição do usuário no mapa
    L.marker(posi).addTo(map).bindPopup('Sua posição!').openPopup();

    // Controla a rota traçada entre os dois pontos
    L.Routing.control({
        waypoints: [casa, posi], // Pontos de origem e destino
        routeWhileDragging: false // Não atualiza a rota ao arrastar
    })
    .on('routesfound', function (e) { // Quando a rota é encontrada
        var route = e.routes[0]; // Pega a primeira rota encontrada
        var distanciaKm = (route.summary.totalDistance / 1000).toFixed(2); // Converte para km e formata com 2 casas decimais
        console.log('Distância total da rota: ' + distanciaKm + ' km');

        // Exibe a distância calculada
        h3.textContent = `${distanciaKm} km`;
    })
    .on('routesfound', function (e) { // Segunda escuta (não necessária, está repetida)
        console.log(e);
    })
    .addTo(map);
}

// Função executada se der erro ao obter a localização
function error(err){
    console.log(err);
}

// Solicita a localização do usuário
navigator.geolocation.getCurrentPosition(success, error, {
    enableHighAccuracy: true // Pede alta precisão
});