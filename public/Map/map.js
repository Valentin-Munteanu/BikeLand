document.addEventListener('DOMContentLoaded', function() {
    let map = L.map('map').setView([47.0105, 28.8638], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
    }).addTo(map);



    let start = [47.0369656, 28.8330320];
    let pointg = [47.3764783, 28.8228012]
    let point1 = [47.7601489, 27.9285736];
    let pointb = [47.2088491, 27.7990872]
    let point2 = [45.9039257, 28.1964787];
    let pointE = [ 48.1664254, 27.3100786];

    L.marker(start).addTo(map).bindPopup('Or Chișinău, strada X').openPopup();
    L.marker(pointg).addTo(map).bindPopup("Orhei, strada X")
    L.marker(point1).addTo(map).bindPopup("Bălți Centru")
    L.marker(pointb).addTo(map).bindPopup("Ungheni, strada Y")
    L.marker(point2).addTo(map).bindPopup("Cahul strada C")
    L.marker(pointE).addTo(map).bindPopup("Edineț centru")



});
