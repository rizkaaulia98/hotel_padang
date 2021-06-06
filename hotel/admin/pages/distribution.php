<?php
    session_start();
    $username = $_SESSION['username'];
    $id_c     = $_SESSION['id'];
    $city     = $_SESSION['name'];
    include("../../../connect.php");
    $query = "SELECT DISTINCT count(hotel.id) as sed, d.name as kec FROM hotel,district d,city c
    WHERE ST_CONTAINS(d.geom, hotel.geom)AND c.id='$id_c' AND ST_CONTAINS(c.geom,hotel.geom) group by d.id";
    $result = mysqli_query($conn,$query);
    $json=[];
    $json2=[];
    while($row = mysqli_fetch_assoc($result)){
      extract($row);
      $json[] = (int)$sed;
      $json2[] = $kec;
    }

    $kilangan = "SELECT DISTINCT count(hotel.id) as jml, d.name as kec FROM hotel,district d,city c
    WHERE ST_CONTAINS(d.geom, hotel.geom)AND d.id='K01' and c.id='$id_c'";
    $kl = mysqli_query($conn, $kilangan);
    while($data = mysqli_fetch_assoc($kl)){
      $kilangans = $data['jml'];
    }

    $pauh = "SELECT DISTINCT count(hotel.id) as jml, d.name as kec FROM hotel,district d,city c
    WHERE ST_CONTAINS(d.geom, hotel.geom)AND d.id='K02' and c.id='$id_c'";
    $p = mysqli_query($conn, $pauh);
    while ($data = mysqli_fetch_assoc($p)) {
      $pauhs = $data['jml'];
    }

    $selatan = "SELECT DISTINCT count(hotel.id) as jml, d.name as kec FROM hotel,district d,city c
    WHERE ST_CONTAINS(d.geom, hotel.geom)AND d.id='K03' and c.id='$id_c'";
    $s = mysqli_query($conn, $selatan);
    while ($data = mysqli_fetch_assoc($s)) {
      $selatans = $data['jml'];
    }

    $lubeg = "SELECT DISTINCT count(hotel.id) as jml, d.name as kec FROM hotel,district d,city c
    WHERE ST_CONTAINS(d.geom, hotel.geom)AND d.id='K04' and c.id='$id_c'";
    $l = mysqli_query($conn, $lubeg);
    while ($data = mysqli_fetch_assoc($l)) {
      $lubegs = $data['jml'];
    }

    $timur = "SELECT DISTINCT count(hotel.id) as jml, d.name as kec FROM hotel,district d,city c
    WHERE ST_CONTAINS(d.geom, hotel.geom)AND d.id='K05' and c.id='$id_c'";
    $t = mysqli_query($conn, $timur);
    while ($data = mysqli_fetch_assoc($t)) {
      $timurs = $data['jml'];
    }

    $kuranji = "SELECT DISTINCT count(hotel.id) as jml, d.name as kec FROM hotel,district d,city c
    WHERE ST_CONTAINS(d.geom, hotel.geom)AND d.id='K06' and c.id='$id_c'";
    $k = mysqli_query($conn, $kuranji);
    while (  $data = mysqli_fetch_assoc($k)) {
      $kuranjis = $data['jml'];
    }

    $nanggalo = "SELECT DISTINCT count(hotel.id) as jml, d.name as kec FROM hotel,district d,city c
    WHERE ST_CONTAINS(d.geom, hotel.geom)AND d.id='K07' and c.id='$id_c'";
    $n = mysqli_query($conn, $nanggalo);
    while ($data = mysqli_fetch_assoc($n)) {
      $nanggalos = $data['jml'];
    }

    $barat = "SELECT DISTINCT count(hotel.id) as jml, d.name as kec FROM hotel,district d,city c
    WHERE ST_CONTAINS(d.geom, hotel.geom)AND d.id='K08' and c.id='$id_c'";
    $b = mysqli_query($conn, $barat);
    while ($data = mysqli_fetch_assoc($b)) {
      $barats = $data['jml'];
    }

    $utara = "SELECT DISTINCT count(hotel.id) as jml, d.name as kec FROM hotel,district d,city c
    WHERE ST_CONTAINS(d.geom, hotel.geom)AND d.id='K09' and c.id='$id_c'";
    $u = mysqli_query($conn, $utara);
    while ($data = mysqli_fetch_assoc($u)) {
      $utaras = $data['jml'];
    }

    $bungus = "SELECT DISTINCT count(hotel.id) as jml, d.name as kec FROM hotel,district d,city c
    WHERE ST_CONTAINS(d.geom, hotel.geom)AND d.id='K10' and c.id='$id_c'";
    $bung = mysqli_query($conn, $bungus);
    while ($data = mysqli_fetch_assoc($bung)) {
      $bunguss = $data['jml'];
    }

    $tangah = "SELECT DISTINCT count(hotel.id) as jml, d.name as kec FROM hotel,district d,city c
    WHERE ST_CONTAINS(d.geom, hotel.geom)AND d.id='K11' and c.id='$id_c'";
    $tang = mysqli_query($conn, $tangah);
    while ($data = mysqli_fetch_assoc($tang)) {
      $tangahs = $data['jml'];
    }

    $mandiangin = "SELECT DISTINCT count(hotel.id) as jml, d.name as kec FROM hotel,district d,city c
    WHERE ST_CONTAINS(d.geom, hotel.geom)AND d.id='K12' and c.id='$id_c'";
    $man = mysqli_query($conn, $mandiangin);
    while ($data = mysqli_fetch_assoc($man)) {
      $mandiangins = $data['jml'];
    }

    $gugukpa = "SELECT DISTINCT count(hotel.id) as jml, d.name as kec FROM hotel,district d,city c
    WHERE ST_CONTAINS(d.geom, hotel.geom)AND d.id='K13' and c.id='$id_c'";
    $gp = mysqli_query($conn, $gugukpa);
    while ($data = mysqli_fetch_assoc($gp)) {
      $gukpa = $data['jml'];
    }

    $abtb = "SELECT DISTINCT count(hotel.id) as jml, d.name as kec FROM hotel,district d,city c
    WHERE ST_CONTAINS(d.geom, hotel.geom)AND d.id='K14' and c.id='$id_c'";
    $ab = mysqli_query($conn, $abtb);
    while ($data = mysqli_fetch_assoc($ab)) {
      $aur = $data['jml'];
    }

 ?>

<!DOCTYPE html>
<html lang="en">

  <head>
      <title>Distribution of Hotel</title>
      <link href="../../assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="../../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../../assets/js/fancybox/jquery.fancybox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../../assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="../../assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="../../assets/lineicons/style.css">
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link href="../../assets/css/style-responsive.css" rel="stylesheet">
    <link href="../../assets/css/icomoon/styles.css" rel="stylesheet">


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="../../assets/Chart.js"></script>
    <script src="../../../config_public.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCANwWGF7aEZiZbtT0vV3v27gRx_ufIoHs"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript">
    var map;
    var server = "http://localhost/hotel_padang1/hotel/";
    var markersDua = [];

    var centerBaru;

    var color = "";

    function init()
        {
          basemap();
          kecamatanTampil();
        }

    function basemap()
        {
          var cityName = document.getElementById('cityName').value;
            console.log(cityName);
            if(cityName=="CT01"){
              map = new google.maps.Map(document.getElementById('map'),
                {
                  zoom: 10.6,
                  center: new google.maps.LatLng(-0.9478796428309669, 100.41658474111512),
                  mapTypeId: google.maps.MapTypeId.ROADMAP
              });
            }else if(cityName=="CT02"){
              map = new google.maps.Map(document.getElementById('map'),
                {
                  zoom: 13.3,
                  center: new google.maps.LatLng(-0.3051596, 100.3673319),
                  mapTypeId: google.maps.MapTypeId.ROADMAP
              });
            }
        }


    //Membuat Fungsi Menampilkan Digitasi Kecamatan (Batas Kecamatan di Kota Padang)
      function kecamatanTampil()
      {
        ab = new google.maps.Data();
        ab.loadGeoJson(server+'kecamatan.php');
        ab.setStyle(function(feature)
                {
                  var gid = feature.getProperty('id');
                  if (gid == 'K01'){
                    return({
                      fillColor:'#ff3300',
                      strokeWeight:0.8,
                      strokeColor:'#ffffff',
                      fillOpacity: 0.3,
                      clickable: false
                    });
                }
                  else if(gid == 'K02'){
                    return({
                      fillColor:'#ffd777',
                      strokeWeight:0.8,
                      strokeColor:'#ffffff',
                      fillOpacity: 0.5,
                      clickable: false
                    });
                }
                  else if(gid == 'K03'){
                    return({
                      fillColor:'#00b300' ,
                      strokeWeight:0.8,
                      strokeColor:'#ffffff' ,
                      fillOpacity:0.3,
                      clickable: false
                    });
                }
                  else if(gid == 'K04'){
                    return({
                      fillColor:'#618685' ,
                      strokeWeight:0.8,
                      strokeColor:'#ffffff' ,
                      fillOpacity: 0.5,
                      clickable: false
                    });
                }
                  else if(gid == 'K05'){
                    return({
                      fillColor:'#337AFF' ,
                      strokeWeight:0.8,
                      strokeColor:'#ffffff' ,
                      fillOpacity:0.3,
                      clickable: false
                    });
                }
                  else if(gid == 'K06'){
                    return({
                      fillColor:'#FF9300' ,
                      strokeWeight:0.8,
                      strokeColor:'#ffffff' ,
                      fillOpacity:0.3,
                      clickable: false
                    });
                }
                  else if(gid == 'K07'){
                    return({
                      fillColor:'#FF00C1' ,
                      strokeWeight:0.8,
                      strokeColor:'#ffffff' ,
                      fillOpacity:0.3,
                      clickable: false
                    });
                }
                  else if(gid == 'K08'){
                    return({
                      fillColor:'#FF0000' ,
                      strokeWeight:0.8,
                      strokeColor:'#ffffff' ,
                      fillOpacity:0.3,
                      clickable: false
                    });
                }
                  else if(gid == 'K09'){
                    return({
                      fillColor:'#04FF00' ,
                      strokeWeight:0.8,
                      strokeColor:'#ffffff' ,
                      fillOpacity:0.3,
                      clickable: false
                    });
                }
                  else if(gid == 'K10'){
                    return({
                      fillColor:'#EC00FF' ,
                      strokeWeight:0.8,
                      strokeColor:'#ffffff' ,
                      fillOpacity:0.3,
                      clickable: false
                    });
                }
                  else if(gid == 'K11'){
                    return({
                      fillColor:'#0A0D85' ,
                      strokeWeight:0.8,
                      strokeColor:'#ffffff' ,
                      fillOpacity:0.3,
                      clickable: false
                    });
                }
                  else if(gid == 'K12'){
                    return({
                      fillColor:'#04FF00' ,
                      strokeWeight:0.8,
                      strokeColor:'#ffffff' ,
                      fillOpacity:0.3,
                      clickable: false
                    });
                }
                  else if(gid == 'K13'){
                    return({
                      fillColor:'#f38c89' ,
                      strokeWeight:0.8,
                      strokeColor:'#ffffff' ,
                      fillOpacity:0.3,
                      clickable: false
                    });
                }
                  else if(gid == 'K14'){
                    return({
                      fillColor:'#a5a4a2' ,
                      strokeWeight:0.8,
                      strokeColor:'#ffffff' ,
                      fillOpacity:0.3,
                      clickable: false
                    });
                }
                }
        );
        ab.setMap(map);
      }

          function legenda()
            {
              $('#tombol').empty();
              $('#tombol').append('<a type="button" title="legend" id="hidelegenda" onclick="hideLegenda()" class="btn btn-default " data-toggle="tooltip" title="Sembunyikan Legenda" style="margin-right: 5px; color:white; background-color: #26a69a; "><i class="fa fa-eye-slash" style=" color:white; background-color: #26a69a;"></i></a> ');
              var cityName = document.getElementById('cityName').value;
                console.log(cityName);
                if(cityName=="CT01"){
                  var layer = new google.maps.FusionTablesLayer(
                {
                      query: {
                        select: 'Location',
                        from: 'AIzaSyANIx4N48kL_YEfp-fVeWmJ_3MSItIP8eI'
                      },
                      map: map
                    });
                    var legend = document.createElement('div');
                    legend.id = 'legend';
                    var content = [];
                    content.push('<h4 class="centered">Number of Hotels per District</h4>');
                    content.push('<p><div class="color a"></div>Lubuk Kilangan: <?php echo $kilangans?> Hotel</p>');
                    content.push('<p><div class="color b"></div>Pauh: <?php echo $pauhs?>Hotel</p>');
                    content.push('<p><div class="color c"></div>Padang Selatan: <?php echo $selatans?> Hotel</p>');
                    content.push('<p><div class="color d"></div>Lubuk Begalung: <?php echo $lubegs?> Hotel</p>');
                    content.push('<p><div class="color e"></div>Padang Timur: <?php echo $timurs?> Hotel</p>');
                    content.push('<p><div class="color f"></div>Kuranji: <?php echo $kuranjis?> Hotel</p>');
                    content.push('<p><div class="color g"></div>Nanggalo: <?php echo $nanggalos?> Hotel</p>');
                    content.push('<p><div class="color h"></div>Padang Barat: <?php echo $barats?> Hotel</p>');
                    content.push('<p><div class="color i"></div>Padang Utara: <?php echo $utaras?> Hotel</p>');
                    content.push('<p><div class="color j"></div>Bungus Teluk Kabung: <?php echo $bunguss?> Hotel</p>');
                    content.push('<p><div class="color k"></div>Koto Tangah: <?php echo $tangahs?> Hotel</p>');


                    legend.innerHTML = content.join('');
                    legend.index = 1;
                    map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(legend);
                }else if(cityName=="CT02"){
                  var layer = new google.maps.FusionTablesLayer(
                {
                      query: {
                        select: 'Location',
                        from: 'AIzaSyANIx4N48kL_YEfp-fVeWmJ_3MSItIP8eI'
                      },
                      map: map
                    });
                    var legend = document.createElement('div');
                    legend.id = 'legend';
                    var content = [];
                    content.push('<h4 class="centered">Number of Hotels per District</h4>');
                    content.push('<p><div class="color l"></div>Mandiangin Koto Selayan: <?php echo $mandiangins?> Hotel</p>');
                    content.push('<p><div class="color m"></div>Guguak Panjang: <?php echo $gukpa?> Hotel</p>');
                    content.push('<p><div class="color n"></div>Aur Birugo Tigo Baleh: <?php echo $aur?> Hotel</p>');

                    legend.innerHTML = content.join('');
                    legend.index = 1;
                    map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(legend);
                }

            }


            function hideLegenda() {
              $('#legend').remove();
              $('#tombol').empty();
              // console.log("hy jackkky");
              $('#tombol').append('<a type="button" title="legend" id="showlegenda" onclick="legenda()" class="btn btn-default " data-toggle="tooltip" title="Legend" style="margin-right: 5px; color:white; background-color: #26a69a; "><i class="fa fa-eye" style="color:white; background-color:#26a69a; "> </i></a>');
            }


    </script>
    <style type="text/css">
        #legend {
          background:white;
          padding: 10px;
          margin: 5px;
          font-size: 12px;
          font-family: Arial, sans-serif;
          }
          .color {
              border: 1px solid;
              height: 12px;
              width: 12px;
              margin-right: 3px;
              float: left;
          }
          .a {
              background: #ff3300;
              fillOpacity: 0.3;
            }
          .b {
              background: #ffd777;
              fillOpacity: 0.3;
            }
          .c {
              background: #00b300;
              fillOpacity: 0.3;
            }
          .d {
              background: #618685;
              fillOpacity: 0.3;
            }
          .e {
              background: #337AFF;
              fillOpacity: 0.3;
            }
          .f {
              background: #FF9300;
              fillOpacity: 0.3;
            }
          .g {
              background: #FF00C1;
              fillOpacity: 0.3;
            }
          .h {
              background: #FF0000;
              fillOpacity: 0.3;
            }
          .i {
              background: #04FF00;
              fillOpacity: 0.3;
            }
          .j {
              background: #EC00FF;
              fillOpacity: 0.3;
            }
          .k {
              background: #0A0D85;
              fillOpacity: 0.3;
            }
          .l {
              background: #04FF00;
              fillOpacity: 0.3;
            }
          .m{
              background: #f38c89;
              fillOpacity: 0.3;
            }
          .n{
              background: #a5a4a2;
              fillOpacity: 0.3;
            }

        </style>
  </head>
  <body onload="init();listHotel();">
     <!-- Google Tag Manager (noscript) -->
     <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TVZZFTL" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <section id="container" >
      <header class="header black-bg">
        <a class="logo" style="font-family: Arial"><i class="fa fa-bars tooltips" style="color: white" data-placement="right" data-original-title="Toggle Navigation"></i>&nbsp&nbsp<b>WEB</b><b>GIS •</b>Distribution Of hotel</a>
        <a href="admin/login.php" class="btn btn-default" title="Login" style="margin-top: 10px; background-color: #26a69a; font-size: 14px; color:white; font-family: arial; float: right;"><i class='icon-enter6'></i>&nbsp<b>LOGIN</b></a>
      </header>

      <aside>
        <div id="sidebar"  class="nav-collapse ">
          <ul class="sidebar-menu" id="nav-accordion">
              <li class="sub-menu">
                <a href="../index.php">
                    <i class="fa fa-chevron-circle-left"></i>
                    <span>Back To Home</span>
                </a>
              </li>
  				</ul>
        </div>
      </aside>

      <br><br><br>
      <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-sm-12">
            <div class="col-sm-12">
              <section class="panel">
                <div class="panel-body">
                  <h3 class="text-primary text-center" style="font-size: 50px;">
                    Hotel in Each District
                  </h3>
                  <canvas id="myChart" style="height: 300px;"></canvas>
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

                  <script>
                  var ctx = document.getElementById("myChart");
                  var myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                      labels: <?php echo json_encode($json2);?>,
                      datasets: [{
                          label: 'Number of Hotels',
                          data: <?php echo json_encode($json)?>,
                          backgroundColor: [
                            '#FAFAD2',
                            '#FFC0CB',
                            '#B0C4DE',
                            '#FFE4C4',
                            '#98FB98',
                            '#DB7093',
                            '#D8BFD8',
                            '#008B8B',
                            '#E9967A',
                            '#DCDCDC',
                            '#FFD700',
                            '#E6E6FA',
                            '#F0E68C',
                            '#FFF0F5'
                          ],
                          borderColor: [
                            '#FAFAD2',
                            '#FFC0CB',
                            '#B0C4DE',
                            '#FFE4C4',
                            '#98FB98',
                            '#DB7093',
                            '#D8BFD8',
                            '#008B8B',
                            '#E9967A',
                            '#DCDCDC',
                            '#FFD700',
                            '#E6E6FA',
                            '#F0E68C',
                            '#FFF0F5'
                          ],
                          borderWidth: 1
                      }]
                      },
                      options: {
                        legend: {
                            labels: {
                                fontColor: "#26a69a",
                                fontSize: 14
                            }
                        },
                          scales: {
                              yAxes: [{
                                  ticks: {
                                      beginAtZero:true
                                  }
                              }]
                          }

                      }
                  });
                  </script><br>
                  <canvas id="myChart1" style="height: 300px;"></canvas>
                  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
                  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.4.0/dist/chartjs-plugin-datalabels.min.js"></script>
                  <script>
                  var ctx = document.getElementById("myChart1");
                  var myChart1 = new Chart(ctx, {
                  type: 'pie',
                  data: {
                      labels: <?php echo json_encode($json2);?>,
                      datasets: [{
                          label: 'Number of Hotels',
                          data: <?php echo json_encode($json)?>,
                          backgroundColor: [
                            '#FAFAD2',
                            '#FFC0CB',
                            '#B0C4DE',
                            '#FFE4C4',
                            '#98FB98',
                            '#DB7093',
                            '#D8BFD8',
                            '#008B8B',
                            '#E9967A',
                            '#DCDCDC',
                            '#FFD700',
                            '#E6E6FA',
                            '#F0E68C',
                            '#FFF0F5'
                          ],
                          borderColor: [
                            '#FAFAD2',
                            '#FFC0CB',
                            '#B0C4DE',
                            '#FFE4C4',
                            '#98FB98',
                            '#DB7093',
                            '#D8BFD8',
                            '#008B8B',
                            '#E9967A',
                            '#DCDCDC',
                            '#FFD700',
                            '#E6E6FA',
                            '#F0E68C',
                            '#FFF0F5'
                          ],
                          borderWidth: 1
                      }]
                      },
                      options: {
                          // scales: {
                          //     yAxes: [{
                          //         ticks: {
                          //             beginAtZero:true
                          //         }
                          //     }]
                          // },
                          legend: {
                            labels: {
                                fontColor: "#26a69a",
                                fontSize: 14
                            }
                          },
                          plugins: {
                            datalabels: {
                              formatter: (value, ctx) => {
                                let datasets = ctx.chart.data.datasets;
                                if (datasets.indexOf(ctx.dataset) === datasets.length - 1) {
                                  let sum = datasets[0].data.reduce((a, b) => a + b, 0);
                                  let percentage = Math.round((value / sum) * 100) + '%';
                                  return percentage;
                                } else {
                                  return percentage;
                                }
                              },
                              color: '#424a5d',
                              font: {
                                weight: 'bold',
                                size: 14,
                              }
                            }
                          },

                      }
                  });
                  </script>

                  <br><hr style="border: 1px solid #26a69a;">
                  <h3 class="text-primary text-center" style="font-size: 50px;">
                    Districts On Map
                  </h3>

                  <label id="tombol">
                    <a type="button" onclick="legenda()" id="showlegenda" class="btn btn-default" data-toggle="tooltip" title="Legend" style="margin-right: 5px; background-color: #26a69a;"><i class="fa fa-eye" style="color: white;"></i>
                  </a>
                  </label>
                  <input type="hidden" id="cityName" value="<?php echo $id_c; ?>">
                  <div id="map" style="height:450px; z-index:30;"></div>
                </div>
              </section>
            </div>

          </div>

        </div>

      </section>
      </section>
  </body>
</html>
