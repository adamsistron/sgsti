var map, manager,parroquia='';
var centerLatitude = 10.545966332808822, centerLongitude = -71.62618160247803, startZoom = 12;
//var centerLatitude = 40.714737, centerLongitude = -73.986912, startZoom = 12;

function createMarkerClickHandler(marker, text, link) {
  return function() {
    marker.openInfoWindowHtml(
      '<b>' + text.tx_centro + '</b>' +
      '<p>Codigo: '+text.co_centro+'</p>'+      
      '<p>Municipio: '+text.tx_municipio+'</p>'+
      '<p>Parroquia: '+text.tx_parroquia+'</p>'+
      '<p>Cant. Mesas: '+text.cn_mesa+'</p>'+
      '<p>Cant. Votantes: '+text.nu_cant_votante+'</p>'+
      '<p>Cant. Patrulleros: '+text.cant_patrullero+'</p>'+
      '<p>Cant. Contactados: '+text.cant_contactado+'</p>'+
      '<p>Cant. PSUV: '+text.cant_psuv+'</p>'
      
    );
    return false;
  };
}


function createMarker(pointData) {
  var latlng = new GLatLng(pointData.coord_y, pointData.coord_x);

  var icon = new GIcon();
  icon.image = "images/centro.png";
  icon.iconSize = new GSize(40, 32);
  icon.iconAnchor = new GPoint(16, 16);
  icon.infoWindowAnchor = new GPoint(25, 7);

  opts = {
    "icon": icon,
    "clickable": true,
    "labelText": pointData.co_centro,
    "labelOffset": new GSize(-19, -40)
  };
 
  var marker = new LabeledMarker(latlng, opts);
  var handler = createMarkerClickHandler(marker, pointData, pointData.wp);
	
  GEvent.addListener(marker, "click", handler);
  
  	 
 
  var listItem = document.createElement('li');
  listItem.innerHTML = '<div class="label">' + pointData.co_centro + '</div><a href="' + pointData.wp + '">' + pointData.tx_centro + '</a>';
  listItem.getElementsByTagName('a')[0].onclick = handler;

  if(parroquia!=pointData.co_parroquia){
     var listParrafo = document.createElement('p');
     listParrafo = document.createElement('b');
     listParrafo.innerHTML = pointData.tx_parroquia;
     parroquia=pointData.co_parroquia;
     document.getElementById('sidebar-list').appendChild(listParrafo);
  }
  
  document.getElementById('sidebar-list').appendChild(listItem);

  return marker;
}

function windowHeight() {
  // Standard browsers (Mozilla, Safari, etc.)
  if (self.innerHeight) {
    return self.innerHeight;
  }
  // IE 6
  if (document.documentElement && document.documentElement.clientHeight) {
   return document.documentElement.clientHeight;
  }
  // IE 5
  if (document.body) {
    return document.body.clientHeight;
  }
  // Just in case. 
  return 0;
}

function handleResize() {
  var height = windowHeight() - 30;
  document.getElementById('map').style.height = height + 'px';
  document.getElementById('sidebar').style.height = height + 'px';
}

function init() {
  handleResize();
	
  map = new GMap(document.getElementById("map"));
  map.addControl(new GSmallMapControl());
  map.setCenter(new GLatLng(centerLatitude, centerLongitude), startZoom);
  map.addControl(new GMapTypeControl());

  manager = new MarkerManager(map);
	
  // This is a sorting trick, don't worry too much about it.
  markers.sort(function(a, b) { return (a.abbr > b.abbr) ? +1 : -1; }); 
	
  batch = [];
 
  for(id in markers) {
    batch.push(createMarker(markers[id]));
  }
  manager.addMarkers(batch, 11);
  manager.refresh();
}

function quitar() {
  handleResize();
	
  map = new GMap(document.getElementById("map"));
  map.addControl(new GSmallMapControl());
 // map.setCenter(new GLatLng(centerLatitude, centerLongitude), startZoom);
  map.addControl(new GMapTypeControl());

  manager = new MarkerManager(map);
	
  // This is a sorting trick, don't worry too much about it.
  markers.sort(function(a, b) { return (a.abbr > b.abbr) ? +1 : -1; }); 
	
  batch = [];
 
  for(id in markers) {
        manager.removeOverlay(new GLatLng(batch.coord_y,batch.coord_x));
  }
  
  manager.refresh();
}

window.onresize = handleResize;
window.onload = init;
window.onunload = GUnload;
