<!DOCTYPE html>
<html lang="pr-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portifólio | Mapa</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="/assets/bootstrap-icons/fonts/bootstrap-icons.min.css">
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css">
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>

</head>

<body>
<section class="contato" id="contato">
    <div class="bataoVolt">
        <a href="index.php" class="btnVolt" id="voltar"><i class="bi bi-arrow-left-circle-fill"></i>  Voltar</a>
</div>

    <h2 class="cabecario">Sua <span>Distancia!</span></h2>

            <!-- projeto mapa-->
    <h1 id="txtDistancia">Sua distancia até mim é:</h1>
    <h2 id="mapa"></h2>
    <div id="mapid"></div>
    <div id="distancia"></div>
           
            <!-- fim projeto mapa-->

</section>

</body>
</html>
<script>
    let mapa = document.querySelector('#mapa');
var map;
var h2 = document.querySelector('#distancia');
var iconHouse = L.icon({
    iconUrl: 'imagens/pngwing.com.png',
    iconSize: [40,40]
})


function success(pos){
    console.log(pos.coords.latitude, pos.coords.longitude);
    h2.textContent = `Sua coordenada é: Latitude:${pos.coords.latitude}, Longitude:${pos.coords.longitude}`;
    
    var casa = L.latLng(-25.467892800886762, -49.1306297830648);
    var posi = L.latLng(pos.coords.latitude, pos.coords.longitude);
    mapa.textContent = '';
    
    if (map === undefined) {
        map = L.map('mapid').setView([pos.coords.latitude, pos.coords.longitude], 0);
    } else {
    }
   
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    }).addTo(map);
    
    L.marker([-25.467892800886762, -49.1306297830648], {icon: iconHouse}).addTo(map)
       .bindPopup('minha casa!')
       .openPopup();
    L.marker([pos.coords.latitude, pos.coords.longitude]).addTo(map)
       .bindPopup('Sua posição!')
       .openPopup();

    L.Routing.control({
        waypoints: [
            /*L.latLng(-25.43175863900346, -49.181631477804174),*/
            L.latLng(-25.467892800886762, -49.1306297830648),
            L.latLng(pos.coords.latitude, pos.coords.longitude)
        ]
    })

    .addTo(map);
}
/*$('#MAPA').innerHTML = $('div.leaflet-routing-container:nth-child(1) > div:nth-child(1) > div:nth-child(1) > h3:nth-child(2)').innerHTML;*/


 
function error(err){
    console.log(err);
}

var watchID = navigator.geolocation.watchPosition(success, error, {
    enableHighAccuracy: true,
    timeout: 5000
});
</script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script> 
<script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>
<script src="typed.js@2.0.12.js"></script>
<script src="scrollreveal.js"></script>
<script src="script.js"> </script>
