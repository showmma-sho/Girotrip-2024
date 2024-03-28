// assets/js/map-script.js

var map = L.map('map').setView([42.9795, 12.3385], 8); // Coordinates for Italy

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

var markers = [
  { lat: 42.9795, lng: 12.3385, city: 'Rome', address: '123 Main St, Rome' },
  { lat: 43.0000, lng: 12.5000, city: 'Florence', address: '456 Elm St, Florence' },
  // Add more markers as needed
];

markers.forEach(function (markerInfo) {
  var newMarker = L.marker([markerInfo.lat, markerInfo.lng])
    .bindPopup(
      `<h2>${markerInfo.city}</h2>
      <h5>${markerInfo.address}</h5>
      </br>
      <!-- Use the popup-buttons class from the linked CSS file -->
              <div class="popup-buttons">

              <button class="btn btn-primary" onclick="location.href='#Ristoranti'">Qui vicino</button>
      </div>`
      
    )
    .addTo(map);
});


