var L = require('leaflet');
// 40.7133293 / 29.4669991
var map = L.map('map').setView([40.7133293, 29.4669991], 7);
// L.Marker.prototype.options.icon = "/images/marker.svg";
var myIcon = L.icon({
    iconUrl: 'css/images/marker.png',
    iconSize: [49, 57],
    iconAnchor: [26, 56],
    popupAnchor: [-3, -76],
    // shadowUrl: 'my-icon-shadow.png',
    shadowSize: [68, 95],
    shadowAnchor: [22, 94]
});
var marker = L.marker([40.7133293, 29.4669991], { icon: myIcon }).addTo(map);

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.dark',
    accessToken: 'pk.eyJ1IjoibXJwZXNraSIsImEiOiJjajVqZ3drZGYyMnRhMnFzNmtwOTFzZDF6In0.12SM_jsR-FJ1Cth2d_PO-w'
}).addTo(map);

var target = document.querySelector('.box');
var player = target.animate([
  {transform: 'translate(0)'},
  {transform: 'translate(100px, 100px)'}
], 500);

player.addEventListener('finish', function() {
  target.style.transform = 'translate(100px, 100px)';
});
