
<?php
session_start();
    $username = $_SESSION['username'];

 ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>About</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css"> -->
    <link rel="stylesheet" type="text/css" href="assets/css/slider.css">
    <link href="admin/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />



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
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANIx4N48kL_YEfp-fVeWmJ_3MSItIP8eI"></script>


    <style type="text/css">

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
  <body>
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
    <!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
    <?php
      include 'menus.php';
    ?>
    <!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <br><br>
    <section id="container">
      <section id="main-content">
        <section id="wrapper">
          <section id="panel">
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12 main-chart">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="col-sm-8">
                        <div class="white-panel pns">
                          <p>Narasi</p>
                        </div>
                      </div>

                      <div class="col-sm-4">

                        <!-- gallery hotel padang -->

                          <div class="row" style="font-family: arial;"  id="galleryrecommendxxx">

                   <div class="white-panel pns" style="height: auto; width: auto; padding-bottom: 10px" >
                     <header class="panel-heading" style=" width: 100%;">
                       <!-- <h4 style="color: #26a69a;"><b>Recommendation</b></h4>
                       <hr> -->
                     </header>
                     <?php
                        require '../connect.php';
                        //HOTEL
                        $gallery_hot = "SELECT * from hotel left join hotel_gallery on hotel.id= hotel_gallery.id where hotel_gallery.serial_number='1'";
                        $result3 = mysqli_query($conn, $gallery_hot);
                      ?>


                     <div style="height: 330px;">
                     <!-- <br>  -->
                     <!-- HOTEL -->
                     <div style="margin: 10px;" id="hotelxxx">
                       <h4 style="color: black"> Gallery Hotel Padang</h4>
                       <hr>
                       <div id="myCarousel3" class="carousel slide" data-ride="carousel" style="margin: 5px;  border-color: grey">
                         <!-- Indicators -->
                         <ol class="carousel-indicators" style="bottom: 5px; font-size: 5px" hidden>
                           <?php
                           include '../connect.php';
					                      $query = mysqli_query($conn, "SELECT COUNT(hotel.name) as j from hotel left join hotel_gallery on hotel.id= hotel_gallery.id where hotel_gallery.serial_number='1'") ;
					                      $data = mysqli_fetch_array($query);
                                $jm=$data['j'];
					                      for($i=0; $i<=$jm;$i++){
						                      echo '<li data-target="#myCarousel3" data-slide-to="'.$i.'"'; if($i==0){ echo 'class="active"'; } echo '></li>';
					                      }
		                        ?>
                         </ol>

                         <!-- Wrapper for slides -->
                         <div class="carousel-inner">
                           <div class="item active">
                             <img src="../_foto/we_hot.jpeg" style="width:100%;">
                             <div class="carousel-caption" style="bottom: 10px; ">
                               <font style="font-size: 25px; text-align: center"><b> Padang</b></font>
                             </div>
                           </div>
                           <?php
                             while ($rows = mysqli_fetch_array($result3))
                             {
                               $id_hot = $rows['id'];
                               $gambar_hot = $rows['gallery_hotel'];
                               $name_hot = $rows['name'];

                               ?>
                               <div class="item" style="background-color: #efefef; padding: 10px">
                                 <a href="" onclick="galleryreco('<?php echo $id_hot ?>')"><img src="../_foto/<?php echo $gambar_hot ?>" style="width:100%;"> </a>
                                 <div class="carousel-caption" style="bottom: 10px" onclick="galleryreco('<?php echo $id_hot ?>')">
                                   <a style="color: white" ><b><?php echo $name_hot ?></b></a><br>

                                   <!-- <p>LA is always so much fun!</p> -->
                                 </div>
                               </div>
                               <?php
                             }
                           ?>
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

               <!-- end of gallery -->

                      </div>
                    </div>
                  </div>
                </div>
              </div>


<!-- table list hotel -->
              <div class="row">
                <div class="col-lg-12 main-chart">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="col-sm-12">
                        <div class="white-panel pns">

                          <div class="panel-body">
                            <header class="panel-header">
                              <h4 style="color: black;"><b>List Hotel in Padang</b></h4><a data-toggle='collapse' href='#info' onclick='' title='See More' aria-controls='Nearby'><i class="fa fa-caret-down"></i></a>
                            </header><hr>
                            <div class="collapse" id='info'>
                              <div class="box-body" style="height:410px; margin:20px;">
                                <div class="form-group">
                                  <table id="example2" class="table table-hover table-bordered table-striped">
                                    <thead class="w3-teal">
                                      <tr>
                                        <th style="text-align: center; width: 5%;">No</th>
                                        <th style="text-align: center; width: 20%;">Name</th>
                                        <th style="text-align: center; width: 50%;">address</th>
                                        <th style="text-align: center; width: 20%;">Type</th>
                                        <th style="text-align: center; width: 5%;"><i class="icon-printer" style="color: white;"></i></th>
                                      </tr>
                                    </thead>

                                    <tbody>
                                      <?php
                                      include '../connect.php';
                                      $no=0;
                                      $query = mysqli_query($conn, "SELECT *,hotel.name as name,hotel.id as idh ,hotel_type.name as type from hotel join hotel_type on hotel.id_type=hotel_type.id where hotel.id like 'HT0%' order by hotel_type.name asc");

                                      while ($data = mysqli_fetch_array($query)) {
                                        $no++;
                                        $id = $data['idh'];
                                        $name = $data['name'];
                                        $address= $data['address'];
                                        $type = $data['type'];
                                       ?>
                                      <tr>
                                        <td style="color:black;"><?php  echo "$no" ;?></td>
                                        <td style="color:black;"><?php  echo "$name"; ?></td>
                                        <td style="color:black;"><?php  echo "$address";?></td>
                                        <td style="color:black;"><?php  echo "$type"; ?></td>
                                        <td style="color:black;"> <a href="hotel_print.php?id=<?php echo $id; ?>" target="_blank"><i class="icon-printer" style="color: teal;"></i></a> </td>

                                      </tr>
                                      <?php } ?>
                                    </tbody>

                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
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
    <script src="admin/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="admin/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
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


    $(function () {
      $('#example1, #example2, #example3').dataTable({
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false,
    "iDisplayLength": 10,
    "oLanguage": {
  	 "sInfo": "Showing _START_ to _END_ of _TOTAL_ entries",
  	 "sLengthMenu": "Show _MENU_ entries",
  	 "sSearch": "Search:"
  	}
      });
    });
    </script>
  </body>




</html>
