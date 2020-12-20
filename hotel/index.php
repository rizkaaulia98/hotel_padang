<?php
session_start();
    $username = $_SESSION['username'];
    $id_city  = $_SESSION['id'];
    $city     = $_SESSION['name'];

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website untuk pengembangan wisata Bukittinggi">
    <meta name="author" content="Rizka">
    <meta name="keyword" content="Hotel, SI Unand, Unand, Wisata">

    <title>Halal Tourism • <?php echo $city; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slider.css">



    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/css/icomoon/styles.css" rel="stylesheet">


    <!--  Slide -->
    <link rel="stylesheet" type="text/css" href="assets/css/slider.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slidernew.css">
    <link rel="stylesheet" type="text/css" href="assets/css/carousel.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
    .mySlides {display:none}
    .w3-left, .w3-right, .w3-badge {cursor:pointer}
    .w3-badge {height:13px;width:13px;padding:0}
    </style>

    <script src="assets/js/chart-master/Chart.js"></script>

    <script src="../config_public.js"></script>
    <script src="_map.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgpfxdQ0Ep_nieNjV64u4yXWeSFHAT4BE"></script>


    <style type="text/css">
          #legend {
            background: white;
            padding: 10px;
            margin: 5px;
            font-size: 12px;
            text-align: left;
            color: black;
            font-family: Arial, sans-serif;
          }
          .color {
              border: 1px solid;
              height: 14px;
              width: 18px;
              margin-right: 3px;
              float: left;
              opacity: 0.4;
          }
          .a {
              background: #00b300;
            }
          .b {
              background: #FF0000;
            }
          /* .c {
              background: #00b300;
            }
          .d {
              background: #33CCFF;
            }
          .e {
              background: #337AFF;
            }
          .f {
              background: #FF9300;
            }
          .g {
              background: #66FF33;
            }
          .h {
              background: #996600;
            }
          .i {
              background: #FFFF00;
            }
          .j {
              background: #CC0099;
            }
          .k {
              background: #110094;
            } */

          /*css scrollbar*/
          ::-webkit-scrollbar {
              width: 7px;
          }

          ::-webkit-scrollbar-track {
              background: #fff;
          }

          ::-webkit-scrollbar-thumb {
              background:  /*white*/ #26a69a;
              border-radius:10px;
          }
        </style>
    <!--LOADER-->
    <style>
    #loader {
      border: 16px solid #f3f3f3;
      border-radius: 50%;
      border-top: 16px solid #3498db;
      width: 40px;
      margin: 5px;
      height: 40px;
      -webkit-animation: spin 2s linear infinite;
      animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
      0% { -webkit-transform: rotate(0deg); }
      100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
    </style>

  </head>

  <body onload="init();" >
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-180188427-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-180188427-1');
    </script>


  <section id="container" >

      <!-- Modal -->
      <div class="modal fade" id="modal_gallery" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="background:#26a69a">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" id="mg_title">Modal Header</h4>
            </div>
            <div class="modal-body" id="mg_body">

                <!--GALERY-->
                <div id="view_galery" class="row" style="display:none">
                    <div class="col-md-12 col-sm-12 mb">
                       <div class="row centered" style="padding:10px">
                         <div class="col-sm-1 col-xs-1"></div>
                         <div id="gal" class="col-sm-10 col-xs-10" style="height:300px;">
                            <!--img class="img-responsive" src="assets/img/ny.jpg" style="width:100%;height:100%;"-->

                            <div class="w3-content w3-display-container" style="max-height:300px;max-width:600px">
                              <div id="img_gambar">

                              </div>

                              <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
                                <div class="col-md-6 col-sm-6 mb">
                                    <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
                                </div>
                                <div class="col-md-6 col-sm-6 mb">
                                    <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
                                </div>
                                <div id="span_gambar">

                                </div>
                              </div>
                            </div>

                         </div>
                         <div class="col-sm-1 col-xs-1"></div>
                       </div>
                    </div><!-- /col-md-12 -->
                </div><!-- /row -->

                <div class="col-md-12 col-sm-12 mb" style="margin-top:10px">
                  <p id="mg_text" ></p>
                </div><!-- /col-md-12 -->

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>


      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="background:#26a69a">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" id="modal_title">Modal Header</h4>
            </div>
            <div class="modal-body" id="modal_body">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>

      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation" style="color: white;"></div>
            <input type="hidden" id="cityName" value='<?php echo $id_city; ?>'>
        </div>
        <!--logo start-->
        <a href="index.php" class="logo" style="font-family: arial;"><b>WEBGIS</b> • <?php echo $city;?> Hotel</a>
        <div class="top-menu">
        	<ul class="nav pull-right top-menu">
            <li><div id="loader" style="display:none;margin-right:5px"></div></li>
            <li id="loader_text" style="margin-top:13px;margin-right:40px;display:none"><b>Loading</b></li>
            <li class="nav pull-right top-menu">
            <?php

              //echo "username $username, role $role,";
            if($_SESSION['C'] == false)
            {
              echo "<a href='admin/login.php' class='logo' style='font-size:14px;color:white'><i class='icon-enter6'></i>
              <b>Login</b></a>";
              //echo "username $username, role $role,$_SESSION['C'] || $_SESSION['A'] || $_SESSION['P'] ";
            }
            else{
              echo "<a href='admin/act/logout.php' class='logo' style='font-size:14px;color:white'><i class='icon-esc'></i>
              <b>logout</b></a>";
              //echo "username $username, role $role";
            }

             ?>


            </li>
        	</ul>
        </div>
      </header>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <?php
        include 'menu.php';
      ?>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">

          <section class="wrapper">

              <div class="row">
                <div class="col-lg-8 main-chart">

                  <!--PETA-->
                  <div class="row">
                      <div class="col-md-12 col-sm-12 mb">
                        <div class="white-panel pns">

                          <header class="panel-heading" style="float:left">
                            <label style="color: black; margin-right:20px">Google Map with Location List</label>
                            <input type="hidden" id="myLatLocation" value="0">
                            <input type="hidden" id="myLngLocation" value="0">
                            <a class="btn btn-default" role="button" style="background-color: #26a69a" data-toggle="collapse" onclick="posisisekarang()" title="Current Position" style="margin-right:10px"   ><i class="fa fa-location-arrow" style="color:white;"></i></a>
                            <a class="btn btn-default" role="button" style="background-color: #26a69a" data-toggle="collapse" onclick="lokasimanual()" title=" Manual Position" ><i class="fa fa-map-marker" style="color:white;"></i></a>
                            <label id="tombol">
                            <a class="btn btn-default" role="button" style="background-color: #26a69a" id="showlegenda" data-toggle="collapse" onclick="legenda()" title="Legend"   ><i class="fa fa-eye" style="color:white;"></i></a></label>

                          </header>

                           <div class="row">
                             <div class="col-sm-6 col-xs-6"></div>
                           </div>
                           <div id="map" class="centered" style="height:460px">
                           </div>
                        </div>
                      </div><!-- /col-md-12 -->
                  </div><!-- /row -->

                  <!--INFO OBJEK-->
                  <div id="view_data_tengah1" class="row" style="display:none">
                      <div class="col-md-12 col-sm-12 mb">
                        <div class="white-panel pns" style="height:auto;padding-bottom:20px">
                           <div style="margin:0px 20px 10px 20px">
                             <h5 class="btn btn-compose" >Object Information</h5>
                           </div>
                            <label id="label_angkot">
                              <a class='btn btn-default' role=button' data-toggle='collapse'  onclick='' title='Nearby' aria-controls='Nearby' id="btn_angkot">
                              <i class='fa fa-compass' style='color:black;'></i>
                              <label>&nbsp Angkot</label>
                              </a>
                            </label>
                            <label id="label_gallery">
                              <a class='btn btn-default' role=button' data-toggle='collapse'  onclick='' title='Nearby' aria-controls='Nearby' id="btn_gallery">
                              <i class='fa fa-compass' style='color:black;'></i>
                              <label>&nbsp Gallery</label>
                              </a>
                            </label>

                           <div class="row centered" style='margin-top:20px;color:black;'>
                             <div class="col-sm-1 col-xs-1"></div>
                             <div class="col-sm-10 col-xs-10">
                              <!--table class="table table-hover" id='view_table_tengah'>
                              </table-->
                              <table class="table" id='table_tengah_info'>
                                <tbody  style='vertical-align:top;'>
                                </tbody>
                              </table>

                             </div>
                             <div class="col-sm-1 col-xs-1"></div>
                           </div>
                        </div>
                      </div><!-- /col-md-12 -->
                  </div><!-- /row -->

                  <!--HASIL TRACKING-->
                  <div id="view_tracking" class="row" style="display:none;color:black">
                      <div class="col-md-12 col-sm-12 mb">
                        <div class="white-panel pns" style="">
                           <div class="white-header">
                             <h5 style='color:black'>Angkot Recommendations</h5>
                           </div>
                           <div class="row centered">
                             <div class="col-sm-1 col-xs-1"></div>
                             <div class="col-sm-10 col-xs-10">
                              <table class="table table-bordered">
                                <tbody id="view_tracking_table" style='color:black'></tbody>
                              </table>
                             </div>
                             <div class="col-sm-1 col-xs-1"></div>
                           </div>
                        </div>
                      </div><!-- /col-md-12 -->
                  </div><!-- /row -->

                  <!--HASIL TRACKING-->
                  <div id="view_tracking2" class="row" style="display:none;color:black">
                      <div class="col-md-12 col-sm-12 mb">
                        <div class="white-panel pns" style="">
                           <div class="white-header">
                             <h5 style='color:black'>Route</h5>
                           </div>

                           <div class="row centered">
                             <div class="col-sm-1 col-xs-1"></div>
                             <div class="col-sm-10 col-xs-10">
                              <table class="table table-bordered">
                                <tbody id="view_tracking_table2" style='color:black'></tbody>
                              </table>
                             </div>
                           </div>
                        </div>
                      </div><!-- /col-md-12 -->
                  </div><!-- /row -->

                </div><!-- /col-lg-9 END SECTION MIDDLE -->

                <!-- GALLERY RECOMMENDATION -->
      <div class="row" style="font-family: arial;"  id="galleryrecommendxxx">
        <div  class="col-lg-4 main-chart">
          <div class="row">
            <div class="col-sm-12 col-sm-12 mb">
              <div class="white-panel pns" style="height: auto; width: auto; padding-bottom: 10px" >
                <header class="panel-heading" style=" width: 100%;">
                  <!-- <h4 style="color: #26a69a;"><b>Recommendation</b></h4>
                  <hr> -->
                </header>

                <div style="height: 330px;">
                <!-- <br>  -->
                <!-- HOTEL -->
                <div style="margin: 10px;" id="hotelxxx">
                  <h4 style="color: black"> Hotel Recommendations</h4>
                  <hr>
                  <div id="myCarousel3" class="carousel slide" data-ride="carousel" style="margin: 5px;  border-color: grey">
                    <!-- Indicators -->
                    <ol class="carousel-indicators" style="bottom: 15px; font-size: 5px">
                      <li data-target="#myCarousel3" data-slide-to="0" class="active"></li>
                      <li data-target="#myCarousel3" data-slide-to="1"></li>
                      <li data-target="#myCarousel3" data-slide-to="2"></li>
                      <li data-target="#myCarousel3" data-slide-to="3"></li>
                      <li data-target="#myCarousel3" data-slide-to="4"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                      <div class="item active">
                        <img src="../_foto/we_hot.jpeg" style="width:100%;">
                        <div class="carousel-caption" style="bottom: 10px; ">
                          <b> <?php echo $city;?></b><br>
                          <font style="font-size: 12px; text-align: center">Hotel Recommended in <?php echo $city;?></font>
                        </div>
                      </div>

                          <div class="item" style="background-color: #efefef; padding: 10px">
                            <img src="../_foto/star.jpg" style="width:100%;" onclick="rec_hotel(1);">
                            <div class="carousel-caption" style="bottom: 5px" onclick="rec_hotel(1);">
                              <a style="color: white" ><b>Star Hotel Recommendations</b></a><br>
                            </div>
                          </div>
                          <div class="item" style="background-color: #efefef; padding: 10px">
                            <img onclick="rec_hotel(2);" src="../_foto/budget.jpg" style="width:100%;">
                            <div class="carousel-caption" style="bottom: 5px" onclick="rec_hotel(2);">
                              <a style="color: white" ><b>Budget Hotel Recommendations</b></a><br>
                            </div>
                          </div>
                          <div class="item" style="background-color: #efefef; padding: 10px">
                            <img src="../_foto/syariah.jpg" style="width:100%;" onclick="rec_hotel(3);">
                            <div class="carousel-caption" style="bottom: 5px" onclick="rec_hotel(3);">
                              <a style="color: white" ><b>Syariah Hotel Recommendations</b></a><br>
                            </div>
                          </div>
                          <div class="item" style="background-color: #efefef; padding: 10px">
                            <img src="../_foto/view.jpg" style="width:100%;" onclick="rec_hotel(4);">
                            <div class="carousel-caption" style="bottom: 5px" onclick="rec_hotel(4);">
                              <a style="color: white" ><b>Hotel with Best View</b></a><br>
                            </div>
                          </div>

                    </div>
                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel3" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel3" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- table list rekom -->
        <div id="view_rec_table" class="col-md-4 col-sm-4 mb" style="margin-top:0px; display:none;">
          <div class="white-panel pns" style="height:510px">
             <div class="white-header" style="height:40px;margin:20px;background:white;color:black">
               <h5 class="btn btn-compose" id="judul_table">Results</h5>
             </div>
             <div class="row">
               <div class="col-sm-6 col-xs-6"></div>
             </div>
             <div style="height:410px; overflow-y: scroll; margin:20px;">
                <table style="color:black" class="table table-bordered">
                  <!-- <tr id="kanan_table1"></tr> -->
                  <tbody id='rec_table'></tbody>
                </table>
             </div>
          </div>
        </div><!-- /col-md-12 -->
    </div>

      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->

                    <!-- DATA TABLE -->
                    <!-- list hotel -->
                      <div id="view_kanan_table" class="col-md-4 col-sm-4 mb" style="margin-top:0px; display:none;">
                        <div class="white-panel pns" style="height:510px">
                           <div class="white-header" style="height:40px;margin:20px;background:white;color:black">
                             <h5 class="btn btn-compose" id="judul_table">Results</h5>
                           </div>
                           <div class="row">
                             <div class="col-sm-6 col-xs-6"></div>
                           </div>
                           <div style="height:410px; overflow-y: scroll; margin:20px;">
                              <table style="color:black" class="table table-bordered">
                                <!-- <tr id="kanan_table1"></tr> -->
                                <tbody id='kanan_table'></tbody>
                              </table>
                           </div>
                        </div>
                      </div><!-- /col-md-12 -->

                      <!-- angkot -->
                      <div id="view_angkot_table" class="col-md-4 col-sm-4 mb" style="margin-top:0px; display:none;">
                        <div class="white-panel pns" style="height:510px">
                           <div class="white-header" style="height:40px;margin:20px;background:white;color:black">
                             <h5 class="btn btn-compose" id="judul_table">Results</h5>
                           </div>
                           <div class="row">
                             <div class="col-sm-6 col-xs-6"></div>
                           </div>
                           <div style="height:410px; overflow-y: scroll; margin:20px;">
                              <table style="color:black" class="table table-bordered">
                                <!-- <tr id="kanan_table1"></tr> -->
                                <tbody id='angkot_table'></tbody>
                              </table>
                           </div>
                        </div>
                      </div>

                      <div id="view_kanan_table1" class="col-md-4 col-sm-4 mb" style="margin-top:0px; display:none;">
                        <div class="white-panel pns">
                           <div class="white-header" style="height:40px;margin:20px;background:white;color:black">
                             <h5 class="btn btn-compose" id="judul_table">Object Arround</h5>
                           </div>
                           <div class="row">
                             <div class="col-sm-6 col-xs-6"></div>
                           </div>
                           <div style=" margin:20px;">
                              <table style="color:black" class="table table-bordered">
                                <!-- <tr id="kanan_table1"></tr> -->
                                <tbody id='kanan_table1'></tbody>
                              </table>
                           </div>
                        </div>
                      </div>


                    <!-- DATA TABLE OBJEK SEKITAR-->
                      <div id="view_table_sekitar" class="col-md-4 col-sm-4 mb" style="display:none">
                        <div class="white-panel pns" style="height:510px">
                           <div class="white-header" style="height:40px;margin:20px;margin-top:0px;background:white;color:black">
                             <h5 class="btn btn-compose">Search Results Object Around</h5>
                           </div>
                           <div class="row">
                             <div class="col-sm-6 col-xs-6"></div>
                           </div>
                           <div style="height:410px; margin:20px; overflow-y: scroll;">
                              <table id="table_hotel" class="table table-bordered">
                                <tbody id='table_kanan_hotel' style='color:black'></tbody>
                              </table>
                              <table id="table_tourism" class="table table-bordered">
                                <tbody id='table_kanan_tourism' style='color:black'></tbody>
                              </table>
                              <table id="table_worship" class="table table-bordered">
                                <tbody id='table_kanan_worship' style='color:black'></tbody>
                              </table>
                              <table id="table_souvenir" class="table table-bordered">
                                <tbody id='table_kanan_souvenir' style='color:black'></tbody>
                              </table>
                              <table id="table_culinary" class="table table-bordered">
                                <tbody id='table_kanan_culinary' style='color:black'></tbody>
                              </table>
                              <table id="table_angkot" class="table table-bordered">
                                <tbody id='table_kanan_angkot' style='color:black'></tbody>
                              </table>
                           </div>
                        </div>
                      </div><!-- /col-md-12 -->
                      <div id="view_table_sekitar1" class="col-md-4 col-sm-4 mb" style="display:none">
                        <div class="white-panel pns" style="height:510px">
                           <div class="white-header" style="height:40px;margin:20px;margin-top:0px;background:white;color:black">
                             <h5 class="btn btn-compose">Search Results Object Around</h5>
                           </div>
                           <div class="row">
                             <div class="col-sm-6 col-xs-6"></div>
                           </div>
                           <div style="height:410px; margin:20px; overflow-y: scroll;">
                           </div>
                         </div>
                       </div>

                    <!-- FROM TRACKING ANGKOT -->
                      <div id="view_kanan_track" class="col-md-4 col-sm-4 mb" style="margin-top:20px;display:none">
                        <div class="white-panel pns">
                           <div class="white-header" style="height:40px;margin:20px;background:white;color:white">
                             <h5 class="btn btn-compose" id="judul_select">Angkot Recommendations</h5>
                           </div>
                           <div class="row">
                             <div class="col-sm-6 col-xs-6"></div>
                           </div>

                           <div style="padding:20px" >
                             <div class="row" style="margin:5px">
                               <div class="col-sm-5 col-xs-5">
                                  <input id="input_posisi_awal_lng" type="text" class="form-control" style="display:none">
                                  <input id="input_posisi_awal_lat" type="text" class="form-control" style="display:none">
                                  <a role='button' class='btn btn-default text-center' onclick='posisi_manual_1();' id='btnik' style="width: 100%;">Position Start </a>
                                </div>
                               <div id="text_awal" class="col-sm-7 col-xs-7" style="font-size:12px;text-align:left">
                                <div class="alert alert-warning" style="display: inline-block;padding: 6px 12px;width:100%"><b>KLIK</b> For setting position start</div>
                               </div>
                             </div>

                             <div class="row" style="margin:5px">
                               <div class="col-sm-5 col-xs-5">
                                <input id="input_posisi_tujuan_lat" type="text" class="form-control" style="display:none">
                                <input id="input_posisi_tujuan_lng" type="text" class="form-control" style="display:none">
                                <a role='button' class='btn btn-default text-center' onclick='posisi_manual_2();' id='btnik' style="width: 100%;">Position End </a>
                               </div>
                               <div id="text_tujuan" class="col-sm-7 col-xs-7" style="font-size:12px;text-align:left">
                                <div class="alert alert-warning" style="display: inline-block;padding: 6px 12px;width:100%"><b>KLIK</b> For setting position end</div>
                               </div>
                             </div>

                             <div class="row" style="margin:5px">
                               <div class="col-sm-12 col-xs-12" id="kanan_rute">
                               </div>
                             </div>
                            <a role='button' class='btn btn-default text-center' style="margin-top:10px" onclick='call_rute_1();' id='btnik'>Process </a>
                            <a role='button' class='btn btn-default text-center' style="margin-top:10px" onclick='reset_rute();' id='btnik'>Reset </a>
                           </div>
                        </div>
                      </div><!-- /col-md-12 -->

                <!-- DATA CHECKBOX REKOM -->
                <div id="view_kanan_rekom" class="col-md-4 col-sm-4 mb" style="display: none;">
                  <div class="white-panel pns" style="color:black;">
                     <div class="white-header" style="height:40px;margin:20px;background:white;color:white">
                       <h5 class="btn btn-compose" id="judul_table">Hotel Recommendations</h5>
                     </div>
                     <div class="row">
                       <div class="col-sm-6 col-xs-6"></div>
                     </div>
                     <div style="height:460px; overflow-y: scroll;">
                      <h6>*Rekomendasi Berdasarkan Objek Wisata</h6>
                      <div id="hotel_rekom" style="text-align:left;margin:10px;"></div>
                      <a role="button" class="btn btn-default text-center" style="margin-top:10px" onclick="rekom_hotel();" id="btnik">Tampilkan </a>
                      </table>
                     </div>
                  </div>
                </div><!-- /col-md-12 -->


              </div><!-- /row -->


      <!-- **********************************************************************************************************************************************************
      FULL CONTENT
      *********************************************************************************************************************************************************** -->


          </section>
      </section>


  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>

    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>
  	<script src="assets/js/zabuto_calendar.js"></script>

<script>
var slideIndex = 1;
//showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-white";
}

var id_cek = 0;
function r(){
   // console.log('Coti ya');
   $('.fa-info').click(function(){
    // console.log('hy, atashi no namae wa Coti desu');
    $("#star2-1,#star2-2,#star2-3,#star2-4,#star2-5").removeClass('star-checked');
  });
}
</script>

  </body>
</html>
