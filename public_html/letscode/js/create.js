$( document ).ready(function() {

    //Wybor daty
    $( "#datepicker" ).datepicker();


    //Wybor godziny i minuty 
  $("#godziny").spinner({
        spin: function(event, ui) 
        {
            if (ui.value > 23) 
            {
              $(this).spinner("value", 0);
        return false;
            }
            else if (ui.value < 0) 
            {
              $(this).spinner("value", 23);
        return false;
            }
        },
    });
  $("#minuty").spinner({
        spin: function(event, ui) 
        {
            if (ui.value > 59) 
            {
              $(this).spinner("value", 0);
        return false;
            }
            else if (ui.value < 0) 
            {
              $(this).spinner("value", 59);
        return false;
            }
        },
    });

    $("#min").spinner({
        spin: function(event, ui) 
        {
            if (ui.value < 1) 
            {
                $(this).spinner("value", 1);
                return false;
            }
        },
    });

    $("#max").spinner({
        spin: function(event, ui) 
        {
            if (ui.value > 999) 
            {
                $(this).spinner("value", 0);
                return false;
            }
        },
    });

  $("#minuty").spinner("value", 00);
  $("#godziny").spinner("value", 12);

  $("#kategorie").change(function() {
        if($("#kategorie :selected").text() == "kat 1")
        {
          $("#sub_kat1").css("display", "block");
          $("#sub_kat2").css("display", "none");
          $("#sub_kat3").css("display", "none");
        }
        else if($("#kategorie :selected").text() == "kat 2")
        {
          $("#sub_kat1").css("display", "none");
          $("#sub_kat2").css("display", "block");
          $("#sub_kat3").css("display", "none");
        }
    else if($("#kategorie :selected").text() == "kat 3")
        {
          $("#sub_kat1").css("display", "none");
          $("#sub_kat2").css("display", "none");
          $("#sub_kat3").css("display", "block");
        }
    });    

});

var marker;
var contentString;
var infowindow;
var map;
var pozycja;
var markers = [];
var adres;

var DaneMarkera = {
mName: "",
mCzas: ""
};

function geocodeLatLng(geocoder, map, infowindow) {
  //var input = pozycja;//document.getElementById('latlng').value;
  //var latlngStr = input.split(',', 2);
  //var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
  geocoder.geocode({'location': pozycja}, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      if (results[1]) {
        //map.setZoom(11);
        /*
        var marker = new google.maps.Marker({
          position: pozycja,
          map: map
        });
        */
        adres = results[1].formatted_address;
        $("#miejsce").val(adres);
        /*
        infowindow.setContent(results[1].formatted_address);
        infowindow.open(map, marker);
      */
      } else {
        window.alert('No results found');
      }
    } else {
      window.alert('Geocoder failed due to: ' + status);
    }
  });
}
/*
function CenterControl(controlDiv, map) {

  var controlUI = document.createElement('div');
  controlUI.style.backgroundColor = '#fff';
  controlUI.style.border = '2px solid #fff';
  controlUI.style.borderRadius = '3px';
  controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
  controlUI.style.cursor = 'pointer';
  controlUI.style.marginBottom = '22px';
  controlUI.style.textAlign = 'center';
  controlUI.title = 'Click to recenter the map';
  controlDiv.appendChild(controlUI);

  var controlText = document.createElement('div');
  controlText.style.color = 'rgb(25,25,25)';
  controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
  controlText.style.fontSize = '16px';
  controlText.style.lineHeight = '38px';
  controlText.style.paddingLeft = '5px';
  controlText.style.paddingRight = '5px';
  controlText.innerHTML = 'Szukaj z Textboxa';
  controlUI.appendChild(controlText);

  
	
  controlUI.addEventListener('click', function() {
	
    map.setCenter(pozycja);

  });

  
}
*/
function initAutocomplete() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -33.8688, lng: 151.2195},
    zoom: 10,
    streetViewControl: false,
    disableDoubleClickZoom: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });

   if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      //infoWindow.setPosition(pos);
      //infoWindow.setContent('Location found.');
      map.setCenter(pos);
    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }

  //przycisk powrotu do markera
  //  var centerControlDiv = document.createElement('div');
  //var centerControl = new CenterControl(centerControlDiv, map);

  //centerControlDiv.index = 1;
  //map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);
  
  
  //przycisk reverse geocode
  
  var geocoder = new google.maps.Geocoder;
  var infowindow = new google.maps.InfoWindow;

  document.getElementById('submit').addEventListener('click', function() {
    geocodeLatLng(geocoder, map, infowindow);
  });
  
  
  
  
  
  
  // Create the search box and link it to the UI element.
  var input = document.getElementById('pac-input');
  var searchBox = new google.maps.places.SearchBox(input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);


  // [START region_getplaces]
  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
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
  // [END region_getplaces]
  
  /* ----------------------------------------------------------------------------------------------------*/
  
/*
map.addListener('click', function(event) {

    addMarker(event.latLng);
});
 */
map.addListener('dblclick', function(event) 
{
/*
mName = document.getElementById('Nazwa').value
mCzas = document.getElementById('Czas').value
mMiejsce = document.getElementById('Miejsce').value
mLokalizacja = document.getElementById('Lokalizacja').value
mKontakt = document.getElementById('Kontakt').value
mMin = document.getElementById('Min').value
mMax = document.getElementById('Max').value
mKategoria = document.getElementById('Kategoria').value
mOrganizator = document.getElementById('Organizator').value
*/
/*
DaneMarkera.mName = document.getElementById('Nazwa').value;
DaneMarkera.mCzas = document.getElementById('Czas').value;
   var contentString = '<div id="content">'+
      
		'Nazwa: '+DaneMarkera.mName+'</br>'+
	    'Czas: '+DaneMarkera.mCzas+'</br>'+
      +'</div>';
  
  
   var infowindow = new google.maps.InfoWindow({
    content: contentString
  });*/
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
  */
    //infowindow.open(map, marker);
});

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
    map: map
  });
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
  


  
}