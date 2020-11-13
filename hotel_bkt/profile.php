<?php
session_start();
    $username = $_SESSION['username'];
    include('../connect.php');
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website untuk pengembangan wisata Bukittinggi">
    <meta name="author" content="Rizka">
    <meta name="keyword" content="Hotel, SI Unand, Unand, Wisata">

    <title>Profile Page</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!--  Slide -->
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
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE"></script>


<style type="text/css">
      #legend {
        background: white;
        padding: 10px;
        margin: 5px;
        font-size: 12px;
        font-color: black;
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
        background: #f58d6f;
      }
    .b {
        background: #f58d6f;
      }
      .c {
        background: #fce8b7;
      }
    .d {
        background: #00b300;
      }
    .e {
        background: #42cb6f;
      }
    .f {
        background: #5c9ded;
      }
    .g {
        background: #373435;
      }
    .h {
        background: #d51e5a;
      }
    .i {
        background: #9398ec;
      }
    .j {
        background: #f9695d;
      }
    .k {
        background: #ec87bf;
      }
    .l {
        background: navy;
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
  <aside>
      <div id="sidebar"  class="nav-collapse ">
          <ul class="sidebar-menu" id="nav-accordion">

              <!--p class="centered"><a href="profile.html"><img src="assets/img/masjid.png" class="img-circle" width="90"></a></p-->
              <p class="centered"><a href="profile.php"><img src="icon/user.jpg" class="img-circle" width="60"></a></p>
              <h5 class="centered">Welcome, <?php echo $_SESSION['username'] ?>!</h5>

              <li class="sub-menu">
                  <a href="index.php">
                      <i class="fa fa-arrow-left"></i>
                      <span>Back To Home</span>
                  </a>
              </li>

          </ul>
      </div>
  </aside>

  <body>
  <section id="container" >

      <!-- Modal -->
      <div class="modal fade" id="modal_gallery" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="background:#ffd777">
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
            <div class="modal-header" style="background:#ffd777">
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
        </div>
        <!--logo start-->
        <a href="index.php" class="logo" style="font-family: arial;"><b>WEBGIS</b> • Padang Hotel</a>
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


      <!--main content start-->
      <section id="main-content">

          <section class="wrapper">

              <div class="row">
                <div class="col-sm-10">

                  <div class="col-sm-8">
                      <section class="panel">
                          <div class="panel-body">
                            <?php
    					                     $username=$_SESSION['username'];
    					                     $sql = mysqli_query($conn, "SELECT stewardship_period, name, role, address, hp, username, password, email FROM admin where username='$username'");
    					                     $data = mysqli_fetch_array($sql);

                  						?>

                            <div class="container">
                                <form class="" action="admin/act/update_user.php" method="POST" role="form" style="color: teal;">
                                  <h2 class="form-login-heading"><i class="fa fa-user"> Profile User</i></h2>
                                  <div class="login-wrap">

                                          <label><i class="fa fa-user-md"> Name: </i><input type="text" name="nama" class="form-control" style="width: 200%" value="<?php echo $data['name']?>"></label><br>
                                          <label><i class="fa fa-envelope-o"> Email: </i><input type="email" name="email" class="form-control" placeholder="E-mail" style="width: 200%" value="<?php echo $data['email']?>"></label><br>
                                          <label><i class="fa fa-phone"> Phone Number: </i><input type="text" class="form-control" name="no_hp" style="width: 200%" value="<?php echo $data['hp']?>"></label>
                                          <br>
                                          <label><i class="fa fa-home"> Address: </i><input type="address" class="form-control" name="alamat" style="width: 200%" value="<?php echo $data['address']?>"></label>
                                          <br>
                                        </i><input type="hidden" class="form-control" name="username" style="width: 200%" value="<?php echo $data['username']?>">
                                      </i><input type="hidden" class="form-control" name="role" style="width: 200%" value="<?php echo $data['role']?>">
                                          <label><i class="fa fa-key"> Password: </i><input type="password" class="form-control" name="password" style="width: 200%" placeholder="Enter Your Password Again"></label>
                                          <br><br>
                                          <button class="btn btn-theme btn-block" name="save" type="submit" style="width: 38%; background:#008080;"><i class="fa fa-save"></i> UPDATE</button>
                                  </div>
                                </form>
                            </div>
                          </div>
                      </section>
                  </div>


                </div><!-- /col-md-12 -->


              </div><!-- /row -->

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
</script>

  </body>
</html>
