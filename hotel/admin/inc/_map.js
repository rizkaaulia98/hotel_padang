var map;
var server = "http://localhost/hotel_padang1/hotel/";//ipServerHotel
var cekRadiusStatus = "off";   //RADIUS
var circles = []; //RADIUS
var rad; //RADIUS

var markers = []; //MARKER UNTUK POSISI SAAT INI
var pos ='null'; //lat & lng POSISI SAAT INI
var centerLokasi; //lat & lng POSISI SAAT INI

var infowindow; //JENDELA INFO
var infoDua=[]; //HIMPUNAN JENDELA INFO
var markersDua = []; //HIMPUNAN MARKER
var markersManual = []; //HIMPUNAN MARKER

var info_landmark=[]; //HIMPUNAN JENDELA INFO
var markers_landmark = []; //HIMPUNAN MARKER

var centerBaru; //POSISI MAP
var ja;
var angkot = [];

var rekom_object=0;
var jumlah_tw = 0;

var rad_lat=0;
var rad_lng=0;
var pos_lat=0;
var pos_lng=0;

//tracking angkot
var marker_1 = []; //MARKER UNTUK POSISI SAAT INI
var marker_2 = []; //MARKER UNTUK POSISI SAAT INI
var route_awal = "";
var route_tujuan = "";
var awal = 0;
var tujuan = 0;

//tracking
var directionsDisplay;
var rute = [];

function init(){
      basemap();
      kotaTampil();
      // kecamatanTampil();
  }

function basemap(){   // GOOGLE MAP
  var cityName = document.getElementById('cityName').value;
  console.log(cityName);
  if (cityName=="CT02") {
    map = new google.maps.Map(document.getElementById('mapz'),
        {
          zoom: 13,
          center: new google.maps.LatLng(-0.3002500163531116,100.37187979983645),
          mapTypeId: google.maps.MapTypeId.ROADMAP
      });
  }else if (cityName=="CT01") {
    map = new google.maps.Map(document.getElementById('mapz'),
        {
          zoom: 11,
          center: new google.maps.LatLng(-0.8982650841808322,100.43464199680677),
          mapTypeId: google.maps.MapTypeId.ROADMAP
      });
  }
}

function kecamatanTampil(){   // PENAMPILAN PEMBAGIAN KECAMATAN
  kecamatan = new google.maps.Data();
  kecamatan.loadGeoJson(server+'kecamatan.php');
  kecamatan.setStyle(function(feature)
  {
    var gid = feature.getProperty('id');
    if (gid == 'K01'){
              return({
                fillColor:'#FF0000',
                strokeWeight:0.5,
                strokeColor:'#ffffff',
                fillOpacity: 0.4,
                clickable: false
              });
          }
            else if(gid == 'K02'){
              return({
                fillColor:'#ffd777',
                strokeWeight:0.5,
                strokeColor:'#ffffff',
                fillOpacity: 0.4,
                clickable: false
              });
          }
            else if(gid == 'K03'){
              return({
                fillColor:'#00b300' ,
                strokeWeight:0.5,
                strokeColor:'#ffffff' ,
                fillOpacity:0.4,
                clickable: false
              });
          }
            else if(gid == 'K04'){
              return({
                fillColor:'#33CCFF' ,
                strokeWeight:0.5,
                strokeColor:'#ffffff' ,
                fillOpacity: 0.4,
                clickable: false
              });
          }
            else if(gid == 'K05'){
              return({
                fillColor:'#337AFF' ,
                strokeWeight:0.5,
                strokeColor:'#ffffff' ,
                fillOpacity:0.4,
                clickable: false
              });
          }
            else if(gid == 'K06'){
              return({
                fillColor:'#FF9300' ,
                strokeWeight:0.5,
                strokeColor:'#ffffff' ,
                fillOpacity:0.4,
                clickable: false
              });
          }
            else if(gid == 'K07'){
              return({
                fillColor:'#66FF33' ,
                strokeWeight:0.5,
                strokeColor:'#ffffff' ,
                fillOpacity:0.4,
                clickable: false
              });
          }
            else if(gid == 'K08'){
              return({
                fillColor:'#996600' ,
                strokeWeight:0.5,
                strokeColor:'#ffffff' ,
                fillOpacity:0.4,
                clickable: false
              });
          }
            else if(gid == 'K09'){
              return({
                fillColor:'#FFFF00' ,
                strokeWeight:0.5,
                strokeColor:'#ffffff' ,
                fillOpacity:0.4,
                clickable: false
              });
          }
            else if(gid == 'K10'){
              return({
                fillColor:'#CC0099' ,
                strokeWeight:0.5,
                strokeColor:'#ffffff' ,
                fillOpacity:0.4,
                clickable: false
              });
          }
            else if(gid == 'K11'){
              return({
                fillColor:'#110094' ,
                strokeWeight:0.5,
                strokeColor:'#ffffff' ,
                fillOpacity:0.4,
                clickable: false
              });
          }
          });
  kecamatan.setMap(map);
}

function kotaTampil(){   // PENAMPILAN PEMBAGIAN KECAMATAN
  kecamatan = new google.maps.Data();
  kecamatan.loadGeoJson(server+'kota.php');
  kecamatan.setStyle(function(feature)
  {
    var gid = feature.getProperty('id');
    if (gid == 'CT01'){
              return({
                fillColor:'#00b300',
                strokeWeight:0.5,
                strokeColor:'#ffffff',
                fillOpacity: 0.4,
                clickable: false
              });
          }
            else if(gid == 'CT02'){
              return({
                fillColor:'#FF0000',
                strokeWeight:0.5,
                strokeColor:'#ffffff',
                fillOpacity: 0.4,
                clickable: false
              });
          }
          });
  kecamatan.setMap(map);
}
function legenda()
{
$('#tombol').empty();
$('#tombol').append('<a type="button" id="hidelegenda" onclick="hideLegenda()" class="btn btn-default " data-toggle="tooltip" title="Hide Legends" style="margin-right: 7px;"><i class="fa fa-eye-slash"></i></a> ');

var layer = new google.maps.FusionTablesLayer(
{
  query: {
    select: 'Location',
    from: 'AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE'
  },
  map: map
});
var legend = document.createElement('div');
legend.id = 'legend';
var content = [];
content.push('<h4>Legends</h4>');

content.push('<p><div class="color a"></div>Padang City</p>');
content.push('<p><div class="color b"></div>Bukittinggi City</p>');

// content.push('<p><div class="color a"></div>Lubuk Kilangan District</p>');
// content.push('<p><div class="color b"></div>Pauh District</p>');
// content.push('<p><div class="color c"></div>South Padang District</p>');
// content.push('<p><div class="color d"></div>Lubuk Begalung District</p>');
// content.push('<p><div class="color e"></div>East Padang District</p>');
// content.push('<p><div class="color f"></div>Kuranji District</p>');
// content.push('<p><div class="color g"></div>Nanggalo District</p>');
// content.push('<p><div class="color h"></div>West Padang District</p>');
// content.push('<p><div class="color i"></div>North Padang District</p>');
// content.push('<p><div class="color j"></div>Bungus District</p>');
// content.push('<p><div class="color k"></div>Koto Tangah District</p>');

legend.innerHTML = content.join('');
legend.index = 1;
map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(legend);


}

function hideLegenda() {
$('#legend').remove();
$('#tombol').empty();
console.log("hy jackkky");
$('#tombol').append('<a type="button" id="showlegenda" onclick="legenda()" class="btn btn-default btn-sm " data-toggle="tooltip" title="Legends" style="margin-right: 7px;color:black;"><i class="fa fa-eye" style="color:black;"> </i></a>');
}

/* **********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
DATA
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*********************************************************************************************************************************************************** */

function hapus_Semua(){  // HAPUS SEMUA DATA - REBUILD GOOGLE MAP
  //set posisi
  init();

  //hapus semua data
  hapus_landmark();
  hapus_kecuali_landmark();
}

function hapus_kecuali_landmark(){ //
  hapusRadius();        //circles
  // hapusMarkerObject();  //markesDua
  hapusInfo();          //infoDua
  clearangkot();        //angkot
  clearroute();         //rute
}

function hapusMarkerObject() {  // HAPUS MARKER DUA
    for (var i = 0; i < markersDua.length; i++) {
          markersDua[i].setMap(null);
      }
  }

function hapusRadius(){ // HAPUS RADIUS
  for(var i=0;i<circles.length;i++)
   {
       circles[i].setMap(null);
   }
  circles=[];
  cekRadiusStatus = 'off';
  }

function hapus_landmark(){ // HAPUS MARKER & INFO LANDMARK
  for (var i = 0; i < info_landmark.length; i++) {
      info_landmark[i].setMap(null);
  }
  for (var i = 0; i < markers_landmark.length; i++) {
        markers_landmark[i].setMap(null);
  }
}

function hapusInfo() {  // HAPUS INFO WINDOW 2
  for (var i = 0; i < infoDua.length; i++) {
      infoDua[i].setMap(null);
    }
}

function clearangkot(){ // HAPUS ANGKOT
  for (i in angkot){
      angkot[i].setMap(null);
    }
    angkot=[];
}

function clearroute(){  // HAPUS RUTE
  for (i in rute){
    rute[i].setMap(null);
  }
  rute=[];
}

/* **********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
WINDOW
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*********************************************************************************************************************************************************** */

function menu_angkot() { // KLIK MENU ANGKOT KIRI
  $("#view_kanan_table").show();

  //ANGKOT
  $("#view_kanan_track").hide();
  $("#view_tracking").hide();
  $("#view_object_sekitar").hide();

  //TW
  $("#view_kanan_data").hide();
  $("#view_kanan_select").hide();

  $("#view_galery").hide();

  //HOTEL
  $("#view_rekom").hide();
  $("#view_kanan_rekom").hide();
}

function menu_rekom() {
  $("#view_kanan_rekom").show();
  console.log("masuuuuk");

  $("#view_kanan_table").hide();
  $("#view_kanan_track").hide();
  $("#view_tracking").hide();
  $("#view_object_sekitar").hide();
  $("#view_kanan_data").hide();
  $("#view_kanan_select").hide();

  $("#view_galery").hide();

  $("#view_rekom").hide();
}

function hapus_menu() { //
  $("#view_data_tengah").hide();
  $("#view_tracking").hide();
  $("#view_kanan_table").hide();
  $("#view_table_sekitar").hide();
  $("#view_kanan_track").hide();
  $("#view_kanan_table1").hide();
  $("#view_tracking2").hide();


}

/* **********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
FUNGSI DIPAKAI BERSAMA
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*********************************************************************************************************************************************************** */

function route_angkot_1(id,color){
  console.log("jalan");
  console.log(color);
      ja = new google.maps.Data();
      ja.loadGeoJson('tampilkanrute.php?id_angkot='+id);
      ja.setStyle(function(feature){
      return({
          fillColor: 'yellow',
          strokeColor: color,
          strokeWeight: 3,
          fillOpacity: 0.5
          });
      });
      ja.setMap(map);
      angkot.push(ja);
}

function galeri(a){
    console.log(a);
    window.open(server+'gallery.php?idgallery='+a);
 }

function posisisekarang(){
google.maps.event.clearListeners(map, 'click');
navigator.geolocation.getCurrentPosition(function(position)
{
  pos = {
    lat: position.coords.latitude,
    lng: position.coords.longitude};
  koordinat = {
    lat: position.coords.latitude,
    lng: position.coords.longitude };

  centerBaru = new google.maps.LatLng(koordinat.lat, koordinat.lng);
  centerLokasi = centerBaru;
  map.setCenter(centerBaru)
  map.setZoom(16);

  var marker = new google.maps.Marker({
            position: koordinat,
            animation: google.maps.Animation.DROP,
            map: map});

  marker.info = new google.maps.InfoWindow({
      content: "<center><a style='color:black;'>You are here! <br> lat : "+koordinat.lat+" <br> long : "+koordinat.lng+"</a></center>",
      pixelOffset: new google.maps.Size(0, -1)
        });
      marker.info.open(map, marker);

  pos_lat = koordinat.lat;
  pos_lng = koordinat.lng;
  document.getElementById('myLatLocation').value = koordinat.lat;
  document.getElementById('myLngLocation').value = koordinat.lng;
  console.log(pos_lat);
  console.log(pos_lng);
})
}

function lokasimanual(){
alert('Click Map');
map.addListener('click', function(event) {
  addMarker_Manual(event.latLng);
  });
}

function addMarker_Manual(location){
for (var i = 0; i < markersManual.length; i++) {
  markersManual[i].setMap(null);
}

marker = new google.maps.Marker({
 //icon: "assets/img/biru1.ico",
  position : location,
  map: map,
  animation: google.maps.Animation.DROP,
  });

koordinat = {
  lat: location.lat(),
  lng: location.lng() };

centerLokasi = new google.maps.LatLng(koordinat.lat, koordinat.lng);

marker.info = new google.maps.InfoWindow({
    content: "<center><a style='color:black;'>You are here! <br> lat : "+koordinat.lat+" <br> long : "+koordinat.lng+"</a></center>",
    pixelOffset: new google.maps.Size(0, -1)
      });
marker.info.open(map, marker);
map.setCenter(koordinat);
map.setZoom(18);
markersManual.push(marker);

document.getElementById('myLatLocation').value = koordinat.lat;
document.getElementById('myLngLocation').value = koordinat.lng;
pos_lat = koordinat.lat;
pos_lng = koordinat.lng;
console.log(pos_lat);
console.log(pos_lng);
}

function set_center(lat,lon,nama){

//Hapus Info Sebelumnya
hapusInfo();

//POSISI MAP
var centerBaru      = new google.maps.LatLng(lat, lon);
map.setCenter(centerBaru);

//JENDELA INFO
var infowindow = new google.maps.InfoWindow({
      position: centerBaru,
      content: "<bold style='color:black'>"+nama+"</bold>",

    });
infoDua.push(infowindow);
infowindow.open(map);

}

function add_marker(lat,lng,name,tipe){
var pos = new google.maps.LatLng(lat, lng);
marker = new google.maps.Marker({
 //icon: "assets/img/biru1.ico",
  position : pos,
  map: map,
  animation: google.maps.Animation.DROP,
  });
if (name != "") {
  marker.info = new google.maps.InfoWindow({
      content: "<center><a style='color:black;'>"+name+"</a></center>",
      pixelOffset: new google.maps.Size(0, -1)
        });
  marker.info.open(map, marker);
}
markersDua.push(marker);
klikInfoWindow(id,marker);
}

function data_hotel_1_info(ids){ // DATA 1 TOURISM
hapus_kecuali_landmark();
// hapusRadius();        //circles
// hapusInfo();          //infoDua
//basemap();
hapus_landmark();
$("#view_data_tengah").show();

$('#table_tengah_info').empty();
$.ajax({url: server+'_data_hotel_1.php?cari='+ids, data: "", dataType: 'json', success: function(rows){
  for (var i in rows.data){
    var row = rows.data[i];
    var id = row.id;
    var name = row.name;
    var access = row.access;
    var address = row.address;
    var cp = row.cp;
    var ktp = row.ktp;
    var marriage_book = row.marriage_book;
    var mushalla = row.mushalla;
    var type_hotel = row.type_hotel;
    var lat=row.lat;
    var lng = row.lng;

    var syarat="-";
    if (ktp == 1 && marriage_book == 1) {
      syarat = "ID Card & Marriage Certificate";
    }
    else if (ktp == 1) {
      syarat = "ID Card";
    } else if (marriage_book == 1) {
      syarat = "Marriage Certificate";
    }

    var mushalla_stat = "-";
    if (mushalla == 1) {
      mushalla_stat = "Exist"
    };

    var acc = "-";
    if (access == 1) {
      acc = "Bus"
    }else {
      acc = "No Bus"
    };

    console.log(name);
    $('#table_tengah_info').append(
      "<tr><td style='text-align:left'>Name</td> <td>:</td> <td style='text-align:left'> "+name+"</td></tr>"+
      "<tr><td style='text-align:left'>Address</td> <td>:</td> <td style='text-align:left'> "+address+"</td></tr>"+
      "<tr><td style='text-align:left'>Contact Person</td> <td>:</td> <td style='text-align:left'> "+cp+"</td></tr>"+
      "<tr><td style='text-align:left'>Requirements</td> <td>:</td> <td style='text-align:left'> "+syarat+"</td></tr>"+
      "<tr><td style='text-align:left'>Transportation Access</td> <td>:</td> <td style='text-align:left'> "+acc+"</td></tr>"+
      "<tr><td style='text-align:left'>Mushalla</td> <td>:</td> <td style='text-align:left'> "+mushalla_stat+"</td></tr>"+
      "<tr><td style='text-align:left'>Type</td> <td>:</td> <td style='text-align:left'> "+type_hotel+"</td></tr>");

    //MARKER
    rad_lat = lat;
    rad_lng = lng;
    console.log(rad_lat);
    console.log(rad_lng);
    var pos = new google.maps.LatLng(rad_lat, rad_lng);
    marker = new google.maps.Marker({
     icon: "icon/marker_hotel.png",
      position : pos,
      map: map,
      animation: google.maps.Animation.DROP,
      });
    marker.info = new google.maps.InfoWindow({
        content: "<span style=color:black><center><b>"+name+"</b></center><br><i class='fa fa-map-marker'></i>"+address+"<br><i class='fa fa-phone'></i>"+cp+"<br><br><a class='btn btn-default fa fa-road' role=button' onclick='route_sekitar(\""+pos_lat+"\",\""+pos_lng+"\",\""+rad_lat+"\",\""+rad_lng+"\")' title='route' aria-controls='Route' id='btn_angkot' style='color: white; background-color: #26a69a;'></a>&nbsp<a class='btn btn-default fa fa-info' role=button' onclick='galeri(\""+ids+"\")' title='Info' aria-controls='Info' id='btn_gallery' style='color: white; background-color: #26a69a;'></a></label>&nbsp<a class='btn btn-default fa fa-compass' role=button' onclick='cekNearBy()' title='Nearby' aria-controls='Nearby' id='btn_angkot' style='color: white; background-color: #26a69a;'></a></span>",
        pixelOffset: new google.maps.Size(0, -1)
          });
    marker.info.open(map, marker);
    markers_landmark.push(marker);
    klikInfoWindow(id,marker);
    map.setZoom(18);
  }//end for


  //ROOM HOTEL
  var isi="<tr>";
  for (var i in rows.kamar){
    var row = rows.kamar[i];
    var id_room = row.id_room;
    var id_hotel = row.id_hotel;
    var name = row.name;
    var price = row.price;
    var available = row.available;
    var sisa = row.sisa;

    console.log(name);
    isi = isi+"<td>"+name+"</td> <td>"+price+"</td> <td style='text-align:center;'>"+sisa+"</td> </tr>";
  }//end for
  isi = isi + "</ol>";
  $('#table_tengah_kamar').append(isi);

  //FASILITAS HOTEL
  var isi="<ol>";
  for (var i in rows.fasilitas){
    var row = rows.fasilitas[i];
    var id = row.id;
    var name = row.name;
    console.log(name);
    isi = isi+"<li>"+name+"</li>";
  }//end for
  isi = isi + "</ol>";
  $('#table_tengah_fas').append("<tr><td style='text-align:left'> "+isi+"</td></tr>");



  // Tombol Angkot
  $('#label_angkot').empty();
  $('#label_angkot').append("<a class='btn btn-default' role=button' data-toggle='collapse'  onclick='angkot_sekitar(\""+ids+"\")' title='Nearby' aria-controls='Nearby' id='btn_angkot'><i class='fa fa-compass' style='color:black;''></i><label>&nbsp Angkot</label></a>")

  // Tombol Gallery
  $('#label_gallery').empty();
  $('#label_gallery').append("<a class='btn btn-default' role=button' data-toggle='collapse'  onclick='galeri(\""+ids+"\")' title='Nearby' aria-controls='Nearby' id='btn_gallery'><i class='fa fa-compass' style='color:black;''></i><label>&nbsp Gallery</label></a>")

}});//end ajax

}

function tampilrute(id, warna, latitude, longitude){ //TAMPILKAN RUTE
ja = new google.maps.Data();
ja.loadGeoJson(server+'tampilkanrute.php?id_angkot='+id);
ja.setStyle(function(feature){
  return({
      fillColor: 'yellow',
      strokeColor: warna,
      strokeWeight: 2,
      fillOpacity: 0.5
      });
});
ja.setMap(map);
angkot.push(ja);
map.setZoom(16);
}

function cekNearBy(){
  // var kt = document.getElementById('view_kanan_table');
  $("#view_kanan_table").empty();
  $('#kanan_table').empty();
  $('#kanan_table1').show();
  $("#view_kanan_table1").show();
  var stringHTML = "<tr><td colspan='3'><div class='checkbox'><label style='float:left'><input id='check_tw' type='checkbox'>Tourism Destination</label></div><div class='checkbox'><label style='float:left'><input id='check_oo' type='checkbox' value=''> Souvenir Store</label></div><div class='checkbox'><label style='float:left'> <input id='check_m' type='checkbox' value=''>Worship Place</label></div><div class='checkbox'><label style='float:left'><input id='check_k' type='checkbox' value=''>Culinary Place</label></div><div class='checkbox'><label style='float:left'><input id='check_h' type='checkbox' value='5'>Hotel</label></div><label for='inputradius2' style='float: left; font-size: 10pt;'>Radius : </label><label  id='radiusobj'  style='float:left; font-size: 10pt;'>0</label> <span style='float:left;font-size: 10pt;'> m</span><input id='inputradius2' type='range' onchange='aktifkanRadius();radiusobejct();' name='inputradius' data-highlight='true' min='1' max='10' value='1'><div id='angkot_sekitar' class='centered'></div></td></tr>";
  document.getElementById('kanan_table1').innerHTML = stringHTML;
  //$('#kanan_table').empty();

}

function radiusobejct()
{
  document.getElementById('radiusobj').innerHTML=document.getElementById('inputradius2').value*100;
  // console.log(document.getElementById('inputradius').value*100);
}

function route_angkot(lat1,lng1,lat,lng,id_angkot,id) {

  /*
  lat1  Titik Turun
  lng1
  lat   Objek
  lng
  id -> untuk marker
  */
  init(); // FORMAT MAP

  //MARKER
  centerBaru = new google.maps.LatLng(lat1, lng1);
  map.setCenter(centerBaru);
  map.setZoom(16);
  if (id.includes("HT")) {
    var marker = new google.maps.Marker({
      position: centerBaru,
      icon:'icon/marker_hotel.png',
      animation: google.maps.Animation.DROP,
      map: map
      });
  } else if (id.includes("TM")) {
    var marker = new google.maps.Marker({
      position: centerBaru,
      icon:'icon/marker_tw.png',
      animation: google.maps.Animation.DROP,
      map: map
      });
  }else if (id.includes("M")) {
    var marker = new google.maps.Marker({
      position: centerBaru,
      icon:'icon/marker_masjid.png',
      animation: google.maps.Animation.DROP,
      map: map
      });
  } else if (id.includes("SO")) {
    var marker = new google.maps.Marker({
      position: centerBaru,
      icon:'icon/marker_oo.png',
      animation: google.maps.Animation.DROP,
      map: map
      });
  }else if (id.includes("RM")) {
    var marker = new google.maps.Marker({
      position: centerBaru,
      icon:'icon/marker_kuliner.png',
      animation: google.maps.Animation.DROP,
      map: map
      });
  }
  markersDua.push(marker);
  klikInfoWindow(id,marker);

  tampilrute(id_angkot, "red", lat1, lng1);  //TAMPILKAN RUTE  ANGKOT

  var end = new google.maps.LatLng(lat1, lng1);
  var start = new google.maps.LatLng(lat, lng);

  if(directionsDisplay){
      clearroute();
      hapusInfo();
  }

  directionsService = new google.maps.DirectionsService();
  var request = {
    origin:start,
    destination:end,
    travelMode: google.maps.TravelMode.WALKING,
    unitSystem: google.maps.UnitSystem.METRIC,
    provideRouteAlternatives: true
  };

  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
     directionsDisplay.setDirections(response);
   }
  });

  directionsDisplay = new google.maps.DirectionsRenderer({
    draggable: false,
    polylineOptions: {
      strokeColor: "darkorange"
    }
  });

  directionsDisplay.setMap(map);
  rute.push(directionsDisplay);
   document.getElementById('view_tracking_table2').innerHTML="";
        $("#view_tracking2").show();
        directionsDisplay.setPanel(document.getElementById('view_tracking_table2'));
}


/* **********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
MENU 1 LIST TOURISM
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*********************************************************************************************************************************************************** */

function listHotel(){ // Menu list Hotel
  // clearangkot();
  hapus_menu();
  $('#galleryrecommendxxx').hide();
  $('#view_kanan_table').show();
  document.getElementById('judul_table').innerHTML="Results";

  $('#kanan_table').empty();
  $('#kanan_table').append("<tr><th class='centered'>Name</th><th class='centered' colspan='3'>Action</th></tr>");
  // console.log(server+'/_data_hotel.php');
  $.ajax({
  url: server+'/_data_hotel.php', data: "", dataType: 'json', success: function(rows)
  {
      for (var i in rows){
        var row = rows[i];
        var id = row.id;
        var name = row.nama;
        var latitude=row.latitude;
        var longitude = row.longitude;
        console.log(id + latitude +longitude);
        $('#kanan_table').append("<tr><td>"+name+"</td><td><a role='button' class='btn btn-success fa fa-info' title='info'  onclick='data_hotel_1_info(\""+id+"\")'></a></td><td><a role='button' class='btn btn-danger fa fa-taxi' title='Angkot' onclick='angkot_sekitar(\""+id+"\")'></a></td></tr>");

        //MARKER
        centerBaru = new google.maps.LatLng(latitude, longitude);
        map.setCenter(centerBaru);

        map.setZoom(13);
        var marker = new google.maps.Marker({
          position: centerBaru,
          icon:'icon/marker_hotel.png',
          animation: google.maps.Animation.DROP,
          map: map
          });
        markersDua.push(marker);
        map.setCenter(centerBaru);
        klikInfoWindow(id,marker);
      }
    }
  });

}

function cariByRoute() //mencari hotel sekitar jalur angkot
    {
        hapus_menu();
        hapus_Semua();
        $('#galleryrecommendxxx').hide();

        $('#view_kanan_table').show();
        document.getElementById('judul_table').innerHTML="Result";

        var id_angkot = "";
        id_angkot = document.getElementById('jurusan').value;

        $('#kanan_table').show();
        $('#kanan_table').empty();

        $('#kanan_table').append("<tr><th class='centered'>Name</th><th class='centered'>Distance</th><th class='centered' colspan='3'>Action</th></tr>");
        console.log(server+'_cariroute.php?id_angkot='+id_angkot);
        $.ajax({url: server+'_cariroute.php?id_angkot='+id_angkot, data: "", dataType: 'json', success: function(rows)
        {
          if(rows == null)
          {
            alert('Data Did Not Exist !');
          }
            for (var i in rows)
            {
              var row  = rows[i];
              var id   = row.id;
              var name = row.name;
              var lng1 = row.lng1;
              var lat1 = row.lat1;
              var lng2 = row.lng2;
              var lat2 = row.lat2;
              var lng3 = row.lng3;
              var lat3 = row.lat3;
              var distance = row.distance;
              var route_color = row.route_color;

              $('#kanan_table').append("<tr><td>"+name+"</td><td>"+distance+" m"+"</td><td><a role='button' style='' class='btn btn-success fa fa-info' onclick='data_hotel_1_info(\""+id+"\")'></a></td><td><a role='button' class='btn btn-success fa fa-road' title='Walking road' style='padding: 6px' onclick='clearangkot(modal_angkot); route_angkot(\""+lat2+"\",\""+lng2+"\",\""+lat1+"\",\""+lng1+"\",\""+id_angkot+"\",\""+id+"\")'></a></td></tr>");

              //MARKER
              centerBaru = new google.maps.LatLng(lat2, lng2);
              map.setCenter(centerBaru);
              map.setZoom(12);
              var marker = new google.maps.Marker({
                position: centerBaru,
                icon:'icon/marker_hotel.png',
                animation: google.maps.Animation.DROP,
                map: map
              });
              markersDua.push(marker);
              map.setCenter(centerBaru);
              klikInfoWindow(id,marker);
              route_angkot_1(id_angkot,route_color);
            }//end for
          }
        });//end ajax
    }

function listAngkot(){ // Menu Angkot - List Angkot
         //clearangkot();
         // hapus_menu();
         // $('#view_kanan_table').show();
         document.getElementById('judul_table').innerHTML="List Angkot";

         $('#kanan_table').empty();
         // $('#kanan_table').append("<tr><th class='centered'>Destination</th><th class='centered'>Action</th></tr>");
         $.ajax({
         url: server+'/_data_angkot.php', data: "", dataType: 'json', success: function(rows)
         {
             for (var i in rows){
               var row = rows[i];
               var id = row.id;
               var destination = row.destination;
               var track = row.track;
               var cost = row.cost;
               var number = row.number;
               var color = row.color;
               var route_color = row.route_color;
               console.log(id);
               var latitude=row.latitude;
               var longitude = row.longitude;
               // $('#kanan_table').append("<tr><td>"+destination+"</td><td><a role='button' class='btn btn-default fa fa-info' onclick='data_angkot_1_info(\""+id+"\"),data_angkot_1_rute(\""+id+"\")'>&nbsp&nbsp&nbspInfo</a></td></tr>");

               route_angkot_1(id,route_color);
             }
           }
         });
       }

       function data_angkot_1_rute(id_angkot){ // ANGKOT - KLIK TOMBOL RUTE - DATA 1 ANGKOT
         hapus_kecuali_landmark();
         $.ajax({url: server+'/tampilkanrute.php?id_angkot='+id_angkot, data: "", dataType: 'json', success: function(rows){
           for (var i in rows.features)
             {
               var id_angkot=rows.features[i].properties.id;
               var destination=rows.features[i].properties.destination;
               var track=rows.features[i].properties.track;
               var cost=rows.features[i].properties.cost;
               var color=rows.features[i].properties.color;
               var latitude  = rows.features[i].properties.latitude;
               var longitude = rows.features[i].properties.longitude ;

               listgeom_tw(id_angkot);  //INFO WINDOW
               tampilrute(id_angkot, "red", latitude, longitude);  //TAMPILKAN RUTE

             }//end for
         }});//end ajax

       }

       function data_angkot_1_info(id_angkots){ // ANGKOT - KLIK TOMBOL RUTE - DATA 1 ANGKOT
          $("#view_data_tengah").show();
          $.ajax({url: server+'/tampilkanrute.php?id_angkot='+id_angkots, data: "", dataType: 'json', success: function(rows){
            for (var i in rows.features)
              {
                var id_angkot=rows.features[i].properties.id;
                var destination=rows.features[i].properties.destination;
                var track=rows.features[i].properties.track;
                var cost=rows.features[i].properties.cost;
                var color=rows.features[i].properties.color;
                var latitude  = rows.features[i].properties.latitude;
                var longitude = rows.features[i].properties.longitude ;

                // Data Angkot
                $('#table_tengah_info').empty();
                $('#table_tengah_info').append("<tr><td style='text-align:left'>Destination</td><td>:</td><td style='text-align:left'> "+destination+"</td></tr><tr><td style='text-align:left'>Track</td><td>:</td><td style='text-align:left'> "+track+"</td></tr><tr><td style='text-align:left'>Cost</td><td>:</td><td style='text-align:left'> "+cost+"</td></tr><tr><td style='text-align:left'>Color</td><td>:</td><td style='text-align:left'> "+color+"</td></tr>")

                // Tombol Button Sekitar Angkot
                $('#angkot_sekitar').empty();
                $('#angkot_sekitar').append("<a role='button' class='btn btn-default text-center' onclick='objek_sekitar_angkot(\""+id_angkots+"\")' id='btnik' style='margin:10px'>Process </a>");

          // Tombol Gllaery
                $('#label_gallery').empty();
                console.log(id_angkots);
                $('#label_gallery').append("<a class='btn btn-default' role=button' data-toggle='collapse'  onclick='galeri(\""+id_angkots+"\")' title='Nearby' aria-controls='Nearby' id='btn_gallery'><i class='fa fa-compass' style='color:black;''></i><label>&nbsp Gallery</label></a>")

              }//end for
          }});//end ajax

        }

// **********************************************************************************************************************************************************
// **********************************************************************************************************************************************************
// ***********************************************************Hotel Recommendations**************************************************************************
// **********************************************************************************************************************************************************
// **********************************************************************************************************************************************************
function rec_hotel(tipe){ // PENCARIAN hotel recom
  console.log("menu jalan")
  hapus_menu();
  hapus_Semua();
  // DEKLARASI
  if (tipe == 1) {
    document.getElementById('judul_table').innerHTML="Results of Star Hotel Recommendations";
  } else if (tipe == 2) {
    document.getElementById('judul_table').innerHTML="Results of Budget Hotel Recommendations";
  } else if (tipe == 3) {
    document.getElementById('judul_table').innerHTML="Results of Syariah Hotel Recommendations";
  }else if (tipe == 4) {
    document.getElementById('judul_table').innerHTML="Results of Best View Hotel Recommendations";
  }

    $("#view_rec_table").show();
    $('#rec_table').empty();
    // $('#galleryrecommendxxx').hide();


  $('#rec_table').append("<tr><th class='centered'>Name</th><th class='centered' colspan='3'>Action</th></tr>");
  console.log(server+'_reco.php?tipe='+tipe);
  $.ajax({url: server+'_reco.php?tipe='+tipe, data: "", dataType: 'json', success: function(rows){
    if(rows == null)
    {
      alert('Data Did Not Exist !');
      $("#view_rec_table").hide();
    }
      for (var i in rows){
        var row = rows[i];
        var id = row.id;
        var name = row.name;
        var lng = row.lng;
        var lat = row.lat;
        console.log(id);
        $('#rec_table').append("<tr><td>"+name+"</td><td><a role='button' class='btn btn-success fa fa-info' onclick='data_hotel_1_info(\""+id+"\")'></a></td><td><a role='button' class='btn btn-danger fa fa-taxi' title='Angkot' onclick='angkot_sekitar(\""+id+"\")'></a></td></tr>");

        //MARKER
        centerBaru = new google.maps.LatLng(lat, lng);
        map.setCenter(centerBaru);
        map.setZoom(16);
        var marker = new google.maps.Marker({
          position: centerBaru,
          icon:'icon/marker_hotel.png',
          animation: google.maps.Animation.DROP,
          map: map
          });
        markersDua.push(marker);
        klikInfoWindow(id,marker);
      }//end for
  }});//end ajax
}


/* **********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
MENU 2 TOURISM DISEKITAR
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*********************************************************************************************************************************************************** */

function hotel_sekitar_user(){ // Menu Angkot Sekitar
$('#galleryrecommendxxx').hide();
hapus_Semua();
hapus_menu();

if (pos_lat == 0 || pos_lng == 0) {
  alert ('Determine your position first');
} else {

  console.log(rad_lat);
  console.log(rad_lng);
  rad_lat=pos_lat;
  rad_lng=pos_lng;

  //radius
  var pos = new google.maps.LatLng(rad_lat, rad_lng);
  map.setCenter(pos);
  map.setZoom(16);

  var inputradius=document.getElementById("inputradius").value;
  rad = parseFloat(inputradius*100);
  var circle = new google.maps.Circle({
    center: pos,
    radius: rad,
    map: map,
    strokeColor: "blue",
    strokeOpacity: 0.5,
    strokeWeight: 1,
    fillColor: "blue",
    fillOpacity: 0.35
  });
  circles.push(circle);

  menu_angkot();
  ht_sekitar_user(rad_lat,rad_lng,rad);

  //MARKER
  centerLokasi = new google.maps.LatLng(rad_lat, rad_lng);
  marker = new google.maps.Marker({
   //icon: "assets/img/biru1.ico",
    position : centerLokasi,
    map: map,
    animation: google.maps.Animation.DROP,
    });
  marker.info = new google.maps.InfoWindow({
      content: "<center><a style='color:black;'>You are here! <br> lat : "+rad_lat+" <br> long : "+rad_lng+"</a></center>",
      pixelOffset: new google.maps.Size(0, -1)
        });
  marker.info.open(map, marker);
  map.setCenter(centerLokasi);
  map.setZoom(16);
  markersManual.push(marker);
}
}

function ht_sekitar_user(latitude,longitude,rad){ // TEMPAT WISATA SEKITAR USER
  $('#kanan_table').empty();
  $('#kanan_table').append("<tr><th class='centered'>Hotel's Name</th><th class='centered' colspan='3'>Action</th></tr>");
  $.ajax({url: server+'_sekitar_hotel.php?lat='+latitude+'&lng='+longitude+'&rad='+rad, data: "", dataType: 'json', success: function(rows){
    if(rows == null)
    {
      alert('Data Did Not Exist !');
    }
    for (var i in rows){
      var row = rows[i];
      var id = row.id;
      var name = row.name;
      // var jarak = row.jarak;
      var lat = row.lat;
      var lon = row.lng;

      //POSISI MAP
      centerBaru = new google.maps.LatLng(lat, lon);
      map.setCenter(centerBaru);
      map.setZoom(16);
      var marker = new google.maps.Marker({
        position: centerBaru,
        icon:'icon/marker_hotel.png',
        animation: google.maps.Animation.DROP,
        map: map
        });
      markersDua.push(marker);
      klikInfoWindow(id,marker);
      map.setCenter(centerBaru);

      $('#kanan_table').append("<tr><td>"+name+"</td><td><a role='button' class='btn btn-success fa fa-info' onclick='data_hotel_1_info(\""+id+"\")'></a></td><td><a role='button' style='margin:5px' class='btn btn-danger fa fa-taxi' onclick='angkot_sekitar(\""+id+"\")'></a></td></tr>");
    }//end for
  }});//end ajax

}

/* **********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
MENU 3 4 5 Tourism's Search
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*********************************************************************************************************************************************************** */

function cari_hotel(tipe){ // PENCARIAN ANGKUTAN KOTA
  console.log("menu jalan")
  hapus_menu();
  hapus_Semua();
  // DEKLARASI
  var y = "";
  var x = "";
  if (tipe == 1) {
    document.getElementById('judul_table').innerHTML="Search Results Hotel by Name";
    y = document.getElementById('input_name').value;
  } else if (tipe == 2) {
    document.getElementById('judul_table').innerHTML="Search Results Hotel by Address";
    y = document.getElementById('input_address').value;
  } else if (tipe == 3) {
    document.getElementById('judul_table').innerHTML="Search Results Hotel by Type";
    y = document.getElementById('select_jenis').value;
  }else if (tipe == 4) {
    document.getElementById('judul_table').innerHTML="Search Results Hotel by Service";
    y = document.getElementById('select_service').value;
  }else if (tipe == 5) {
    document.getElementById('judul_table').innerHTML="Search Results Hotel by Price";
    y = document.getElementById('rendah').value;
    x = document.getElementById('tinggi').value;
  }else if (tipe == 6) {
    document.getElementById('judul_table').innerHTML="Search Results Hotel by Rating";
    y = document.getElementById('select_rating').value;
  }else if (tipe == 7) {
    document.getElementById('judul_table').innerHTML="Search Results Hotel by Facility";
    y = document.getElementById('select_facility').value;
  }else if (tipe == 8) {
    document.getElementById('judul_table').innerHTML="Search Results Hotel by Access";
    y = document.getElementById('select_access').value;
  }

  if (y == "" && x == "") {
    document.getElementById('modal_title').innerHTML="Info";
    document.getElementById('modal_body').innerHTML="Please Fill in the form ";
    $('#myModal').modal('show');
    return;
  } else {
    $("#view_kanan_table").show();
    $('#kanan_table').empty();
    $('#galleryrecommendxxx').hide();
  }

  //kosongkan input pencarian
  document.getElementById('input_name').value="";
  document.getElementById('input_address').value="";
  document.getElementById('rendah').value="";
  document.getElementById('tinggi').value="";

  $('#kanan_table').append("<tr><th class='centered'>Name</th><th class='centered' colspan='3'>Action</th></tr>");
  console.log(server+'_data_hotel_cari.php?tipe='+tipe+'&nilai='+y+'&nilai2='+x);
  $.ajax({url: server+'_data_hotel_cari.php?tipe='+tipe+'&nilai='+y+'&nilai2='+x, data: "", dataType: 'json', success: function(rows){
    if(rows == null)
    {
      alert('Data Did Not Exist !');
    }
      for (var i in rows){
        var row = rows[i];
        var id = row.id;
        var name = row.name;
        var lng = row.lng;
        var lat = row.lat;
        console.log(id + lat +lng);
        $('#kanan_table').append("<tr><td>"+name+"</td><td><a role='button' class='btn btn-success fa fa-info' onclick='data_hotel_1_info(\""+id+"\")'></a></td><td><a role='button' class='btn btn-danger fa fa-taxi' title='Angkot' onclick='angkot_sekitar(\""+id+"\")'></a></td></tr>");

        //MARKER
        centerBaru = new google.maps.LatLng(lat, lng);
        map.setCenter(centerBaru);
        map.setZoom(13);
        var marker = new google.maps.Marker({
          position: centerBaru,
          icon:'icon/marker_hotel.png',
          animation: google.maps.Animation.DROP,
          map: map
          });
        markersDua.push(marker);
        klikInfoWindow(id,marker);

      }//end for
  }});//end ajax
}

/* **********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
SEKITAR ANGKOT - BUTTON
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*********************************************************************************************************************************************************** */

function objek_sekitar_angkot(id_angkot){ // KLIK TAMPILKAN, SETELAH MEMILIH OBJECT NYA DENGAN CHECK BOX

hapusMarkerObject();
$('#table_kanan_hotel').empty();
$('#table_kanan_tourism').empty();
$('#table_kanan_worship').empty();
$('#table_kanan_souvenir').empty();
$('#table_kanan_culinary').empty();
$('#table_kanan_industry').empty();
$('#table_kanan_restaurant').empty();

$('#table_hotel').hide();
$('#table_tourism').hide();
$('#table_worship').hide();
$('#table_souvenir').hide();
$('#table_culinary').hide();
$('#table_industry').hide();
$('#table_restaurant').hide();

// td = Table Detail

if (document.getElementById("check_k").checked) {
  $('#table_culinary').show();
  td_kuliner_angkot(id_angkot);
}
if (document.getElementById("check_m").checked) {
  $('#table_worship').show();
  td_masjid_angkot(id_angkot);
}
if (document.getElementById("check_oo").checked) {
  $('#table_souvenir').show();
  td_oo_Angkot(id_angkot);
}
if (document.getElementById("check_tw").checked) {
  $('#table_tourism').show();
  td_tw_angkot(id_angkot);
}
if (document.getElementById("check_h").checked) {
  $('#table_hotel').show();
  td_hotel_angkot(id_angkot);
}

if (!document.getElementById("check_k").checked && !document.getElementById("check_m").checked && !document.getElementById("check_oo").checked && !document.getElementById("check_tw").checked && !document.getElementById("check_h").checked) {
  document.getElementById('modal_title').innerHTML="Info";
  document.getElementById('modal_body').innerHTML="Pilih salah satu objek terlebih dahulu";
  $('#myModal').modal('show');
} else {
  $('#view_table_sekitar').show();
}

}

function td_hotel_angkot(id_angkot){ // HOTEL SEKITAR ANGKOT
$('#table_kanan_hotel').empty();
$('#table_kanan_hotel').append("<tr><th class='centered'>Hotel Name</th><th class='centered'>Action</th></tr>");
$.ajax({url: server+'/_angkot_hotel.php?id_angkot='+id_angkot, data: "", dataType: 'json', success: function(rows){
  for (var i in rows){
    var row = rows[i];
    var id = row.id;
    var name = row.name;
    var lat=row.lat;
    var lng = row.lng;
    var lng2 = row.lng2;
    var lat2=row.lat2;
    console.log(id);
    console.log(name);

    //POSISI MAP
    centerBaru = new google.maps.LatLng(lat2, lng2);
    map.setCenter(centerBaru);
    map.setZoom(16);
    var marker = new google.maps.Marker({
      position: centerBaru,
      icon:'icon/marker_hotel.png',
      animation: google.maps.Animation.DROP,
      map: map
      });
    markersDua.push(marker);
    klikInfoWindow(id,marker);
    map.setCenter(centerBaru);
    $('#table_kanan_hotel').append("<tr><td>"+name+"</td><td><a role='button' class='btn btn-default fa fa-info' style='margin-right:10px' onclick='modal_hotel(\""+id+"\")'></a><a role='button' class='btn btn-default fa fa-picture-o' style='margin-right:10px' onclick='galeri(\""+id+"\")'></a><a role='button' class='btn btn-default fa fa-bus' onclick='route_angkot(\""+lat2+"\",\""+lng2+"\",\""+lat+"\",\""+lng+"\",\""+id_angkot+"\",\""+id+"\")'></a></td></tr>");
  }//end for
}});//end ajax
}

function modal_hotel(id){ // DATA HOTEL

//DATA HOTEL
document.getElementById('mg_title').innerHTML="Info";
console.log(server+'_data_hotel_1.php?cari='+id);
$.ajax({url: server+'_data_hotel_1.php?cari='+id, data: "", dataType: 'json', success: function(rows){
  for (var i in rows.data){
    var row = rows.data[i];
    var id = row.id;
    var name = row.name;
    var access = row.access;
    var address = row.address;
    var cp = row.cp;
    var ktp = row.ktp;
    var marriage_book = row.marriage_book;
    var mushalla = row.mushalla;
    var type_hotel = row.type_hotel;
    var lat=row.lat;
    var lng = row.lng;

    if (mushalla == 1) {
      mushalla= "Exist";
    } else {
      mushalla= "None";
    }
    console.log(name);
    var syarat = "-";
    if (marriage_book == 1 && ktp == 1) {
      syarat= "Marriage Certificate & ID Card";
    } else if (marriage_book == 1) {
      syarat= "Marriage Certificate";
    } else if (ktp == 1) {
      syarat= "ID Card";
    }
    document.getElementById('mg_body').innerHTML="<h2>"+name+"</h2><h4>"+type_hotel+"</h4><br><div style='margin-left:20px'>Address: "+address+"<br>Cp: "+cp+"<br>Mushalla: "+mushalla+"<br>Requirement: "+syarat+"</div>";
  }//end for

  //FASILITAS HOTEL
  var isi="<br><b style='margin-left:20px'>Facility</b> <br><ol>";
  for (var i in rows.fasilitas){
    var row = rows.fasilitas[i];
    var id = row.id;
    var name = row.name;
    console.log(name);
    isi = isi+"<li>"+name+"</li>";
  }//end for
  isi = isi + "</ol>";
  $('#mg_body').append(isi);

  //KAMAR HOTEL
  var isi="<b style='margin-left:20px'>Room</b> <br><ol>";
  for (var i in rows.kamar){
    var row = rows.kamar[i];
    var id_room = row.id_room;
    var id_hote = row.id_hotel;
    var name = row.name;
    var available = row.available;
    var price = row.price;
    var sisa = row.sisa;
    console.log(name);
    isi = isi+"<li>"+name+" - "+price+"</li>";
  }//end for
  isi = isi + "</ol>";
  $('#mg_body').append(isi);

  $('#modal_gallery').modal('show');
}});//end ajax

}

function td_industri_angkot(id_angkot){ // INDUSTRI SEKITAR ANGKOT
$('#table_kanan_industry').empty();
$('#table_kanan_industry').append("<tr><th class='centered'>Industry Name</th><th class='centered'>Action</th></tr>");
$.ajax({url: server+'_angkot_small_industry.php?id_angkot='+id_angkot, data: "", dataType: 'json', success: function(rows){
  for (var i in rows){
    var row = rows[i];
    var id = row.id;
    var name = row.name;
    var lat=row.lat;
    var lon = row.lng;
    var lat2=row.lat2;
    var lon2 = row.lng2;
    var description = row.description;
    console.log(name);

    //POSISI MAP
    centerBaru = new google.maps.LatLng(lat2, lon2);
    map.setCenter(centerBaru);
    map.setZoom(16);
    var marker = new google.maps.Marker({
      position: centerBaru,
      icon:'icon/marker_industri.png',
      animation: google.maps.Animation.DROP,
      map: map
      });

    markersDua.push(marker);
    klikInfoWindowSM(id,marker);
    map.setCenter(centerBaru);
    $('#table_kanan_industry').append("<tr><td>"+name+"</td><td><a role='button' class='btn btn-default fa fa-info' style='margin-right:10px' onclick='modal_small_industry(\""+id+"\")'></a><a role='button' class='btn btn-default fa fa-picture-o' style='margin-right:10px' onclick='galeri(\""+id+"\")'></a><a role='button' class='btn btn-default fa fa-bus' onclick='route_angkot(\""+lat2+"\",\""+lon2+"\",\""+lat+"\",\""+lon+"\",\""+id_angkot+"\",\""+id+"\")'></a></td></tr>");
  }//end for
}});//end ajax
}

function modal_small_industry(id){  // DATA INDUSTRY

//DATA SMALL INDUSTRY
document.getElementById('mg_title').innerHTML="Info";
console.log(server+'_data_small_industry_1.php?cari='+id);
$.ajax({url: server+'_data_small_industry_1.php?cari='+id, data: "", dataType: 'json', success: function(rows){
  for (var i in rows.data){
    var row = rows.data[i];
    var id = row.id;
    var name = row.name;
    var owner = row.owner;
    var address = row.address;
    var cp = row.cp;
    var employee = row.employee;
    var type_industry = row.type_industry;
    var lat=row.lat;
    var lng = row.lng;
    console.log(name);
    document.getElementById('mg_body').innerHTML="<h2>"+name+"</h2><h4>"+type_industry+"</h4><br><div style='margin-left:20px'>Address: "+address+"<br>Cp: "+cp+"<br>Employee: "+employee+"<br>Industry Type: "+type_industry+"</div>";
  }//end for

  $('#modal_gallery').modal('show');
}});//end ajax

}

function td_kuliner_angkot(id_angkot){ //KULINER SEKITAR ANGKOT
$('#table_kanan_culinary').empty();
$('#table_kanan_culinary').append("<tr><th class='centered'>Culinary Name</th><th class='centered'>Action</th></tr>");
$.ajax({url: server+'/_angkot_culinary_place.php?id_angkot='+id_angkot, data: "", dataType: 'json', success: function(rows){
  for (var i in rows){
    var row = rows[i];
    var id = row.id;
    var name = row.name;
    var lat=row.lat;
    var lon = row.lng;
    var lat2=row.lat2;
    var lon2 = row.lng2;
    var description = row.description;
    console.log(name);

    //POSISI MAP
    centerBaru = new google.maps.LatLng(lat2, lon2);
    map.setCenter(centerBaru);
    map.setZoom(16);
    var marker = new google.maps.Marker({
      position: centerBaru,
      icon:'icon/marker_kuliner.png',
      animation: google.maps.Animation.DROP,
      map: map
      });
    markersDua.push(marker);
    klikInfoWindowKul(id,marker);
    map.setCenter(centerBaru);

    $('#table_kanan_culinary').append("<tr><td>"+name+"</td><td><a role='button' class='btn btn-default fa fa-info' style='margin-right:10px'  onclick='modal_kuliner(\""+id+"\")'></a><a role='button' class='btn btn-default fa fa-picture-o' style='margin-right:10px' onclick='galeri(\""+id+"\")'></a><a role='button' class='btn btn-default fa fa-bus' onclick='route_angkot(\""+lat2+"\",\""+lon2+"\",\""+lat+"\",\""+lon+"\",\""+id_angkot+"\",\""+id+"\")'></a></td></tr>");
    }//end for
  }});//end ajax
}

function modal_kuliner(id){ //DATA KULINER

//DATA KULINER
document.getElementById('mg_title').innerHTML="Info";
console.log(server+'_data_culinary_place_1.php?cari='+id);
$.ajax({url: server+'_data_culinary_place_1.php?cari='+id, data: "", dataType: 'json', success: function(rows){
  for (var i in rows.data){
    var row = rows.data[i];
    var id = row.id;
    var name = row.name;
    var cp = row.cp;
    var address = row.address;
    var capacity = row.capacity;
    var open = row.open;
    var close = row.close;
    var employee = row.employee;
    var lat=row.lat;
    var lng = row.lng;
    console.log(name);
    document.getElementById('mg_body').innerHTML="<h2>"+name+"</h2><br><div style='margin-left:20px'>Address: "+address+"<br>Cp: "+cp+"<br>Capacity: "+capacity+"<br>Open: "+open+"<br>Close: "+close+"<br>Employee: "+employee+"</div>";
  }//end for

  $('#modal_gallery').modal('show');
}});//end ajax

}

function td_masjid_angkot(id_angkot){ // MASJID SEKITAR ANGKOT
$('#table_kanan_worship').empty();
$('#table_kanan_worship').append("<tr><th class='centered'>Worship Name</th><th class='centered'>Action</th></tr>");
$.ajax({url: server+'/_angkot_worship_place.php?id_angkot='+id_angkot, data: "", dataType: 'json', success: function(rows){
  for (var i in rows){
      var row = rows[i];
      var id = row.id;
      var name = row.name;
      var lat=row.lat;
      var lon = row.lng;
      var lat2=row.lat2;
      var lon2 = row.lng2;
      var description = row.description;

      //POSISI MAP
      centerBaru = new google.maps.LatLng(lat2, lon2);
      map.setCenter(centerBaru);
      map.setZoom(16);
      var marker = new google.maps.Marker({
        position: centerBaru,
        icon:'icon/marker_masjid.png',
        animation: google.maps.Animation.DROP,
        map: map
        });
      markersDua.push(marker);
      klikInfoWindowMes(id,marker);
      map.setCenter(centerBaru);

      $('#table_kanan_worship').append("<tr><td>"+name+"</td><td><a role='button' class='btn btn-default fa fa-info' style='margin-right:10px'  onclick='modal_masjid(\""+id+"\")'></a><a role='button' class='btn btn-default fa fa-picture-o' style='margin-right:10px' onclick='galeri(\""+id+"\")'></a><a role='button' class='btn btn-default fa fa-bus' onclick='route_angkot(\""+lat2+"\",\""+lon2+"\",\""+lat+"\",\""+lon+"\",\""+id_angkot+"\",\""+id+"\")'></a></td></tr>");
    }//end for
  }});//end ajax
}

function modal_masjid(id){  //DATA MASJID

//DATA MASJID
document.getElementById('mg_title').innerHTML="Info";
console.log(server+'_data_worship_place_1.php?cari='+id);
$.ajax({url: server+'_data_worship_place_1.php?cari='+id, data: "", dataType: 'json', success: function(rows){
  for (var i in rows.data){
    var row = rows.data[i];
    var id = row.id;
    var name = row.name;
    var address = row.address;
    var land_size = row.land_size;
    var park_area_size = row.park_area_size;
    var building_size = row.building_size;
    var capacity = row.capacity;
    var est = row.est;
    var last_renovation = row.last_renovation;
    var jamaah = row.jamaah;
    var imam = row.imam;
    var teenager = row.teenager;
    var category = row.category;
    var lat=row.lat;
    var lng = row.lng;
    console.log(name);
    document.getElementById('mg_body').innerHTML="<h2>"+name+"</h2><br><div style='margin-left:20px'>Address: "+address+"<br>Land Size: "+land_size+"<br>Park Area: "+park_area_size+"<br>Building Size: "+building_size+"<br>Capacity: "+capacity+"<br>Est: "+est+"<br>Renovation: "+last_renovation+"<br>Jamaah: "+jamaah+"<br>Imam: "+imam+"<br>Teenager: "+teenager+"<br>Category: "+category+"</div>";
  }//end for

  $('#modal_gallery').modal('show');
}});//end ajax

}

function td_oo_Angkot(id_angkot){ // OLEH-OLEH SEKITAR ANGKOT
$('#table_kanan_souvenir').empty();
$('#table_kanan_souvenir').append("<tr><th class='centered'>Souvenir Name</th><th class='centered'>Action</th></tr>");
$.ajax({url: server+'/_angkot_souvenir.php?id_angkot='+id_angkot, data: "", dataType: 'json', success: function(rows){
  for (var i in rows){
      var row = rows[i];
      var id = row.id;
      var name = row.name;
      var description = row.description;
      var lat=row.lat;
      var lon = row.lng;
      var lat2=row.lat2;
      var lon2 = row.lng2;

      //POSISI MAP
      centerBaru = new google.maps.LatLng(lat2, lon2);
      map.setCenter(centerBaru);
      map.setZoom(16);
      var marker = new google.maps.Marker({
        position: centerBaru,
        icon:'icon/marker_oo.png',
        animation: google.maps.Animation.DROP,
        map: map
        });
      markersDua.push(marker);
      klikInfoWindowSou(id,marker);
      map.setCenter(centerBaru);

      $('#table_kanan_souvenir').append("<tr><td>"+name+"</td><td><a role='button' class='btn btn-default fa fa-info' style='margin-right:10px'  onclick='modal_oo(\""+id+"\") '></a><a role='button' class='btn btn-default fa fa-picture-o' style='margin-right:10px' onclick='galeri(\""+id+"\")'></a><a role='button' class='btn btn-default fa fa-bus' onclick='route_angkot(\""+lat2+"\",\""+lon2+"\",\""+lat+"\",\""+lon+"\",\""+id_angkot+"\",\""+id+"\")'></a></td></tr>");
    }//end for
  }});//end ajax
}

function modal_oo(id){  //DATA SOUVENIR

//DATA SOUVENIR
document.getElementById('mg_title').innerHTML="Info";
console.log(server+'_data_souvenir_1.php?cari='+id);
$.ajax({url: server+'_data_souvenir_1.php?cari='+id, data: "", dataType: 'json', success: function(rows){
  for (var i in rows.data){
    var row = rows.data[i];
    var id = row.id;
    var name = row.name;
    var owner = row.owner;
    var cp = row.cp;
    var address = row.address;
    var employee = row.employee;
    var type_souvenir = row.type_souvenir;
    var lat=row.lat;
    var lng = row.lng;
    console.log(name);
    document.getElementById('mg_body').innerHTML="<h2>"+name+"</h2><br><div style='margin-left:20px'>Address: "+address+"<br>Cp: "+cp+"<br>Owner: "+owner+"<br>Employee: "+employee+"<br>Type: "+type_souvenir+"</div>";
  }//end for

  $('#modal_gallery').modal('show');
}});//end ajax
}

function td_tw_angkot(id_angkot){ // TOURISM SEKITAR ANGKOT
$('#table_kanan_tourism').empty();
$('#table_kanan_tourism').append("<tr><th class='centered'>Tourism Name</th><th class='centered'>Action</th></tr>");
$.ajax({url: server+'/_angkot_tourism.php?id_angkot='+id_angkot, data: "", dataType: 'json', success: function(rows){
  for (var i in rows){
      var row = rows[i];
      var id = row.id;
      var name = row.name;

      var lat = row.lat;
      var lon = row.lng;
      var lat2 = row.lat2;
      var lon2 = row.lng2;
      var description = row.description;

      //POSISI MAP
      centerBaru = new google.maps.LatLng(lat2, lon2);
      map.setCenter(centerBaru);
      map.setZoom(16);
      var marker = new google.maps.Marker({
        position: centerBaru,
        icon:'icon/marker_tw.png',
        animation: google.maps.Animation.DROP,
        map: map
        });
      markersDua.push(marker);
      klikInfoWindowOW(id,marker);
      map.setCenter(centerBaru);


      $('#table_kanan_tourism').append("<tr><td>"+name+"</td><td><a role='button' class='btn btn-default fa fa-info' style='margin-right:10px'  onclick='modal_tw(\""+id+"\") '></a><a role='button' class='btn btn-default fa fa-picture-o' style='margin-right:10px' onclick='galeri(\""+id+"\")'></a><a role='button' class='btn btn-default fa fa-bus' onclick='route_angkot(\""+lat2+"\",\""+lon2+"\",\""+lat+"\",\""+lon+"\",\""+id_angkot+"\",\""+id+"\")'></a></td></tr>");
    }//end for
}});//end ajax
}

function modal_tw(id){  // DATA TOURISM

//DATA TOURISM
document.getElementById('mg_title').innerHTML="Info";
console.log(server+'_data_tourism_1.php?cari='+id);
$.ajax({url: server+'_data_tourism_1.php?cari='+id, data: "", dataType: 'json', success: function(rows){
  for (var i in rows.data){
    var row = rows.data[i];
    var id = row.id;
    var name = row.name;
    var address = row.address;
    var open = row.open;
    var close = row.close;
    var ticket = row.ticket;
    var tourism_type = row.tourism_type;
    var lat=row.latitude;
    var lng = row.longitude;
    console.log(name);
    document.getElementById('mg_body').innerHTML="<h2>"+name+"</h2><h4>"+tourism_type+"</h4><br><div style='margin-left:20px'>Address: "+address+"<br>Open: "+open+"<br>Close: "+close+"<br>Ticket: "+ticket+"</div>";
  }//end for

  //FASILITAS HOTEL
  var isi="<br><b style='margin-left:20px'>Facility</b> <br><ol>";
  for (var i in rows.fasilitas){
    var row = rows.fasilitas[i];
    var id = row.id;
    var name = row.name;
    console.log(name);
    isi = isi+"<li>"+name+"</li>";
  }//end for
  isi = isi + "</ol>";
  $('#mg_body').append(isi);

  $('#modal_gallery').modal('show');

}});//end ajax
}

function td_restaurant_angkot(id_angkot){   // RESTAURANT SEKITAR ANGKOT

// TEMPAT WISATA SEKITAR ANGKOT
$('#table_kanan_restaurant').empty();
$('#table_kanan_restaurant').append("<tr><th class='centered'>Restaurant Name</th><th class='centered'>Action</th></tr>");
$.ajax({url: server+'_angkot_restaurant.php?id_angkot='+id_angkot, data: "", dataType: 'json', success: function(rows){
  for (var i in rows){
      var row = rows[i];
      var id = row.id;
      var name = row.name;

      var lat = row.lat;
      var lon = row.lng;
      var lat2 = row.lat2;
      var lon2 = row.lng2;
      var description = row.description;

      //POSISI MAP
      centerBaru = new google.maps.LatLng(lat2, lon2);
      map.setCenter(centerBaru);
      map.setZoom(16);
      var marker = new google.maps.Marker({
        position: centerBaru,
        icon:'icon/marker_kuliner.png',
        animation: google.maps.Animation.DROP,
        map: map
        });
      markersDua.push(marker);
      klikInfoWindowRes(id,marker);
      map.setCenter(centerBaru);

      $('#table_kanan_restaurant').append("<tr><td>"+name+"</td><td><a role='button' class='btn btn-default fa fa-info' style='margin-right:10px' onclick='modal_restaurant(\""+id+"\") '></a><a role='button' class='btn btn-default fa fa-picture-o' style='margin-right:10px' onclick='galeri(\""+id+"\")'></a><a role='button' class='btn btn-default fa fa-bus' onclick='route_angkot(\""+lat2+"\",\""+lon2+"\",\""+lat+"\",\""+lon+"\",\""+id_angkot+"\",\""+id+"\")'></a></td></tr>");
    }//end for
}});//end ajax
}

function modal_restaurant(id){    // DATA RESTAURANT

//DATA TOURISM
document.getElementById('mg_title').innerHTML="Info";
console.log(server+'_data_restaurant_1.php?cari='+id);
$.ajax({url: server+'_data_restaurant_1.php?cari='+id, data: "", dataType: 'json', success: function(rows){
  for (var i in rows.data){
    var row = rows.data[i];
    var id = row.id;
    var name = row.name;
    var cp = row.cp;
    var address = row.address;
    var open = row.open;
    var close = row.close;
    var capacity = row.capacity;
    var employee = row.employee;
    var mushalla = row.mushalla;
    var park_area = row.park_area;
    var bathroom = row.bathroom;
    var type_restaurant = row.type_restaurant;
    var lat=row.latitude;
    var lng = row.longitude;

    if (mushalla == 1) {
      mushalla = "Exist";
    }else{
      mushalla = "None"
    }
    if (park_area == 1) {
      park_area = "Exist";
    }else{
      park_area = "None"
    }
    if (bathroom == 1) {
      bathroom = "Exist";
    }else{
      bathroom = "None"
    }

    console.log(name);
    document.getElementById('mg_body').innerHTML="<h2>"+name+"</h2><h4>"+type_restaurant+"</h4><br><div style='margin-left:20px'>Address: "+address+"<br>Open: "+open+"<br>Close: "+close+"<br>Capacity: "+capacity+"<br>Employee: "+employee+"<br>Mushalla: "+mushalla+"<br>Park Area: "+park_area+"<br>Bathroom: "+bathroom+"</div>";
  }//end for

  $('#modal_gallery').modal('show');
}});//end ajax
}

/* **********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
RADIUS - OBJEK SEKITAR - SEEKBAR
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*********************************************************************************************************************************************************** */

function aktifkanRadius(){
  var pos = new google.maps.LatLng(rad_lat, rad_lng);
  map.setCenter(pos);
  map.setZoom(16);

  if(directionsDisplay){
      clearroute();
      hapusInfo();
  }
  hapusRadius();
  hapusMarkerObject();

  //Radius
  var inputradius=document.getElementById("inputradius2").value;
  rad = parseFloat(inputradius*100);
  console.log(inputradius);
  console.log(rad);
  var circle = new google.maps.Circle({
    center: pos,
    radius: rad,
    map: map,
    strokeColor: "blue",
    strokeOpacity: 0.5,
    strokeWeight: 1,
    fillColor: "blue",
    fillOpacity: 0.35
  });
  circles.push(circle);

  //TAMPILAN
  $('#table_kanan_hotel').empty();
  $('#table_kanan_tourism').empty();
  $('#table_kanan_worship').empty();
  $('#table_kanan_souvenir').empty();
  $('#table_kanan_culinary').empty();
  $('#table_kanan_industry').empty();
  $('#table_kanan_restaurant').empty();
  $('#table_kanan_angkot').empty();

  $('#table_hotel').hide();
  $('#table_tourism').hide();
  $('#table_worship').hide();
  $('#table_souvenir').hide();
  $('#table_culinary').hide();
  $('#table_industry').hide();
  $('#table_restaurant').hide();
  $('#table_angkot').hide();

  if (document.getElementById("check_k").checked) {
    kuliner_sekitar(rad_lat,rad_lng,rad);
    $('#table_culinary').show();
  }

  if (document.getElementById("check_m").checked) {
    masjid_sekitar(rad_lat,rad_lng,rad);
    $('#table_worship').show();
  }

  if (document.getElementById("check_oo").checked) {
    oleholeh_sekitar(rad_lat,rad_lng,rad);
    $('#table_souvenir').show();
  }

  if (document.getElementById("check_tw").checked) {
    tw_sekitar(rad_lat,rad_lng,rad);
    $('#table_tourism').show();
  }

  if (document.getElementById("check_h").checked) {
    h_sekitar(rad_lat,rad_lng,rad);
    $('#table_hotel').show();
  }
  if (!document.getElementById("check_k").checked && !document.getElementById("check_m").checked && !document.getElementById("check_oo").checked && !document.getElementById("check_tw").checked && !document.getElementById("check_h").checked ) {
    document.getElementById('modal_title').innerHTML="Info";
    document.getElementById('modal_body').innerHTML="Pilih salah satu objek terlebih dahulu";
    $('#myModal').modal('show');
  } else {
  $('#view_table_sekitar').show();
  }
}

function route_sekitar(lat1,lng1,lat,lng) {

  // lat1 = document.getElementById('myLatLocation').value;
  // lng1 = document.getElementById('myLngLocation').value;
  // if (lat1 == 0 || lat == 0 || lng1 == 0 || lng == 0) {
  //   document.getElementById('modal_title').innerHTML="Info";
  //   document.getElementById('modal_body').innerHTML="Terjadi kesalahan, terdapat posisi yang belum ditentukan.<br>Muat ulang data untuk menjalankan fungsi ini";
  //   $('#myModal').modal('show');
  //   return;
  // }

  var start = new google.maps.LatLng(lat1, lng1);
  var end = new google.maps.LatLng(lat, lng);

  if(directionsDisplay){
      clearroute();
      hapusInfo();
  }

  directionsService = new google.maps.DirectionsService();
  var request = {
    origin:start,
    destination:end,
    travelMode: google.maps.TravelMode.DRIVING,
    unitSystem: google.maps.UnitSystem.METRIC,
    provideRouteAlternatives: true
  };

  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
     directionsDisplay.setDirections(response);
   }
  });

  directionsDisplay = new google.maps.DirectionsRenderer({
    draggable: false,
    polylineOptions: {
      strokeColor: "darkorange"
    }
  });

  directionsDisplay.setMap(map);
  rute.push(directionsDisplay);
  document.getElementById('view_tracking_table2').innerHTML="";
  $("#view_tracking2").show();
  directionsDisplay.setPanel(document.getElementById('view_tracking_table2'));
}

function tampil_sekitar(latitude,longitude,namaa,tipe){
hapus_Semua();
rad_lat = latitude;
rad_lng = longitude;

//Hilangkan Button Sekitar
$('#view_sekitar').empty();
document.getElementById("inputradius").style.display = "inline";

// POSISI MARKER
centerBaru = new google.maps.LatLng(latitude, longitude);
if (tipe==1) {
  var marker = new google.maps.Marker({map: map, position: centerBaru,
    icon:'icon/marker_tw.png',
    animation: google.maps.Animation.DROP,
    clickable: true});
}else{
  var marker = new google.maps.Marker({map: map, position: centerBaru,
    icon:'icon/marker_hotel.png',
    animation: google.maps.Animation.DROP,
    clickable: true});
}

//INFO WINDOW
marker.info = new google.maps.InfoWindow({
  content: "<bold>"+namaa+"",
  pixelOffset: new google.maps.Size(0, -1)
    });
  marker.info.open(map, marker);

$("#view_object_sekitar").show();

$("#view_industri").hide();
$("#view_kuliner").hide();
$("#view_masjid").hide();
$("#view_oo").hide();
$("#view_tw").hide();

$("#view_kanan_data").hide();
$("#view_galery").hide();
}

function industri_sekitar(latitude,longitude,rad){ // INDUSTRI SEKITAR
$('#table_kanan_industry').empty();
$('#table_kanan_industry').append("<tr><th class='centered'>Industry Name</th><th class='centered'>Action</th></tr>");
console.log(server+'_sekitar_small_industry.php?lat='+latitude+'&lng='+longitude+'&rad='+rad);
$.ajax({url: server+'_sekitar_small_industry.php?lat='+latitude+'&lng='+longitude+'&rad='+rad, data: "", dataType: 'json', success: function(rows){
  for (var i in rows){
    var row = rows[i];
    var id = row.id;
    var name = row.name;
    // var jarak = row.jarak;
    var lat=row.lat;
    var lon = row.lng;
    console.log(name);

    //POSISI MAP
    centerBaru = new google.maps.LatLng(lat, lon);
    map.setCenter(centerBaru);
    map.setZoom(16);
    var marker = new google.maps.Marker({
      position: centerBaru,
      icon:'icon/marker_industri.png',
      animation: google.maps.Animation.DROP,
      map: map
      });
    markersDua.push(marker);
    klikInfoWindowSM(id,marker);
    map.setCenter(centerBaru);
    $('#table_kanan_industry').append("<tr><td>"+name+"</td><td><a role='button' style='margin:5px' class='btn btn-success fa fa-road' title='route' onclick='route_sekitar(\""+latitude+"\",\""+longitude+"\",\""+lat+"\",\""+lon+"\")'></a><a role='button' style='margin:5px' class='btn btn-success fa fa-info' title='info' onclick='modal_small_industry(\""+id+"\")'></a><a role='button' style='margin:5px' class='btn btn-success fa fa-map-marker' onclick='set_center(\""+lat+"\",\""+lon+"\",\""+name+"\")' title='position'></a><a role='button' class='btn btn-success fa fa-taxi' style='margin:5px' onclick='angkot_sekitar_lagi(\""+id+"\")' title='Transportation'></a></td></tr>");
  }//end for
}});//end ajax
}

function kuliner_sekitar(latitude,longitude,rad){ //KULINER SEKITAR ANGKOT

  $('#table_kanan_culinary').empty();
  $('#table_kanan_culinary').append("<tr><th class='centered'>Culinary Name</th><th class='centered'>Action</th></tr>");
  $.ajax({url: server+'_sekitar_culinary_place.php?lat='+latitude+'&lng='+longitude+'&rad='+rad, data: "", dataType: 'json', success: function(rows){
    for (var i in rows){
      var row = rows[i];
      var id = row.id;
      var name = row.name;
      // var jarak = row.jarak;
      var lat=row.lat;
      var lon = row.lng;
      console.log(name);

      //POSISI MAP
      centerBaru = new google.maps.LatLng(lat, lon);
      map.setCenter(centerBaru);
      map.setZoom(16);
      var marker = new google.maps.Marker({
        position: centerBaru,
        icon:'icon/marker_kuliner.png',
        animation: google.maps.Animation.DROP,
        map: map
        });
      markersDua.push(marker);
      map.setCenter(centerBaru);
      klikInfoWindowKul(id,marker);

      $('#table_kanan_culinary').append("<tr><td>"+name+"</td><td><a role='button' style='margin:5px' class='btn btn-success fa fa-road' title='route' onclick='route_sekitar(\""+latitude+"\",\""+longitude+"\",\""+lat+"\",\""+lon+"\")'></a><a role='button' style='margin:5px' class='btn btn-success fa fa-info' title='info' onclick='modal_kuliner(\""+id+"\")'></a><a role='button' style='margin:5px' class='btn btn-success fa fa-map-marker' title='position' onclick='set_center(\""+lat+"\",\""+lon+"\",\""+name+"\")'></a><a role='button' class='btn btn-success fa fa-taxi' title='Transportation' style='margin:5px' onclick='angkot_sekitar_lagi(\""+id+"\")'></a></td></tr>");
    }//end for
  }});//end ajax
}


function masjid_sekitar(latitude,longitude,rad){ // MASJID SEKITAR ANGKOT

$('#table_kanan_worship').empty();
$('#table_kanan_worship').append("<tr><th class='centered'>Worship Name</th><th class='centered'>Action</th></tr>");
$.ajax({url: server+'_sekitar_worship_place.php?lat='+latitude+'&lng='+longitude+'&rad='+rad, data: "", dataType: 'json', success: function(rows){
  for (var i in rows){
    var row = rows[i];
    var id = row.id;
    var name = row.name;
    // var jarak = row.jarak;
    var lat=row.lat;
    var lon = row.lng;

    //POSISI MAP
    centerBaru = new google.maps.LatLng(lat, lon);
    map.setCenter(centerBaru);
    map.setZoom(16);
    var marker = new google.maps.Marker({
      position: centerBaru,
      icon:'icon/marker_masjid.png',
      animation: google.maps.Animation.DROP,
      map: map
      });
    markersDua.push(marker);
    map.setCenter(centerBaru);
    klikInfoWindowMes(id,marker);

    $('#table_kanan_worship').append("<tr><td>"+name+"</td><td><a role='button' style='margin:5px' class='btn btn-success fa fa-road' title='route' onclick='route_sekitar(\""+latitude+"\",\""+longitude+"\",\""+lat+"\",\""+lon+"\")'></a><a role='button' style='margin:5px' class='btn btn-success fa fa-info' title='info' onclick='modal_masjid(\""+id+"\")'></a><a role='button' style='margin:5px' class='btn btn-success fa fa-map-marker' title='position' onclick='set_center(\""+lat+"\",\""+lon+"\",\""+name+"\")'></a><a role='button' class='btn btn-success fa fa-taxi' title='Transportation' style='margin:5px' onclick='angkot_sekitar_lagi(\""+id+"\")'></a></td></tr>");
  }//end for
}});//end ajax
}


function oleholeh_sekitar(latitude,longitude,rad){ // OLEH-OLEH SEKITAR ANGKOT

  $('#table_kanan_souvenir').empty();
  $('#table_kanan_souvenir').append("<tr><th class='centered'>Souvenir Name</th><th class='centered'>Action</th></tr>");
  $.ajax({url: server+'_sekitar_souvenir.php?lat='+latitude+'&lng='+longitude+'&rad='+rad, data: "", dataType: 'json', success: function(rows){
    for (var i in rows){
      var row = rows[i];
      var id = row.id;
      var name = row.name;
      // var jarak = row.jarak;
      var lat=row.lat;
      var lon = row.lng;

      //POSISI MAP
      centerBaru = new google.maps.LatLng(lat, lon);
      map.setCenter(centerBaru);
      map.setZoom(16);
      var marker = new google.maps.Marker({
        position: centerBaru,
        icon:'icon/marker_oo.png',
        animation: google.maps.Animation.DROP,
        map: map
        });
      markersDua.push(marker);
      klikInfoWindowSou(id,marker);
      map.setCenter(centerBaru);

      $('#table_kanan_souvenir').append("<tr><td>"+name+"</td><td><a role='button' style='margin:5px' class='btn btn-success fa fa-road' title='route' onclick='route_sekitar(\""+latitude+"\",\""+longitude+"\",\""+lat+"\",\""+lon+"\")'></a><a role='button' style='margin:5px' class='btn btn-success fa fa-info' title='info' onclick='modal_oo(\""+id+"\")'></a><a role='button' style='margin:5px' class='btn btn-success fa fa-map-marker' title='position' onclick='set_center(\""+lat+"\",\""+lon+"\",\""+name+"\")'></a><a role='button' class='btn btn-success fa fa-taxi' title='trasportation' style='margin:5px' onclick='angkot_sekitar_lagi(\""+id+"\")'></a></td></tr>");
    }//end for
  }});//end ajax
}

function tw_sekitar(latitude,longitude,rad){ // TEMPAT WISATA SEKITAR ANGKOT

  $('#table_kanan_tourism').empty();
  $('#table_kanan_tourism').append("<tr><th class='centered'>Tourism Name</th><th class='centered'>Action</th></tr>");
  $.ajax({url: server+'_sekitar_tourism.php?lat='+latitude+'&lng='+longitude+'&rad='+rad, data: "", dataType: 'json', success: function(rows){
    for (var i in rows){
      var row = rows[i];
      var id = row.id;
      var name = row.name;
      // var jarak = row.jarak;
      var lat = row.lat;
      var lon = row.lng;

      //POSISI MAP
      centerBaru = new google.maps.LatLng(lat, lon);
      map.setCenter(centerBaru);
      map.setZoom(16);
      var marker = new google.maps.Marker({
        position: centerBaru,
        icon:'icon/marker_tw.png',
        animation: google.maps.Animation.DROP,
        map: map
        });
      markersDua.push(marker);
      klikInfoWindowOW(id,marker);
      map.setCenter(centerBaru);


      $('#table_kanan_tourism').append("<tr><td>"+name+"</td><td><a role='button' style='margin:5px' class='btn btn-success fa fa-road' title='route' onclick='route_sekitar(\""+latitude+"\",\""+longitude+"\",\""+lat+"\",\""+lon+"\")'></a><a role='button' style='margin:5px' class='btn btn-success fa fa-info' title='info' onclick='modal_tw(\""+id+"\")'></a><a role='button' style='margin:5px' class='btn btn-success fa fa-map-marker' title='position' onclick='set_center(\""+lat+"\",\""+lon+"\",\""+name+"\")'></a><a role='button' class='btn btn-success fa fa-taxi' title='transportation' style='margin:5px' onclick='angkot_sekitar_lagi(\""+id+"\")'></a></td></tr>");
    }//end for
  }});//end ajax

}


function h_sekitar(latitude,longitude,rad){ // TEMPAT WISATA SEKITAR ANGKOT

$('#table_kanan_hotel').empty();
$('#table_kanan_hotel').append("<tr><th class='centered'>Hotel Name</th><th class='centered'>Action</th></tr>");
  console.log(server+'_sekitar_hotel.php?lat='+latitude+'&lng='+longitude+'&rad='+rad);
  $.ajax({url: server+'_sekitar_hotel.php?lat='+latitude+'&lng='+longitude+'&rad='+rad, data: "", dataType: 'json', success: function(rows){
    if(rows == null)
    {
      console.log("xxx");
      alert('Data Did Not Exist !');
    }

    for (var i in rows)
    {
      var row = rows[i];
      var id          = row.id;
      var name       = row.name;
      // var jarak  = row.jarak;
      var lat    = row.lat;
      var lon   = row.lng;

      //POSISI MAP
      centerBaru = new google.maps.LatLng(lat, lon);
      map.setCenter(centerBaru);
      map.setZoom(16);
      var marker = new google.maps.Marker({
        position: centerBaru,
        icon:'icon/marker_hotel.png',
        animation: google.maps.Animation.DROP,
        map: map
        });
      markersDua.push(marker);
      klikInfoWindow(id,marker);
      map.setCenter(centerBaru);

    $('#table_kanan_hotel').append("<tr><td>"+name+"</td><td><a role='button' style='margin:5px' class='btn btn-success fa fa-road' title='route' onclick='route_sekitar(\""+latitude+"\",\""+longitude+"\",\""+lat+"\",\""+lon+"\")'></a><a role='button' style='margin:5px' class='btn btn-success fa fa-info' title='info' onclick='modal_hotel(\""+id+"\")'></a><a role='button' style='margin:5px' class='btn btn-success fa fa-map-marker' title='position' onclick='set_center(\""+lat+"\",\""+lon+"\",\""+name+"\")'></a><a role='button' class='btn btn-success fa fa-taxi' title='transportation' style='margin:5px' onclick='angkot_sekitar_lagi(\""+id+"\")'></a></td></tr>");
    }//end for
  }});//end ajax
}

function restaurant_sekitar(latitude,longitude,rad){ // TEMPAT WISATA SEKITAR ANGKOT

  $('#table_kanan_restaurant').empty();
  $('#table_kanan_restaurant').append("<tr><th class='centered'>Restaurant Name</th><th class='centered'>Action</th></tr>");
  console.log(server+'_sekitar_restaurant.php?lat='+latitude+'&lng='+longitude+'&rad='+rad);
  $.ajax({url: server+'_sekitar_restaurant.php?lat='+latitude+'&lng='+longitude+'&rad='+rad, data: "", dataType: 'json', success: function(rows){
    for (var i in rows){
      var row = rows[i];
      var id          = row.id;
      var name       = row.name;
      var jarak  = row.jarak;
      var lat    = row.lat;
      var lon   = row.lng;

      //POSISI MAP
      centerBaru = new google.maps.LatLng(lat, lon);
      map.setCenter(centerBaru);
      map.setZoom(16);
      var marker = new google.maps.Marker({
        position: centerBaru,
        icon:'icon/marker_kuliner.png',
        animation: google.maps.Animation.DROP,
        map: map
        });
      markersDua.push(marker);
      klikInfoWindow(id,marker);
      map.setCenter(centerBaru);

      $('#table_kanan_restaurant').append("<tr><td>"+name+"</td><td><a role='button' style='margin:5px' class='btn btn-success fa fa-road' title='route' onclick='route_sekitar(\""+latitude+"\",\""+longitude+"\",\""+lat+"\",\""+lon+"\")'></a><a role='button' style='margin:5px' class='btn btn-success fa fa-info' title='info' onclick='modal_restaurant(\""+id+"\")'></a><a role='button' style='margin:5px' class='btn btn-success fa fa-map-marker' title='position' onclick='set_center(\""+lat+"\",\""+lon+"\",\""+name+"\")'></a><a role='button' class='btn btn-success fa fa-taxi' title='transportation' style='margin:5px' onclick='angkot_sekitar_lagi(\""+id+"\")'></a></td></tr>");
    }//end for
  }});//end ajax
}

function angkot_sekitar(id){ // Menu Angkot - List Angkot

$('#table_hotel').hide();
$('#table_tourism').hide();
$('#table_worship').hide();
$('#table_souvenir').hide();
$('#table_culinary').hide();
$('#table_industry').hide();
$('#table_restaurant').hide();

$('#view_table_sekitar').show();
$('#table_kanan_angkot').show();
$('#table_kanan_angkot').empty();
$('#table_kanan_angkot').append("<tr><th class='centered'>Destination</th><th class='centered'>Action</th></tr>");
console.log(server+'_detail_angkot.php?id='+id);
$.ajax({
url: server+'_detail_angkot.php?id='+id, data: "", dataType: 'json', success: function(rows)
{
    for (var i in rows){
      var row = rows[i];
      var ids = row.id;
      var destination = row.destination;
      var color = row.color;
      var cost = row.cost;
      var lat = row.lat;
      var lng = row.lng;
      var lat2 = row.lat2;
      var lng2 = row.lng2;
      console.log(ids);
      route_angkot_1(id,color);
      $('#table_kanan_angkot').append("<tr><td>"+destination+"</td><td><a role='button' class='btn btn-success fa fa-info' title='info' onclick='modal_angkot(\""+ids+"\")'></a><a style='margin-left:10px' role='button' class='btn btn-success fa fa-road' title='route' onclick='clearangkot();route_angkot(\""+lat2+"\",\""+lng2+"\",\""+lat+"\",\""+lng+"\",\""+ids+"\",\""+id+"\")'></a></td></tr>");
    }
//            route_angkot(lat1,lng1,lat,lng,id_angkot,id
}});
}

function modal_angkot(id){
  document.getElementById('mg_title').innerHTML="Info";
console.log(server+'_data_angkot_1.php?cari='+id);
$.ajax({url: server+'_data_angkot_1.php?cari='+id, data: "", dataType: 'json', success: function(rows){
  for (var i in rows.data){
    var row = rows.data[i];
    var id = row.id;
    var destination = row.destination;
    var track = row.track;
    var cost = row.cost;
    var type = row.type;
    var color = row.color;
    console.log(destination);
    document.getElementById('mg_body').innerHTML="<h2>"+destination+"</h2><br><div style='margin-left:20px'>Track: "+track+"<br>Type: "+type+"<br>Cost: "+cost+"<br>Color: "+color+"</div>";
  }//end for

  $('#modal_gallery').modal('show');
}});//end ajax
}

/* **********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
REKOMENDASI
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*********************************************************************************************************************************************************** */

function listRekom(){
  $('#hotel_rekom').empty();
  $.ajax({
  url: server+'/_data_tourism.php', data: "", dataType: 'json', success: function(rows)
    {
      for (var i in rows)
        {
          var row = rows[i];
          var gid = row.id;
          var name = row.name;
          var longitude = row.lng;
          var latitude = row.lat;

          var ids= "cb_"+gid;
          var id = ids.replace(/\s+/, "") ;
          console.log(id);

          //Penambahan Untuk CheckBox di Rekomendasi Hotel
          $('div#hotel_rekom').append('<div class="checkbox"><label> <input  type="checkbox" id="'+id+'" value="'+latitude+','+longitude+'" >'+ name +'<br></label></div>');
            jumlah_tw++;
        }
    }
  });
}

// function rekom_hotel(){
//
//
// console.log("mulai");
// hapus_Semua();
// $('#view_rekom_table').empty();
//
// //PEMBUATAN PARAMETER
// var text = '?';
// var j=0;
// for (var i = 1; i <= jumlah_tw; i++) {
//   if (i<10) {
//     var id = "TM00"+i;
//   } else {
//     var id = "TM0"+i;
//   }
//   var cari = "#cb_"+id;
//   console.log(cari);
//   console.log(id);
//   var tes = $('div#hotel_rekom').find(cari);
//   console.log(tes);
//   if (tes.is(':checked')) {
//     console.log("jalannnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn");
//     console.log(tes.val());
//     if (j==0) {
//       text = text + 'nilai'+j+'='+tes.val();
//     } else {
//       text = text + '&nilai'+j+'='+tes.val();
//     }
//     j++;
//   } else {
//     console.log("tidakkkkkkkkkkkkkkkkkkkkkkkk");
//   }
// };//end for
//
// if (j == 0) {
//   document.getElementById('modal_title').innerHTML="Info";
//   document.getElementById('modal_body').innerHTML="Please Select the tourist attractions";
//   $('#myModal').modal('show');
//   return;
// }
// $("#loader").show();
// $("#loader_text").show();
//
// text = text + '&total=' +j;
// console.log(text);
// console.log(server+'/_rekom2.php'+text);
// if (j==0) {
//   alert("Make a choice of tourist attractions first");
// } else {
//   $.ajax({url: server+'_rekom2.php'+text, data: "", dataType: 'json', success: function(rows){
//     for (var i in rows){
//         var row      = rows[i];
//         var id = row.id_hotel;
//         var name = row.name;
//         var address = row.address;
//         var cp = row.cp;
//         var ktp = row.ktp;
//         var marriage_book = row.marriage_book;
//         var mushalla = row.mushalla;
//         var type_hotel = row.type_hotel;
//
//         var jarak    = row.jarak;
//         var lat      = row.lat;
//         var lon      = row.lng;
//         var total_industri  =row.total_industri;
//         var total_kuliner   = row.total_kuliner;
//         var total_masjid    = row.total_masjid;
//         var total_oleh      = row.total_oleh;
//         var total_tw        = row.total_tw;
//         var total_angkot    = row.total_angkot;
//         var total_objek     = row.total_objek;
//         console.log(id);
//
//         //POSISI MAP
//         centerBaru = new google.maps.LatLng(lat, lon);
//         map.setCenter(centerBaru);
//         map.setZoom(16);
//         var marker = new google.maps.Marker({
//           position: centerBaru,
//           icon:'icon/marker_hotel.png',
//           animation: google.maps.Animation.DROP,
//           map: map
//           });
//         markersDua.push(marker);
//         map.setCenter(centerBaru);
//         klikInfoWindow(id,marker);
//
//         var syarat="-";
//         if (ktp == 1 && marriage_book == 1) {
//           syarat = "ID Card & Marriage Certificate";
//         }
//         else if (ktp == 1) {
//           syarat = "ID Card";
//         } else if (marriage_book == 1) {
//           syarat = "Marriage Certificate";
//         }
//
//         var mushalla_stat = "-";
//         if (mushalla == 1) {
//           mushalla_stat = "Exist"
//         };
//
//         $('#view_rekom_table').append("<tr><td style='text-align:left'><b style='font-size:20px'>"+name+"</b><br>Address: "+address+"<br>Cp: "+cp+"<br>Syarat Menginap: "+syarat+"<br>Mushalla: "+mushalla_stat+"<br>Tipe Hotel: "+type_hotel+"</td><td><a role='button' class='btn btn-success' onclick='set_center(\""+lat+"\",\""+lon+"\",\""+name+"\")'>Position</a></td></tr>");
//       }//end for
//     //loader
//     $("#loader").hide();
//     $("#loader_text").hide();
//   }});//end ajax
//
//   $("#view_rekom").show();
// }//end else
// }


/* **********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
SEKITAR ANGKOT DARI TABLE DETAIL
PENCARIAN DENGAN ID OBJEK
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*********************************************************************************************************************************************************** */

function angkot_sekitar_lagi(id){ // Menu Angkot - List Angkot
$('#view_tracking').show();
$('#table_angkot').show();
$('#view_tracking_table').show();
$('#view_tracking_table').empty();
$('#view_tracking_table').append("<tr><th class='centered'>Destination</th><th class='centered'>Action</th></tr>");
var url;
if (id.includes("HT")) {
  url = "_detail_hotel.php";
} else if (id.includes("TM")) {
  url = "_detail_tourism.php";
} else if (id.includes("SO")) {
  url = "_detail_souvenir.php";
} else if (id.includes("RM")) {
  url = "_detail_culinary_place.php";
} else if (id.includes("M")) {
  url = "_detail_worship_place.php";
} else if (id.includes("IK")) {
  url = "_detail_industry.php";
} else if (id.includes("R")) {
  url = "_detail_restaurant.php";
}
console.log(server+url+'?id='+id);
$.ajax({
url: server+url+'?id='+id, data: "", dataType: 'json', success: function(rows)
{
    for (var i in rows){
      var row = rows[i];
      var ids = row.id;
      var destination = row.destination;
      var color = row.color;
      var lat = row.lat;
      var lng = row.lng;
      var lat2 = row.lat2;
      var lng2 = row.lng2;
      console.log(id);
      route_angkot_1(id,color);
      $('#view_tracking_table').append("<tr><td>"+destination+"</td><td><a role='button' class='btn btn-success fa fa-info' title='info' onclick='modal_angkot(\""+ids+"\")'></a><a style='margin-left:10px' role='button' class='btn btn-success fa fa-road' title='route' onclick='clearangkot();route_angkot(\""+lat2+"\",\""+lng2+"\",\""+lat+"\",\""+lng+"\",\""+ids+"\",\""+id+"\")'></a></td></tr>");
    }
}});
}


function klikInfoWindow(id, marker)
{
google.maps.event.addListener(marker, "click", function(){
    data_hotel_1_info(id);
});
console.log("berhasil");
}
function klikInfoWindowKul(id,marker)
{
google.maps.event.addListener(marker, "click", function(){
    modal_kuliner(id);
});
console.log("berhasil");
}
function klikInfoWindowSou(id,marker)
{
google.maps.event.addListener(marker, "click", function(){
    modal_oo(id);
});
console.log("berhasil");
}
function klikInfoWindowMes(id,marker)
{
google.maps.event.addListener(marker, "click", function(){
    modal_masjid(id);
});
console.log("berhasil");
}
function klikInfoWindowOW(id,marker)
{
google.maps.event.addListener(marker, "click", function(){
    modal_tw(id);
});
console.log("berhasil");
}
function klikInfoWindowSM(id,marker)
{
google.maps.event.addListener(marker, "click", function(){
    modal_small_industry(id);
});
console.log("berhasil");
}
function klikInfoWindowRes(id,marker)
{
google.maps.event.addListener(marker, "click", function(){
    modal_restaurant(id);
});
console.log("berhasil");
}
function galleryreco(a)
      {
        console.log(a);
        window.open(server+'gallery.php?idgallery='+a);
      }
