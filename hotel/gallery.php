<?php
session_start();
include ('../connect.php');
$a = $_GET["idgallery"];
    $username = $_SESSION['username'];
    $id_city  = $_SESSION['id'];
    $city     = $_SESSION['name'];
// echo $a;
$s = "SELECT name, cp from hotel where id = '$a'";
$query = mysqli_query($conn, $s);
while($data = mysqli_fetch_array($query)) {
  $name = $data['name'];
  $cp = $data['cp'];
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <title><?php echo "$name"; ?></title>

    <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="assets/font-awesome/css/fontawesome.css" rel="stylesheet" />
    <link href="assets/css/icomoon/styles.css" rel="stylesheet" />
  <link href="assets/js/fancybox/jquery.fancybox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
    <script type="text/javascript" src="html5gallery/html5gallery.js"></script>
    <!-- <script type="text/javascript" src="html5gallery/jquery.js"></script> -->
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
   <!--  Slide -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <script src="assets/js/chart-master/Chart.js"></script>

  <script src="../config_public.js"></script>
    <script src="_map.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgpfxdQ0Ep_nieNjV64u4yXWeSFHAT4BE"></script>

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

    .rating {
    display: inline-block;
    position: relative;
    height: 50px;
    line-height: 50px;
    font-size: 50px;
  }

  .rating label {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    cursor: pointer;
  }

  .rating label:last-child {
    position: static;
  }

  .rating label:nth-child(1) {
    z-index: 5;
  }

  .rating label:nth-child(2) {
    z-index: 4;
  }

  .rating label:nth-child(3) {
    z-index: 3;
  }

  .rating label:nth-child(4) {
    z-index: 2;
  }

  .rating label:nth-child(5) {
    z-index: 1;
  }

  .rating label input {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
  }

  .rating label .icon {
    float: left;
    color: transparent;
  }

  .rating label:last-child .icon {
    color: #000;
  }

  .rating:not(:hover) label input:checked ~ .icon,
  .rating:hover label:hover input ~ .icon {
    color: #09f;
  }

  .rating label input:focus:not(:checked) ~ .icon:last-child {
    color: #000;
    text-shadow: 0 0 5px #09f;
  }

    </style>

  </head>

  <body onload="init();data_hotel_1_info('<?php echo $_GET["idgallery"] ?>');">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-180188427-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-180188427-1');
    </script>

   <section id="container" >
      <header class="header black-bg">
        <div class="sidebar-toggle-box">
          <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation" style="color: white;"></div>
          <input type="hidden" id="cityName" value='<?php echo $id_city; ?>'>
        </div>
            <!--logo start-->
        <a href="index.php" class="logo" style="font-family: arial;"><b>WEBGIS</b> • Detail Hotel</a>
        <div class="top-menu">
          <ul class="nav pull-right top-menu">
            <li><div id="loader" style="display:none"></div></li>
            <li id="loader_text" style="margin-top:13px;display:none"><b>Loading</b></li>
          </ul>
        </div>
      </header>

      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">

                  <!--p class="centered"><a href="profile.html"><img src="assets/img/masjid.png" class="img-circle" width="90"></a></p-->

                  <li class="sub-menu">
                      <a href="index.php">
                          <i class="fa fa-arrow-left"></i>
                          <span>Back To Home</span>
                      </a>
                  </li>

              </ul>
          </div>
      </aside>

      <section id="main-content">
        <section class="wrapper site-min-height">
          <div class="row">
            <div class="col-lg-12 main-chart">
             <div class="col-sm-12">
                <div class="col-sm-6"> <!-- information -->
                    <section class="panel">

                      <div class="panel-body">
                        <header>
                          <h2 class="box-title" style="text-align: center;"><b>Hotel Information</b></h2>
                        </header>
                        <div class="text-center">
                          <?php
                              //MENGITUNG RATA-RATA RATING OBJEK WISATA
                              require '../connect.php';
                              $id = $_GET["idgallery"];

                              $querysearch ="SELECT id_hotel AS id, count(*) as review, AVG(rating) AS rating FROM review where id_hotel='$id'";

                              $result=mysqli_query($conn, $querysearch);

                              while($row = mysqli_fetch_array($result))
                              {
                                $id_hotel=$row['id'];
                                $rating=$row['rating'];
                                $review=$row['review'];

                                $dataarray[]=array('id'=>$id_hotel, 'rating'=>$rating,'review'=>$review);
                              }
                              // echo json_encode ($dataarray);
                              // echo $rating;
                              ?>
                              <div id='star-containerz' style="font-size: 16px">
                                <?php
                                  if ($rating == 5 || $rating == 4 || $rating == 3 || $rating == 2 || $rating == 1) {
                                    echo $rating.'.0 &nbsp';
                                  }else{
                                    echo substr($rating, 0,3).'&nbsp';
                                  }

                                 ?>
                                <i class="fa fa-star star2 <?php echo $rating >= 1 ? "star-checked" : ""; ?>"></i>
                                <i class="fa fa-star star2 <?php echo $rating >= 2 ? "star-checked" : ""; ?>"></i>
                                <i class="fa fa-star star2 <?php echo $rating >= 3 ? "star-checked" : ""; ?>"></i>
                                <i class="fa fa-star star2 <?php echo $rating >= 4 ? "star-checked" : ""; ?>"></i>
                                <i class="fa fa-star star2 <?php echo $rating == 5 ? "star-checked" : ""; ?>"></i>
                              </div>
                  </div>

                        <!-- <div class="collapse" id="hotel"> -->
                           <br><table id="table_tengah_info" class="w3-table" style="width: 100%">
                            <tbody  style='vertical-align:top;'>
                            </tbody>
                          </table>
                          <br>
                          <b>Rooms:</b>
                          <br><table id="table_tengah_kamar" class="table table-hover table-bordered table-striped" style="width: 75%;">
                            <thead class="w3-teal">
                              <th>Rooms</th>
                              <th>Price</th>
                              <th>Available</th>
                            </thead>
                           <tbody  style='vertical-align:top;'>
                           </tbody>
                         </table>
                         <br>
                         <b>Facilities:</b>
                         <br>
                         <div id="table_tengah_fas"></div>
                         <br>

                         <div>
                           <td><button><a href=""  data-toggle="modal" data-target="#book<?php echo $_GET["idgallery"] ?>" data-toggle="tooltip" title="Book a room"><i class="fa fa-suitcase"></i> Reservation</a></button></td>
                         </div>
                        <!-- </div> -->
                      </div>
                    </section>


                    <section class="panel">
                      <div class="panel-body">
                        <div class="btn-group">
                          <table>
                            <thead>
                              <tr>
                                <td width="450px"><h3 class="box-title" style="text-transform:capitalize;"><b> More Information</b></h3></td>
                                <td><a data-toggle='collapse' href='#info' onclick='' title='See More' aria-controls='Nearby'><i class="fa fa-caret-down"></i></a></td>
                              </tr>
                            </thead>
                          </table>
                          <td><a style="background-color: lightgreen;"><a href=" https://api.whatsapp.com/send?phone=<?php echo $cp; ?>"  title='Contact Via Whatsapp' target="_blank"><img src="https://wa.widget.web.id/assets/img/tombol-wa.png"></a></td>

                        </div> <br>
                        <div class='collapse' id='info'>
                          <?php
                           require '../connect.php';
                            $id = $_GET["idgallery"];
                           // echo "ini $id";

                            if(strpos($id,"H") !== false){
                              $sqlreview = "SELECT * from information_admin where id_hotel = '$id'";
                            }elseif (strpos($id,"RM") !== false) {
                              $sqlreview = "SELECT * from information_admin where id_kuliner = '$id'";
                            }elseif (strpos($id, "SO") !== false) {
                              $sqlreview = "SELECT * from information_admin where id_souvenir = '$id'";
                            }elseif (strpos($id,"IK") !== false) {
                               $sqlreview = "SELECT * from information_admin where id_ik = '$id'";
                            }elseif (strpos($id,"tw")!== false) {
                               $sqlreview = "SELECT * from information_admin where id_ow = '$id'";
                            }

                            $result = mysqli_query($conn, $sqlreview);
                          ?>
                          <table class="table" style="overflow: auto;">
                            <thead><tr><th>Tanggal</th><th>Info</th></tr></thead>
                          <?php
                            while ($rows = mysqli_fetch_array($result))
                              {
                                $tgl = $rows['tanggal'];
                                $info = $rows['informasi'];
                                $id_info =$rows['id_informasi'];
                                echo "<tbody><tr><td>$tgl</td><td>$info</td></tr></tbody>";
                              }
                             ?>
                          </table>
                         </div>
                      </div>
                    </section>



                    <!-- menampilkan gallery -->
                </div>
                <div class="col-sm-6">
                  <div class="row">
                    <div class="col-sm-12"> <!-- gallery -->
                      <section class="panel">
                          <div class="panel-body">
                            <header>
                              <h2 class="box-title" style="text-transformation: capitalize; text-align: center;"><b>Gallery</b></h2>
                            </header>

                              <div class="content" style="text-align:center;">
                                <div class="html5gallery" style="max-height:700px; overflow:auto;" data-skin="horizontal" data-width="450" data-height="250" data-resizemode="fit">

                                <?php

                              if (strpos($id,"H") !== false) {  //Hotel

                                $querysearch  ="SELECT a.id, b.gallery_hotel FROM hotel as a left join hotel_gallery as b on a.id=b.id where a.id='$id' ";
                                $hasil=mysqli_query($conn, $querysearch);
                                while($baris = mysqli_fetch_assoc($hasil)){
                                  if(($baris['gallery_hotel']=='-')||($baris['gallery_hotel']=='')){
                                    echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                  }
                                  else{
                                    echo "<a href='../_foto/".$baris['gallery_hotel']."'><img src='../_foto/".$baris['gallery_hotel']."'></a>";
                                  }
                                }

                              } elseif (strpos($id,"tw") !== false) {  //Tourism

                                $querysearch  ="SELECT a.id, b.gallery_tourism FROM tourism as a left join tourism_gallery as b on a.id=b.id where a.id='$id' ";
                                $hasil=mysqli_query($conn, $querysearch);
                                while($baris = mysqli_fetch_assoc($hasil)){
                                  if(($baris['gallery_tourism']=='-')||($baris['gallery_tourism']=='')){
                                    echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                  }
                                  else{
                                    echo "<a href='../_foto/".$baris['gallery_tourism']."'><img src='../_foto/".$baris['gallery_tourism']."'></a>";
                                  }
                                }

                              } elseif (strpos($id,"SO") !== false) {  //Souvenir

                                $querysearch  ="SELECT a.id, b.gallery_souvenir FROM souvenir as a left join souvenir_gallery as b on a.id=b.id where a.id='$id' ";
                                $hasil=mysqli_query($conn, $querysearch);
                                while($baris = mysqli_fetch_assoc($hasil)){
                                  if(($baris['gallery_souvenir']=='-')||($baris['gallery_souvenir']=='')){
                                    echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                  }
                                  else{
                                    echo "<a href='../_foto/".$baris['gallery_souvenir']."'><img src='../_foto/".$baris['gallery_souvenir']."'></a>";
                                  }
                                }

                              } elseif (strpos($id,"RM") !== false) {  //Kuliner

                                $querysearch  ="SELECT a.id, b.gallery_culinary FROM culinary_place as a left join culinary_gallery as b on a.id=b.id where a.id='$id' ";
                                $hasil=mysqli_query($conn, $querysearch);
                                while($baris = mysqli_fetch_assoc($hasil)){
                                  if(($baris['gallery_culinary']=='-')||($baris['gallery_culinary']=='')){
                                    echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                  }
                                  else{
                                    echo "<a href='../_foto/".$baris['gallery_culinary']."'><img src='../_foto/".$baris['gallery_culinary']."'></a>";
                                  }
                                }

                              } elseif (strpos($id,"M") !== false) {  //Worship

                                $querysearch  ="SELECT a.id, b.gallery_worship_place FROM worship_place as a left join worship_place_gallery as b on a.id=b.id where a.id='$id' ";
                                $hasil=mysqli_query($conn, $querysearch);
                                while($baris = mysqli_fetch_assoc($hasil)){
                                  if(($baris['gallery_worship_place']=='-')||($baris['gallery_worship_place']=='')){
                                    echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                  }
                                  else{
                                    echo "<a href='../_foto/".$baris['gallery_worship_place']."'><img src='../_foto/".$baris['gallery_worship_place']."'></a>";
                                  }
                                }

                              } elseif (strpos($id,"IK") !== false) {  //Industry

                                $querysearch  ="SELECT a.id, b.gallery_industry FROM small_industry as a left join industry_gallery as b on a.id=b.id where a.id='$id' ";
                                $hasil=mysqli_query($conn, $querysearch);
                                while($baris = mysqli_fetch_assoc($hasil)){
                                  if(($baris['gallery_industry']=='-')||($baris['gallery_industry']=='')){
                                    echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                  }
                                  else{
                                    echo "<a href='../_foto/".$baris['gallery_industry']."'><img src='../_foto/".$baris['gallery_industry']."'></a>";
                                  }
                                }

                              } elseif (strpos($id,"R") !== false) {  //Restoran

                                $querysearch  ="SELECT a.id, b.gallery_restaurant FROM restaurant as a left join restaurant_gallery as b on a.id=b.id where a.id='$id' ";
                                $hasil=mysqli_query($conn, $querysearch);
                                while($baris = mysqli_fetch_assoc($hasil)){
                                  if(($baris['gallery_restaurant']=='-')||($baris['gallery_restaurant']=='')){
                                    echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                  }
                                  else{
                                    echo "<a href='../_foto/".$baris['gallery_restaurant']."'><img src='../_foto/".$baris['gallery_restaurant']."'></a>";
                                  }
                                }

                              } else {  //Angkot

                                $querysearch  ="SELECT a.id, b.gallery_angkot FROM angkot as a left join angkot_gallery as b on a.id=b.id where a.id='$id' ";
                                //echo "$querysearch";
                                echo "<script language='javascript'>alert('$querysearch');</script>";
                                $hasil=mysqli_query($conn, $querysearch);
                                while($baris = mysqli_fetch_assoc($hasil)){
                                  if(($baris['gallery_angkot']=='-')||($baris['gallery_angkot']=='')){
                                    echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                  }
                                  else{
                                    echo "<a href='../_foto/".$baris['gallery_angkot']."'><img src='../_foto/".$baris['gallery_angkot']."'></a>";
                                  }
                                }

                              }
                          ?>

                              </div>
                              </div>
                          </div>
                      </section>


                      <!-- menampilkan video -->
                      <div class="col-sm-12">
                        <div class="row">
                          <section class="panel">
                            <div class="panel-body">
                              <div class="btn-group">
                                <button class="btn btn-theme btn-block" style="background:#26a69a;border-color:white; width:375%;" data-toggle='collapse' href='#vid' onclick='' title='Play Video' aria-controls='Nearby'>
                                  <i class="fa fa-play"> PLAY VIDEOS</i>
                                </button>
                              </div> <br><br>
                              <div class='collapse' id='vid'>
                                <div class="html5gallery" data-html5player="true" data-width="480" data-height="272" data-src="" data-webm="" data-title="Big Buck Bunny">
                                  <?php
                                  $querysearch  ="SELECT a.id, b.video FROM hotel as a left join hotel_video as b on a.id=b.id where a.id='$id' ";
                                  $hasil=mysqli_query($conn, $querysearch);
                                  while($baris = mysqli_fetch_assoc($hasil)){
                                    if(($baris['video']=='-')||($baris['video']=='')){
                                      echo "<a href='../_video/'></a>";
                                    }
                                    else{
                                      echo "<a href='../_video/".$baris['video']."'><img src='../_video/".$baris['video']."'></a>";
                                    }
                                  }
                                  ?>
                                </div>
                              </div>
                            </div>
                          </section>
                        </div>
                      </div>

                      <!-- RATING & REVIEWS =============================================================================== -->
                <div class="col-sm-12">
                  <div class="row">
                    <section class="panel">
                      <header class="panel-heading">
                        <h2 class="box-title" style="text-transform:capitalize; text-align: center"><b> Rating & Review</b></h2>
                      </header>

                      <div class="panel-body">
                        <?php
                        $idh = $_GET['idgallery'];
                        $cek = mysqli_query($conn, "SELECT * from review where name = '$username' and id_hotel = '$idh'");
                        $ceks = mysqli_fetch_array($cek);
                        if ($ceks == null) { ?>
                          <form method="POST" action="_add_comment.php">
                            <input type="hidden" name="id" value="<?php echo $_GET['idgallery']?>" >
                              <table id="" class="table">
                                <tbody  style='vertical-align:top;'>
                                  <?php
                                    // echo $username;
                                    if ($_SESSION['C'] == true)
                                    {

                                    ?>
                                    <tr>
                                      <td>
                                        <input type="text name='gidr'" id='gidr' value='' hidden=''>
                                          <div id='star-containerz'> Rating :
                                            <i class='fa fa-star star2' id='star2-1'></i>
                                            <i class='fa fa-star star2' id='star2-2'></i>
                                            <i class='fa fa-star star2' id='star2-3'></i>
                                            <i class='fa fa-star star2' id='star2-4'></i>
                                            <i class='fa fa-star star2' id='star2-5'></i>
                                          </div>
                                          <input type='text' name='rateid' id='rateid' value='' hidden=''>
                                          <br>
                                          Name :
                                          <br> <input class='form-control' cols='40' rows='1' name='nama' readonly="" required="" value="<?php echo $username = $_SESSION['username'];?>">
                                          <br>
                                          Comment :
                                          <br> <textarea class='form-control' cols='40' rows='5' name='comment' required=""></textarea>
                                          <br>
                                        <input type='submit' name='' class='btn btn-primary pull-right' style=" color: white" value='Post' >
                                      </td>
                                    </tr>

                                    <?php
                                    }
                                  ?>
                                </tbody>
                              </table>
                            </form>
                      <?php  }
                         ?>


                        <?php
                          require '../connect.php';
                          $id = $_GET["idgallery"];

                          if(strpos($id,"HT") !== false){
                            $sqlreview = "SELECT * from review where id_hotel = '$id' ORDER BY tanggal DESC";
                          }elseif (strpos($id,"RM") !== false) {
                            $sqlreview = "SELECT * from review where id_kuliner = '$id' ORDER BY tanggal DESC";
                          }elseif (strpos($id, "SO") !== false) {
                            $sqlreview = "SELECT * from review where id_souvenir = '$id' ORDER BY tanggal DESC";
                          }elseif (strpos($id,"IK") !== false) {
                             $sqlreview = "SELECT * from review where id_ik = '$id' ORDER BY tanggal DESC";
                          }elseif (strpos($id,"TM")!== false) {
                             $sqlreview = "SELECT * from review where id_ow = '$id' ORDER BY tanggal DESC";
                          }
                          $result = mysqli_query($conn, $sqlreview);
                        ?>

                        <?php
                          //echo "username $username, role $role";
                          if($_SESSION['C'] == false)
                          {
                            echo "<h6 style='background-color: white; color: black; text-align: center' href='./admin/login.php'>Please Log In To Review and Rate This Hotel</h6><br>";
                          }
                          else
                          {
                            echo "";
                            //echo "username $username, role $role";
                          }
                        ?>
                        <div style="padding-bottom: 10px">
                          <b>Review :</b>
                        </div>
                        <div style="height: 310px; overflow-y: scroll; ">
                          <table class="table">

                          <?php
                            while ($rows = mysqli_fetch_array($result))
                            {
                              $rating = $rows['rating'];
                              $tanggal = $rows['tanggal'];
                              $nama = $rows['name'];
                              $komen = $rows['comment'];
                              $id_review = $rows['id_review'];
                              ?>
                              <tr>
                                <td>
                                  <div id='star-containerz'>
                                    <i class="fa fa-star star2 <?php echo $rating >= 1 ? "star-checked" : ""; ?>"></i>
                                    <i class="fa fa-star star2 <?php echo $rating >= 2 ? "star-checked" : ""; ?>"></i>
                                    <i class="fa fa-star star2 <?php echo $rating >= 3 ? "star-checked" : ""; ?>"></i>
                                    <i class="fa fa-star star2 <?php echo $rating >= 4 ? "star-checked" : ""; ?>"></i>
                                    <i class="fa fa-star star2 <?php echo $rating == 5 ? "star-checked" : ""; ?>"></i> &nbsp;
                                    <?php
                                    if ($nama == $username) { ?>
                                      <a href=""  data-toggle="modal" data-target="#reviewc<?php echo $id_review ?>" data-toggle="tooltip" title="Give review"><i class='fa fa-pencil'></i></a>
                                  <?php  }else{

                                  } ?>
                                  </div>

                                  <?php
                                    echo "$tanggal by <b>$nama</b> <br>
                                    $komen <br>" ?>
                                </td>
                              </tr>
                              <?php
                              }
                            ?>

                            </table>
                            <!-- modal update review-->
                            <div class="modal fade" id="reviewc<?php echo $id_review ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <table>
                                      <thead>
                                        <tr>
                                          <td style="width: 550px;"><h5 class="modal-title" id="exampleModalLabel">Update Your Rating and Review</h5></td>
                                          <td><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></td>
                                        </tr>
                                      </thead>
                                    </table>
                                  </div>
                                  <div class="modal-body">
                                    <?php
                                    $idhotel=$_GET['idgallery'];
                                    ?>
                                    <form role="form" name="formAdd" method="get" action="_update_comment.php" >
                                      <div class="form-group mb-3">
                                        <input type="hidden" name="id" value="<?php echo $idhotel ?>" >
                                        <input type="hidden" name="id_review" value="<?php echo $id_review?>" >
                                      </div>
                                      <div>
                                        <label> Rating </label>
                                          <input type="text name='gidr'" id='gidr' value='' hidden=''>
                                            <div id='star-containerz'>
                                              <i class='fa fa-star star2 <?php echo $rating >= 1 ? 'star-checked' : ''; ?>' id='star2-1'></i>
                                              <i class='fa fa-star star2 <?php echo $rating >= 2 ? 'star-checked' : ''; ?>' id='star2-2'></i>
                                              <i class='fa fa-star star2 <?php echo $rating >= 3 ? 'star-checked' : ''; ?>' id='star2-3'></i>
                                              <i class='fa fa-star star2 <?php echo $rating >= 4 ? 'star-checked' : ''; ?>' id='star2-4'></i>
                                              <i class='fa fa-star star2 <?php echo $rating == 5 ? 'star-checked' : ''; ?>' id='star2-5'></i>
                                            </div>
                                            <input type='text' name='rateids' id='rateids' value='' hidden=''>
                                            <br>
                                        </div>
                                      <div class="form-group mb-3">
                                        <label>Name</label>
                                          <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $_SESSION['username']; ?>" readonly="">
                                      </div>

                                      <div class="form-group mb-3">
                                        <label>Review</label>
                                        <input type="textarea" cols='30' rows='5' name='comment' class="form-control" value="<?php echo $komen; ?>">
                                      </div>

                                      <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <button class="btn btn-primary" type="submit" id="update"><i class="fa fa-pencil"></i> Post</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                      <tr colspan></tr>
                    </section>
                  </div>
                </div>
              </div>

                    <div class="col-sm-12"> <!-- peta -->
                      <div class="white-panel pns">

                                <header class="panel-heading" style="float:left">
                                  <label style="color: black; margin-right:20px">Google Map with Location List</label>
                                  <a class="btn btn-default" role="button" data-toggle="collapse" onclick="lokasimanual()" title=" Manual Position" style="background-color: teal;"><i class="fa fa-location-arrow" style="color:white;"></i></a>
                                  <a class="btn btn-default" role="button" data-toggle="collapse" onclick="posisisekarang()" title="Current Position" style="margin-right:10px; background-color:teal;"   ><i class="fa fa-map-marker" style="color:white;"></i></a>
                                </header>
                                <div class="row">
                                   <div class="col-sm-6 col-xs-6"></div>
                                 </div>
                                 <div id="map" class="centered" style="height:260px">
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



      <!-- <footer class="site-footer">
          <div class="text-center">
              1511521015 - Rizka Aulia
              <!-- <a href="gallery.php?idgallery=$id" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a> -->
          </div>
      </footer> -->
  </section>





  <!-- modal booking customer-->
  <div class="modal fade" id="book<?php echo $_GET["idgallery"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <table>
            <thead>
              <tr>
                <td style="width: 550px;"><h5 class="modal-title" id="exampleModalLabel">Make A Reservation</h5></td>
                <td><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></td>
              </tr>
            </thead>
          </table>
        </div>
        <div class="modal-body">

          <?php
          $username = $_SESSION['username'];
          if ($_SESSION['C']==true) { ?>
            <form role="form" name="formAdd" method="post" action="_booking.php" >
              <div class="form-group mb-3">
                <input type="hidden" name="id" value="<?php echo $_GET['idgallery'];?>" >
              </div>

              <div class="form-group mb-3">
                <label>Your Name</label>
                  <input type="text" class="form-control" name="nama" value="<?php echo $username; ?>" disabled>
              </div>

              <div class="form-group mb-3">
                <label>Select Room</label>
                <select  name="room"  id="room" class="form-control">
            <option value='0'></option>
                    <?php
                    $idhotel = $_GET['idgallery'];
                    $room=mysqli_query($conn, "SELECT * from detail_room where detail_room.id_hotel='$idhotel'");
                    while($rm = mysqli_fetch_assoc($room))
                    {
                    echo"<option value=".$rm['id_room'].">".$rm['name']."</option>";
                    }
                    ?>
                </select>
              </div>

              <div class="form-group mb-3">
                <label>Rooms</label>
                  <input type="number" class="form-control" id="jumlah" name="jumlah" value="">
              </div>

              <div class="form-group mb-3">
                <label>Check in</label>
                  <input type="date" class="form-control" id="datein" name="datein" value="">
              </div>

              <div class="form-group mb-3">
                <label>Check out</label>
                  <input type="date" class="form-control" id="dateout" name="dateout" value="">
              </div>

              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" type="submit"><i class="fa fa-suitcase"></i> Book</button>
              </div>
            </form>
        <?php  } else{ ?>
          <span>You need to log in to reserve a room!</span>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/fancybox/jquery.fancybox.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>
    <script src="_map.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>

    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>
    <!-- <script src="assets/js/advanced-form-components.js"></script> -->
    <script type="text/javascript">
      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });

    </script>
    <script type="text/javascript">
    $(':radio').change(function() {
      $('#nilai').val(this.value);
      $('#form_rating').submit();
    });

      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });

  </script>
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
<script type="text/javascript">
    var id_cek = 0;
    function r(){
       // console.log('Coti ya');
       $('.fa-info').click(function(){
        // console.log('hy, atashi no namae wa Coti desu');
        $("#star2-1,#star2-2,#star2-3,#star2-4,#star2-5").removeClass('star-checked');
      });
    }
    $('.star').click(function(){

    //get the id of star
    var star_id = $(this).attr('id');
    var star_index = $(this).attr("id").split("-")[1];
    $("#ratecari").val(star_index);
    switch (star_id){
      case "star-1":
        $("#star-1").addClass('star-checked');
        $("#star-2,#star-3,#star-4,#star-5").removeClass('star-checked');
        break;
      case "star-2":
        $("#star-1,#star-2").addClass('star-checked');
        $("#star-3,#star-4,#star-5").removeClass('star-checked');
        break;
      case "star-3":
        $("#star-1,#star-2,#star-3").addClass('star-checked');
        $("#star-4,#star-5").removeClass('star-checked');
        break;
      case "star-4":
        $("#star-1,#star-2,#star-3,#star-4").addClass('star-checked');
        $("#star-5").removeClass('star-checked');
        break;
      case "star-5":
        $("#star-1,#star-2,#star-3,#star-4,#star-5").addClass('star-checked');
        break;
      }
    });

    //memilih rating add review
    $('.star2').click(function(){

      //get the id of star
      var star_id = $(this).attr('id');
      var star_index = $(this).attr("id").split("-")[1];
      $("#rateid").val(star_index);
      switch (star_id){
        case "star2-1":
          $("#star2-1").addClass('star-checked');
          $("#star2-2,#star2-3,#star2-4,#star2-5").removeClass('star-checked');
          break;
        case "star2-2":
          $("#star2-1,#star2-2").addClass('star-checked');
          $("#star2-3,#star2-4,#star2-5").removeClass('star-checked');
          break;
        case "star2-3":
          $("#star2-1,#star2-2,#star2-3").addClass('star-checked');
          $("#star2-4,#star2-5").removeClass('star-checked');
          break;
        case "star2-4":
          $("#star2-1,#star2-2,#star2-3,#star2-4").addClass('star-checked');
          $("#star2-5").removeClass('star-checked');
          break;
        case "star2-5":
          $("#star2-1,#star2-2,#star2-3,#star2-4,#star2-5").addClass('star-checked');
          break;
      }
    });

    //memilih rating add review update
    $('.star2').click(function(){

      //get the id of star
      var star_id = $(this).attr('id');
      var star_index = $(this).attr("id").split("-")[1];
      $("#rateids").val(star_index);
      switch (star_id){
        case "star2-1":
          $("#star2-1").addClass('star-checked');
          $("#star2-2,#star2-3,#star2-4,#star2-5").removeClass('star-checked');
          break;
        case "star2-2":
          $("#star2-1,#star2-2").addClass('star-checked');
          $("#star2-3,#star2-4,#star2-5").removeClass('star-checked');
          break;
        case "star2-3":
          $("#star2-1,#star2-2,#star2-3").addClass('star-checked');
          $("#star2-4,#star2-5").removeClass('star-checked');
          break;
        case "star2-4":
          $("#star2-1,#star2-2,#star2-3,#star2-4").addClass('star-checked');
          $("#star2-5").removeClass('star-checked');
          break;
        case "star2-5":
          $("#star2-1,#star2-2,#star2-3,#star2-4,#star2-5").addClass('star-checked');
          break;
      }
    });
  </script>

  </body>
</html>
