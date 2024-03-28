window.filterMarkers = function(color) {

  var green = document.getElementsByClassName('leaflet-marker-marker');
  var red = document.getElementsByClassName('leaflet-marker-marker');
  var yellow = document.getElementsByClassName('leaflet-marker-marker');
  var orange = document.getElementsByClassName('leaflet-marker-marker');
  var selectedColor;



  if (selectedColor == greenIcon) {
    yellowIcon = null;
    redIcon = null;
    blueIcon = null;
    for (var i = 0; i < allMarkers.length; i++) {

      green[i].style.display = 'block';
    }
  } else {

    for (var i = 0; i < allMarkers.length; i++) {
      green[i].style.display = 'none';
    }


    selectedColor = color;
    var selectedMarkers = document.getElementsByClassName(color);
    for (var i = 0; i < selectedMarkers.length; i++) {
      selectedMarkers[i].style.display = 'block';
    }
  }
}
