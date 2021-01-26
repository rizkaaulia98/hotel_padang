<?
session_start();
include ('../../connect.php');
//session_start();
$id = $_GET["id"];
$id_hotel = $_SESSION['id'];
$username = $_SESSION['username'];
$city     = $_SESSION['name'];

$query = "SELECT hotel.id, hotel.name, hotel.address, hotel.cp, hotel.ktp, hotel.marriage_book, hotel.mushalla, hotel_type.name as type_hotel, st_x(st_centroid(hotel.geom)) as lon,st_y(st_centroid(hotel.geom)) as lat, admin.username, admin.name as nama_admin
from hotel left join hotel_type on hotel_type.id=hotel.id_type left join admin on admin.username = hotel.username where hotel.username='$username'";
$hasil=mysqli_query($conn, $query);
$data = mysqli_fetch_array($hasil);
  $id = $data['id'];
  $nama = $data['name'];
  $id_hotel=$data['id_hotel'];

?>
<ul class="sidebar-menu" id="nav-accordion">
  <p class="centered"><a href="profile.html"><img src="../../_foto/2.jpeg" class="img-circle" width="60"></a></p>
  <?php
  include ('../../connect.php');

  $uname = $_SESSION['username'];
  $sql = "SELECT * from admin where username = '$uname'";
  $query = mysqli_query($conn, $sql);
  $rst = mysqli_fetch_array($query);
  $nama_hotel = $rst['name'];
  ?>
  <h5 class="centered"><p><?php echo $nama_hotel; ?></p></h5>

  <li class="mt">
      <a href="../">
        <i class="fa fa-sitemap"></i>
          <span>User Access</span>
      </a>
  </li>
  <li class="sub-menu">
      <a href="?page=hotel_owner&id=<?php echo $id ?>">
          <i class="fa fa-building-o"></i>
          <span>List Hotel</span>
      </a>
  </li>
  <li class="sub-menu">
      <a href="?page=feedback&id=<?php echo $id ?>">
          <i class="fa fa-pencil"></i>
          <span>Feedback</span>
      </a>
  </li>

  <li class="sub-menu">
      <a href="?page=transaction&id=<?php echo $id ?>">
          <i class="fa fa-credit-card"></i>
          <span>Booking Transaction</span>
      </a>
  </li>

  <li class="sub-menu">
      <a href="?page=pass_change">
          <i class="fa fa-cog"></i>
          <span>Change Password</span>
      </a>
  </li>
  <li class="sub-menu">
                      <a class="active" href="../../">
                          <i class="fa fa-chevron-circle-left"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

</ul>
