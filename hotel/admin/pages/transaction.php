<?php
include '../../connect.php';
$id = $_GET["id"];
$id_hotel = $_SESSION['id'];
$admin=$_SESSION['username'];
$user = $_POST['username'];

$hasil=mysqli_query($conn, "SELECT hotel.id, hotel.name, hotel.address, hotel.cp, hotel.ktp, hotel.marriage_book, hotel.mushalla, hotel_type.name as type_hotel, st_x(st_centroid(hotel.geom)) as lon,st_y(st_centroid(hotel.geom)) as lat from hotel left join hotel_type on hotel_type.id=hotel.id_type where hotel.id='$id'");
while($baris = mysqli_fetch_array($hasil)){
  $id=$baris['id'];
  $name_hotel=$baris['name'];
  $address=$baris['address'];
  $cp=$baris['cp'];
  $ktp=$baris['ktp'];
  $marriage_book=$baris['marriage_book'];
  $mushalla=$baris['mushalla'];
  $hotel_type=$baris['type_hotel'];
  $lng=$baris['lon'];
  $lat=$baris['lat'];
  $cp=$baris['cp'];
  if ($lat=='' || $lng==''){
    $lat='<span style="color:red">Kosong</span>';
    $lng='<span style="color:red">Kosong</span>';
  }
}

	$syarat="-";
	if ($ktp == 1 && $marriage_book == 1) {
	  $syarat = "KTP & Buku Nikah";
	}
	else if ($ktp == 1) {
	  $syarat = "KTP";
	} else if ($marriage_book == 1) {
	  $syarat = "Buku Nikah";
	}

	$mushalla_stat = "-";
	if ($mushalla == 1) {
	  $mushalla_stat = "Ada Mushalla";
	};
?>

<style>
#tabbed_box {
    margin: 0px auto 0px auto;
    width:300px;
}
.tabbed_area {
    border:1px solid #494e52;
    background-color:white;
    padding:8px;
}
ul.tabs {
    margin:0px; padding:0px;
}
ul.tabs li {
    list-style:none;
    display:inline;
}
ul.tabs li a {
    background-color:#464c54;
    color:#ffebb5;
    padding:8px 14px 8px 14px;
    text-decoration:none;
    font-size:9px;
    font-family:Verdana, Arial, Helvetica, sans-serif;
    font-weight:bold;
    text-transform:uppercase;
    border:1px solid #464c54;
}
ul.tabs li a:hover {
    background-color:#2f343a;
    border-color:#2f343a;
}
ul.tabs li a.active {
    background-color:#ffffff;
    color:#282e32;
    border:1px solid #464c54;
    border-bottom: 1px solid #ffffff;
}
.content {
    background-color:#ffffff;
    padding:10px;
    border:1px solid #464c54;
}
#content_2, #content_3 { display:none; }

ul.tabs {
    margin:0px; padding:0px;
    margin-top:5px;
    margin-bottom:6px;
}
.content ul {
    margin:0px;
    padding:0px 20px 0px 20px;
}
.content ul li {
    list-style:none;
    border-bottom:1px solid #d6dde0;
    padding-top:15px;
    padding-bottom:15px;
    font-size:13px;
}
.content ul li a {
    text-decoration:none;
    color:#3e4346;
}
.content ul li a small {
    color:#8b959c;
    font-size:9px;
    text-transform:uppercase;
    font-family:Verdana, Arial, Helvetica, sans-serif;
    position:relative;
    left:4px;
    top:0px;
}
.content ul li:last-child {
    border-bottom:none;
}
ul.tabs li a {
    background-repeat:repeat-x;
    background-position:bottom;
}
ul.tabs li a.active {
    background-repeat:repeat-x;
    background-position:top;
}
.content {
    background-repeat:repeat-x;
    background-position:bottom;
}
</style>


<div class="col-sm-12">
    <section class="panel">
        <div class="panel-body">
          <div class="col-sm-12">
          <div class="w3-container">
            <div class="w3-bar w3-black">
              <button class="w3-bar-item w3-button tablink w3-teal" onclick="openCity(event,'Request')">Request</button>
              <button class="w3-bar-item w3-button tablink " onclick="openCity(event,'Approved')">Approved</button>
              <button class="w3-bar-item w3-button tablink " onclick="openCity(event,'Cancelled')">Cancelled</button>
              <button class="w3-bar-item w3-button tablink " onclick="openCity(event,'Out')">Checked Out</button>
              <button class="w3-bar-item w3-button tablink " onclick="openCity(event,'Declined')">Declined</button>

            </div>
            <!-- tabs -->

            <!-- request -->
            <div id="Request" class="w3-container w3-border book">

                <?php
                    $sql = mysqli_query($conn, "SELECT count(id_room) as count from reservasi where id_hotel = '$id' and status='1'");
                    $data =  mysqli_fetch_array($sql);
                    $count = $data['count'];
                    $jml=number_format($count);

                ?>
                  <h2><i class="fa fa-table"></i>  Booking Requests</h2>
                  <p>Total Request: <?php echo $count; ?></p>
                  </tr><hr>
                    <table id="example3" class="table table-hover table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date of Transaction</th>
                                <th>Customer</th>
                                <th>Room</th>
                                <th>Count</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Room available</th>
                                <th>Total Payment</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                        $no=0;
                            $sql = mysqli_query($conn, "SELECT DATEDIFF(reservasi.dateout, reservasi.datein)as hari, reservasi.id_room, reservasi.id_reservasi, reservasi.username, reservasi.id_hotel, reservasi.tgl,
                              reservasi.jumlah,reservasi.datein, reservasi.dateout, reservasi.status, hotel.name as hotel, detail_room.name
                              as room, detail_room.price, detail_room.available, detail_room.sisa FROM reservasi join hotel on reservasi.id_hotel=hotel.id
                              left join detail_room on reservasi.id_room=detail_room.id_room where reservasi.id_hotel = '$id'
                              and reservasi.status='1' order by reservasi.tgl");
                            while($data =  mysqli_fetch_array($sql)){
                            $tgl = $data['tgl'];
                            $jumlah = $data['jumlah'];
                            $datein = $data['datein'];
                            $dateout = $data['dateout'];
                            $status = $data['status'];
                            $hotel = $data['hotel'];
                            $room = $data['room'];
                            $id_hotel = $data['id_hotel'];
                            $price = $data['price'];
                            $username = $data['username'];
                            $id_reservasi = $data['id_reservasi'];
                            $available = $data['available'];
                            $id_room = $data['id_room'];
                            $sisa = $data['sisa'];
                            $hari= $data['hari'];

                            $total = ($jumlah * $price);
                            $payment = ($total * $hari);
                            $no++;
                        ?>
                            <tr>
                                <td><?php echo "$no"; ?></td>
                                <td><?php echo "$tgl"; ?></td>
                                <td><?php echo "$username"; ?></td>
                                <td><?php echo "$room"; ?></td>
                                <td><?php echo "$jumlah"; ?></td>
                                <td><?php echo "$datein"; ?></td>
                                <td><?php echo "$dateout"; ?></td>
                                <td><?php echo "$sisa"; ?></td>
                                <td><?php echo "$payment"; ?></td>
                                <?php if ($status='1') { ?>
                                  <td style="background-color: yellow;"><?php echo "Requesting"; ?></td>
                              <?php  } ?>

                                <td>
                                    <div class="btn-group">
                                        <a href="?page=decline&id_reservasi=<?php echo $id_reservasi ?>&status=<?php echo $status ?>&id_hotel=<?php echo $id_hotel ?>" type="button"  title='Decline'><i class="fa fa-minus-square" style="color: red;" align="center"></i></a> &nbsp; &nbsp; &nbsp; &nbsp;

                                        <a href="?page=approve&id_reservasi=<?php echo $id_reservasi ?>&status=<?php echo $status ?>&id_hotel=<?php echo $id_hotel ?>&id_room=<?php echo $id_room ?>" type="button"  title='Approve'><i class="fa fa-check" style="color: green;" align="center"></i></a>
                                    </div>

                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            </div>

            <!-- approved -->

            <div id="Approved" class="w3-container w3-border book" style="display:none">
                <?php
                    $sql = mysqli_query($conn, "SELECT count(id_room) as count from reservasi where id_hotel = '$id' and status='2'");
                    $data =  mysqli_fetch_array($sql);
                    $count = $data['count'];
                    $jml=number_format($count);

                ?>
                <h2 class="box-title"><i class="fa fa-check-circle"></i>  Booking Approved</h2>
                <p>Total Request Approved: <?php echo $jml; ?></p><hr>

                    <table id="example3" class="table table-hover table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Customer</th>
                                <th>Room</th>
                                <th>Count</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Total Payment</th>
                                <th>Status</th>
                                <th>Checkout</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                        $no=0;
                            $sql = mysqli_query($conn, "SELECT DATEDIFF(reservasi.dateout, reservasi.datein)as hari, reservasi.datein, reservasi.dateout, reservasi.username, reservasi.id_hotel, reservasi.tgl, reservasi.jumlah, reservasi.status, reservasi.id_reservasi,
                              hotel.name as hotel, detail_room.name as room, detail_room.price, detail_room.available, detail_room.sisa FROM reservasi join hotel on reservasi.id_hotel=hotel.id
                              left join detail_room on reservasi.id_room=detail_room.id_room where reservasi.id_hotel = '$id' and reservasi.status='2' order by reservasi.tgl");
                            while($data =  mysqli_fetch_array($sql)){
                            $tgl = $data['tgl'];
                            $jumlah = $data['jumlah'];
                            $datein = $data['datein'];
                            $dateout = $data['dateout'];
                            $status = $data['status'];
                            $hotel = $data['hotel'];
                            $room = $data['room'];
                            $id_hotel = $data['id_hotel'];
                            $price = $data['price'];
                            $username = $data['username'];
                            $id_reservasi = $data['id_reservasi'];
                            $available = $data['available'];
                            $sisa = $data['sisa'];
                            $hari = $data['hari'];
                            $total = ($jumlah * $price);
                            $payment = ($hari * $total);

                            $no++;
                        ?>
                            <tr>
                                <td><?php echo "$no"; ?></td>
                                <!-- <td><?php echo "$tgl"; ?></td> -->
                                <td><?php echo "$username"; ?></td>
                                <td><?php echo "$room"; ?></td>
                                <td><?php echo "$jumlah"; ?></td>
                                <td><?php echo "$datein"; ?></td>
                                <td><?php echo "$dateout"; ?></td>
                                <td><?php echo "$payment"; ?></td>
                                <?php if ($status='2') { ?>
                                  <td style="background-color: lightgreen;"><?php echo "Approved"; ?></td>
                              <?php  } ?>
                              <td>
                                <div class="btn-group">
                                    <a href="?page=checkout&id_reservasi=<?php echo $id_reservasi ?>&status=<?php echo $status ?>&id_hotel=<?php echo $id_hotel ?>" type="button"  title='Check out'><i class="icon-esc" style="color: red;" align="center"></i></a>
                                </div>
                              </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            </div>

<!-- Cancelled -->
            <div id="Cancelled" class="w3-container w3-border book" style="display:none">
                <?php
                    $sql = mysqli_query($conn, "SELECT count(id_room) as count from reservasi where id_hotel = '$id' and status='4'");
                    $data =  mysqli_fetch_array($sql);
                    $count = $data['count'];
                    $jml=number_format($count);

                ?>
                <h2 class="box-title"><i class="fa fa-exclamation"></i>  Booking Cancelled</h2>
                <p>Total Request Cancelled by Customer: <?php echo $jml; ?></h4></p><hr>

                    <table id="example3" class="table table-hover table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date of Transaction</th>
                                <th>Customer</th>
                                <th>Room</th>
                                <th>Count</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Total Payment</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                        $no=0;
                            $sql = mysqli_query($conn, "SELECT DATEDIFF(reservasi.dateout, reservasi.datein)as hari, reservasi.username, reservasi.id_hotel, reservasi.tgl, reservasi.jumlah, reservasi.datein,
                              reservasi.dateout, reservasi.status, hotel.name as hotel, detail_room.name as room, detail_room.price
                              FROM reservasi join hotel on reservasi.id_hotel=hotel.id
                              join detail_room on reservasi.id_room=detail_room.id_room where reservasi.id_hotel = '$id'
                              and reservasi.status='4'");
                            while($data =  mysqli_fetch_array($sql)){
                            $tgl = $data['tgl'];
                            $jumlah = $data['jumlah'];
                            $datein = $data['datein'];
                            $dateout = $data['dateout'];
                            $status = $data['status'];
                            $hotel = $data['hotel'];
                            $room = $data['room'];
                            $id_hotel = $data['id_hotel'];
                            $price = $data['price'];
                            $username = $data['username'];
                            $hari = $data['hari'];

                            $total = ($jumlah * $price);
                            $payment = ($total*$hari);
                            $no++;
                        ?>
                            <tr>
                                <td><?php echo "$no"; ?></td>
                                <td><?php echo "$tgl"; ?></td>
                                <td><?php echo "$username"; ?></td>
                                <td><?php echo "$room"; ?></td>
                                <td><?php echo "$jumlah"; ?></td>
                                <td><?php echo "$datein"; ?></td>
                                <td><?php echo "$dateout"; ?></td>
                                <td><?php echo "$payment"; ?></td>
                                <?php if ($status='4') { ?>
                                  <td style="background-color: red;"><?php echo "Cancelled"; ?></td>
                              <?php  } ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            </div>

            <!-- Cancelled -->
                        <div id="Out" class="w3-container w3-border book" style="display:none">
                            <?php
                                $sql = mysqli_query($conn, "SELECT count(id_room) as count from reservasi where id_hotel = '$id' and status='5'");
                                $data =  mysqli_fetch_array($sql);
                                $count = $data['count'];
                                $jml=number_format($count);

                            ?>
                            <h2 class="box-title"><i class="fa fa-logout"></i>  Checked Out</h2>
                            <p>Total Customer: <?php echo $jml; ?></h4></p><hr>

                                <table id="example3" class="table table-hover table-bordered table-striped" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Date of Transaction</th>
                                            <th>Customer</th>
                                            <th>Room</th>
                                            <th>Count</th>
                                            <th>Check In</th>
                                            <th>Check Out</th>
                                            <th>Total Payment</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $no=0;
                                        $sql = mysqli_query($conn, "SELECT DATEDIFF(reservasi.dateout, reservasi.datein)as hari, reservasi.username, reservasi.id_hotel, reservasi.tgl, reservasi.jumlah, reservasi.datein,
                                          reservasi.dateout, reservasi.status, hotel.name as hotel, detail_room.name as room, detail_room.price
                                          FROM reservasi join hotel on reservasi.id_hotel=hotel.id
                                          join detail_room on reservasi.id_room=detail_room.id_room where reservasi.id_hotel = '$id'
                                          and reservasi.status='5'");
                                        while($data =  mysqli_fetch_array($sql)){
                                        $tgl = $data['tgl'];
                                        $jumlah = $data['jumlah'];
                                        $datein = $data['datein'];
                                        $dateout = $data['dateout'];
                                        $status = $data['status'];
                                        $hotel = $data['hotel'];
                                        $room = $data['room'];
                                        $id_hotel = $data['id_hotel'];
                                        $price = $data['price'];
                                        $username = $data['username'];
                                        $hari = $data['hari'];

                                        $total = ($jumlah * $price);
                                        $payment = ($total*$hari);
                                        $no++;
                                    ?>
                                        <tr>
                                            <td><?php echo "$no"; ?></td>
                                            <td><?php echo "$tgl"; ?></td>
                                            <td><?php echo "$username"; ?></td>
                                            <td><?php echo "$room"; ?></td>
                                            <td><?php echo "$jumlah"; ?></td>
                                            <td><?php echo "$datein"; ?></td>
                                            <td><?php echo "$dateout"; ?></td>
                                            <td><?php echo "$payment"; ?></td>
                                            <?php if ($status='5') { ?>
                                              <td style="background-color: red;"><?php echo "Checked Out"; ?></td>
                                          <?php  } ?>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                        </div>

            <!-- declined -->

            <div id="Declined" class="w3-container w3-border book" style="display:none">
                <?php
                    $sql = mysqli_query($conn, "SELECT count(id_room) as count from reservasi where id_hotel = '$id' and status='3'");
                    $data =  mysqli_fetch_array($sql);
                    $count = $data['count'];
                    $jml=number_format($count);

                ?>
                <h2 class="box-title"><i class="fa fa-minus-square"></i>  Booking Declined</h2>
                <p>Total Request Declined by Admin: <?php echo $jml; ?></h4></p>
                <hr>
                    <table id="example3" class="table table-hover table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date of Transaction</th>
                                <th>Username</th>
                                <th>Room</th>
                                <th>Count</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Total Payment</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                        $no=0;
                            $sql = mysqli_query($conn, "SELECT DATEDIFF(reservasi.dateout, reservasi.datein)as hari, reservasi.username, reservasi.id_hotel, reservasi.tgl, reservasi.jumlah, reservasi.datein,
                              reservasi.dateout, reservasi.status, hotel.name as hotel, detail_room.name as room, detail_room.price
                              FROM reservasi join hotel on reservasi.id_hotel=hotel.id
                              join detail_room on reservasi.id_room=detail_room.id_room where reservasi.id_hotel = '$id'
                              and reservasi.status='3'");
                            while($data =  mysqli_fetch_array($sql)){
                            $tgl = $data['tgl'];
                            $jumlah = $data['jumlah'];
                            $datein = $data['datein'];
                            $dateout = $data['dateout'];
                            $status = $data['status'];
                            $hotel = $data['hotel'];
                            $room = $data['room'];
                            $id_hotel = $data['id_hotel'];
                            $price = $data['price'];
                            $username = $data['username'];
                            $hari = $data['hari'];

                            $total = ($jumlah * $price);
                            $payment = ($total * $hari);
                            $no++;
                        ?>
                            <tr>
                                <td><?php echo "$no"; ?></td>
                                <td><?php echo "$tgl"; ?></td>
                                <td><?php echo "$username"; ?></td>
                                <td><?php echo "$room"; ?></td>
                                <td><?php echo "$jumlah"; ?></td>
                                <td><?php echo "$datein"; ?></td>
                                <td><?php echo "$dateout"; ?></td>
                                <td><?php echo "$payment"; ?></td>
                                <?php if ($status='3') { ?>
                                  <td style="background-color: lightgrey;"><?php echo "Declined"; ?></td>
                              <?php  } ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>

<script>
// function tabSwitch(new_tab, new_content) {
//
//     document.getElementById('content_1').style.display = 'none';
//     document.getElementById('content_2').style.display = 'none';
//     document.getElementById('content_3').style.display = 'none';
//     document.getElementById('content_4').style.display = 'none';
//     document.getElementById(new_content).style.display = 'block';
//
//
//     document.getElementById('tab_1').className = '';
//     document.getElementById('tab_2').className = '';
//     document.getElementById('tab_3').className = '';
//     document.getElementById('tab_4').className = '';
//     document.getElementById(new_tab).className = 'active';
//
// }

function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("book");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-teal", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-teal";
}
</script>
