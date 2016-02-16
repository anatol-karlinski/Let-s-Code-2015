$( document ).ready(function() {
  

});

var marker;
var contentString;
var infowindow;
var map;
var pozycja;
var markers = [];
var adres;
var i;

var DaneMarkera = {
mName: "",
mCzas: ""
};

function geocodeLatLng(geocoder, map, infowindow) {

  geocoder.geocode({'location': pozycja}, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      if (results[1]) {

        adres = results[1].formatted_address;
        $("#miejsce").val(adres);

      } else {
        window.alert('No results found');
      }
    } else {
      window.alert('Geocoder failed due to: ' + status);
    }
  });
}

function initAutocomplete() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -33.8688, lng: 151.2195},
    zoom: 10,
    streetViewControl: false,
    disableDoubleClickZoom: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });

  var geocoder = new google.maps.Geocoder;
  var infowindow = new google.maps.InfoWindow;

  document.getElementById('submit').addEventListener('click', function() {
    geocodeLatLng(geocoder, map, infowindow);
  });
  
  
  
  
  
  
  // Create the search box and link it to the UI element.
  var input = document.getElementById('pac-input');
  var searchBox = new google.maps.places.SearchBox(input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);


  searchBox.addListener('places_changed', function() {
    var places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    } 

    // For each place, get the icon, name and location.
    var bounds = new google.maps.LatLngBounds();
    places.forEach(function(place) {
      var icon = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };

        bounds.extend(place.geometry.location);
    });
    map.fitBounds(bounds);
  });

/*
map.addListener('dblclick', function(event) 
{

	pozycja = event.latLng;//map.getCenter();
  clearMarkers();
  addMarker(pozycja);


  var geocoder = new google.maps.Geocoder;
  var infowindow = new google.maps.InfoWindow;
  geocodeLatLng(geocoder,map,infowindow);
    //alert(adres.formatted_address);

  $("#pozx").val(pozycja.lat());
  $("#pozy").val(pozycja.lng());
  
  //$("#adress").text(adres.formatted_address);
  /*
  var marker = new google.maps.Marker({
    position: pozycja,
    map: map,
 
  });
  
    //infowindow.open(map, marker);
});
*/
// Adds a marker to the map and push to the array.
  var image = {
    url: './js/images/Penis-26.png',
    size: new google.maps.Size(50, 50),
    origin: new google.maps.Point(0, 0),
    anchor: new google.maps.Point(13, 13)
	};


function addMarker(location) {
  var marker = new google.maps.Marker({
    position: location,
	icon: image,
    map: map});
	
  markers.push(marker);
}

// Sets the map on all markers in the array.
function setMapOnAll(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
  setMapOnAll(null);
}

// Shows any markers currently in the array.
function showMarkers() {
  setMapOnAll(map);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
  clearMarkers();
  markers = [];
}

var table = document.getElementById("koordynaty");
	var x = 0, y = 0;
for (var i = 0, row; row = table.rows[i]; i++) {

   for (var j = 0, col; col = row.cells[j]; j++) {
		if(j==0) x=col.innerHTML;
		else y=col.innerHTML;
   } 
	addMarker(new google.maps.LatLng(x, y));
}
map.setCenter(new google.maps.LatLng(x, y));
showMarkers();

  
}