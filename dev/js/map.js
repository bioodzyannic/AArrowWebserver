	var stylesArray = [
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#242f3e"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#746855"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#242f3e"
      }
    ]
  },
  {
    "featureType": "administrative.locality",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#d59563"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#d59563"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#263c3f"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#6b9a76"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#38414e"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#212a37"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9ca5b3"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#746855"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#1f2835"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#f3d19c"
      }
    ]
  },
  {
    "featureType": "transit",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#2f3948"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#d59563"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#17263c"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#515c6d"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#17263c"
      }
    ]
  }
]
  let icons = {
    emergencyred:"../images/emergencyred.png",
    greencheck:"../images/greencheck.png",
    greenphone:"../images/greenphone.png",
    redphone:"../images/redphone.png",
    redx:"../images/redx.png",
    shiftjohnny:"../images/shiftjohnny.png",
    yellowphone:"../images/yellowphone.png",
    laemergencyred:"../images/emergencyred.png",
    lagreencheck:"../images/greencheck.png",
    lagreenphone:"../images/greenphone.png",
    laredphone:"../images/redphone.png",
    laredx:"../images/redx.png",
    lashiftjohnny:"../images/shiftjohnny.png",
    layellowphone:"../images/yellowphone.png",
  };

  let map;

  function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
      center: { lat: 35.625125, lng: -95.099960 },
      zoom: 5,
      //styles: stylesArray
    });
    for (var img in icons){
      var lat = Math.random() * (47.644586 - 32.322133) + 32.322133;
      var lng = Math.random() * (-121.031972 - -76.202357) + -76.202357;

      var data = `
        <div class='aa-marker-info'>
            <h4>Springfield</h4>
            <div class="spec event-spec">
              <div class="event">
                <img src="../images/shiftjohnny.png" alt="">
                <span class="value">2</span>
              </div>

              <div class="event">
                <img src="../images/emergencyred.png" alt="">
                <span class="value">2</span>
              </div>

              <div class="event">
                <img src="../images/greenphone.png" alt="">
                <span class="value">2</span>
              </div>

              <div class="event">
                <img src="../images/yellowphone.png" alt="">
                <span class="value">2</span>
              </div>
               <div class="event">
                <img src="../images/yellowphone.png" alt="">
                <span class="value">2</span>
              </div>
               <div class="event">
                <img src="../images/yellowphone.png" alt="">
                <span class="value">2</span>
              </div>
            </div>
        </div>`;
      var infowindow = new google.maps.InfoWindow({
      content: data
      });
      var marker = new google.maps.Marker({
        position: { lat: parseFloat(lat), lng: parseFloat(lng)  },
        map,
        title: "Hello World!",
        //icon: `${icons[img]}`
        icon: "../images/map-icon.png",
        animation: google.maps.Animation.BOUNCE
      });


      google.maps.event.addListener(marker, 'mouseover', function() {
        infowindow.open(map,this);
      });

    }
  }
function resizeMain(dir){
  let mainCol = document.querySelector('.main-content');
  if(dir=1){
    mainCol.classList.remove('col-md-3');
    mainCol.classList.add('col-md-1');
  }else{
    mainCol.classList.remove('col-md-1');
    mainCol.classList.add('col-md-3');
  }


}

function showState(elem){
  let infoCol = document.getElementById('info-col');
  if(infoCol.classList==""){
    infoCol.classList.add('col-md-8');
    resizeMain(1);
  }
  infoCol.querySelector('h2').innerHTML='Location name';
}