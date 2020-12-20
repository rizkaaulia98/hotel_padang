<?php
include '../../connect.php';
$id = $_GET["id"];
$id_hotel = $_SESSION['id'];
$admin=$_SESSION['username'];
$user = $_POST['username'];
//echo "woiiiiiiiiiiiiiiiiiiiii $id & $id_hotel& $user";
//DATA TOURISM
// $query = "SELECT hotel.id, hotel.name, hotel.address, hotel.cp, hotel.ktp, hotel.marriage_book, hotel.mushalla, hotel_type.name as type_hotel, st_x(st_centroid(hotel.geom)) as lon,st_y(st_centroid(hotel.geom)) as lat,hotel.username  from hotel left join hotel_type on hotel_type.id=hotel.id_type where hotel.id='$id'";
$hasil=mysqli_query($conn, "SELECT hotel.id, hotel.access, hotel.name, hotel.address, hotel.cp, hotel.ktp, hotel.marriage_book, hotel.mushalla, hotel_type.name as type_hotel, st_x(st_centroid(hotel.geom)) as lon,st_y(st_centroid(hotel.geom)) as lat from hotel left join hotel_type on hotel_type.id=hotel.id_type where hotel.id='$id'");
while($baris = mysqli_fetch_array($hasil)){
  $id=$baris['id'];
  $name_hotel=$baris['name'];
  $address=$baris['address'];
  $cp=$baris['cp'];
  $ktp=$baris['ktp'];
  $marriage_book=$baris['marriage_book'];
  $mushalla=$baris['mushalla'];
  $tourism_type=$baris['type_hotel'];
  $lng=$baris['lon'];
  $lat=$baris['lat'];
  $cp=$baris['cp'];
  $access=$baris['access'];
  if ($lat=='' || $lng==''){
    $lat='<span style="color:red">Empty</span>';
    $lng='<span style="color:red">Empty</span>';
  }
}

	$syarat="-";
	if ($ktp == 1 && $marriage_book == 1) {
	  $syarat = "ID Card & Marriage Certificate";
	}
	else if ($ktp == 1) {
	  $syarat = "ID Card";
	} else if ($marriage_book == 1) {
	  $syarat = "Marriage Certificate";
	}

	$mushalla_stat = "-";
	if ($mushalla == 1) {
	  $mushalla_stat = "Exist";
	};

//DATA FASILITAS
$facility;
$query_fasilitas="SELECT facility_hotel.id, facility_hotel.name FROM facility_hotel left join detail_facility_hotel on detail_facility_hotel.id_facility = facility_hotel.id left join hotel on hotel.id = detail_facility_hotel.id_hotel where hotel.id = '".$id."' ";
$hasil3=mysqli_query($conn, $query_fasilitas);
while($baris = mysqli_fetch_array($hasil3)){
    $abc=$baris['name'];
    $facility=$facility."<li>".$abc."</li>";
}


//DATA KAMAR
$room;
$query_kamar="SELECT *, detail_room.name as room FROM detail_room left join hotel on hotel.id = detail_room.id_hotel where hotel.id = '".$id."' ";
$hasil4=mysqli_query($conn, $query_kamar);
while($baris = mysqli_fetch_array($hasil4)){
    $name=$baris['room'];
    $price=$baris['price'];
    $abc=$name." - ".$price;
    $room=$room."<li>".$abc."</li>";
}

?>
<div class="col-sm-12">
	<div class="col-sm-6"> <!-- tampil informasi -->
	  	<section class="panel">
	        <div class="panel-body">
            <table>
              <thead>
                <tr>
                  <td width="450px"><h3 class="box-title"><b>Detail Of <?php echo $name_hotel; ?></b></h3></td>
                  <td><a href="?page=hotel_update&id=<?php echo $id ?>" class='btn btn-default'><i class="fa fa-edit"></i></a></td>
                </tr>
              </thead>
            </table> <hr>

				<table>
					<tbody  style='vertical-align:top;'>
						<tr><td width="150px"><b>Address</b></td><td> :&nbsp; </td><td style='text-transform:capitalize;'><?php echo $address ?></td></tr>
						<tr><td><b>Contact Person</b></td><td>:</td><td><?php echo $cp ?></td></tr>
						<tr><td><b>Requirements</b></td> <td> :</td><td><?php echo $syarat ?></td></tr>
						<tr><td><b>Mushalla<b> </td><td>: </td><td><?php echo $mushalla_stat ?></td></tr>
            <tr><td><b>Hotel Type<b> </td><td>: </td><td><?php echo $tourism_type ?></td></tr>
              <?php if ($access=="1") { ?>
                <tr><td><b>Transport Access<b> </td><td>: </td><td>Bus</td></tr>
              <?php }else { ?>
                <tr><td><b>Transport Access<b> </td><td>: </td><td>No Bus</td></tr>
              <?php } ?>

						<!-- <tr><td><b>Hotel Star<b> </td><td>: </td><td><?php echo $star ?></td></tr> -->
						<tr><td><b>Koordinat<b> </td><td>: </td><td><b>Latitude</b> : <?php echo $lat ?> <br><b>Longitude</b> : <?php echo $lng ?></td></tr>
					</tbody>
				</table><hr>
	     </section>
<!-- kamar -->
       <section class="panel">
         <div class="panel-body">
           <div >
             <!-- <a href="" type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#addR<?php echo $baris['id']; ?>"><i class="fa fa-plus"></i> Set Rooms</a> -->
             <h4>Rooms: </h4>
             <table class="table-bordered" width="80%">
               <thead>
                 <tr>
                   <th>Room</th>
                   <th>Price</th>
                   <th>Available</th>
                 </tr>
               </thead>
               <tbody>
                 <?php
                 // $room;
                 // $harga;
                 $query_kamar=mysqli_query($conn, "SELECT detail_room.* FROM detail_room right join hotel on hotel.id = detail_room.id_hotel where hotel.id = '".$id."' ");
                 while($data = mysqli_fetch_array($query_kamar)){
                     $name=$data['name'];
                     $id_room = $data['id_room'];
                     $id_hotel = $data['id_hotel'];
                     $price=$data['price'];
                     $available=$data['available'];
                     $sisa = $data['sisa'];

                     ?>
                     <tr id="<?php echo $data['id_room'];?>">
                       <td><?php echo $name; ?></td>
                       <td><?php echo $price; ?></td>
                       <td><?php echo $available; ?></td>
                     </tr>
                 <?php }
                  ?>

               <tbody>
             </table>
           </div>
       </section>
<!-- fasilitas -->
       <section class="panel">
         <div class="panel-body">
           <div>
             <!-- <a href="" type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#addF<?php echo $baris['id']; ?>"><i class="fa fa-plus"></i> Set Facilities</a> -->
             <h4>Facilities:</h4>
             <table class="table-hover table-bordered " width="50%">

               <tbody>
                 <?php
                 $query=mysqli_query($conn, "SELECT detail_facility_hotel.id_facility, detail_facility_hotel.id_hotel, facility_hotel.name
                 FROM facility_hotel left join detail_facility_hotel on detail_facility_hotel.id_facility = facility_hotel.id
                 left join hotel on hotel.id = detail_facility_hotel.id_hotel where detail_facility_hotel.id_hotel = '".$id."'");
                 while($data = mysqli_fetch_array($query)){
                     $name=$data['name'];
                     $id_facility = $data['id_facility'];
                     $id_hotel = $data['id_hotel'];

                     ?>
                     <tr>
                       <td><li><?php echo $name; ?></li></td>
                     </tr>
                 <?php }
                  ?>

               <tbody>
             </table>
           </div>
       </section><br>

       <!-- add info -->
       <section class="panel">
         <div class="panel-body">
           <div class="btn-group"><a class='btn btn-round' role='button' data-toggle='collapse' href='#info' onclick='' title='Nearby' aria-controls='Nearby'><i class='fa fa-plus' style='color:black;'></i><label>&nbsp Add Info</label></a></div>

 				<div class='collapse' id='info'>
 					<form method="post" action="act/addinfo.php">
 						<input type="text" class="form-control hidden " id="id" name="id" value="<?php echo $id ?>">
 						<input type="text" class="form-control hidden " id="admin" name="admin" value="<?php echo $admin ?>">
 						<table class="table">
 							<tbody  style='vertical-align:top;'>
 								<tr><td><b>Essential Information :</td><td><textarea cols="40" rows="5" name="info"></textarea></td></tr>
 		            <tr><td><input type="submit" value="Post Information"/></td><td></td></tr>
              </tbody>
 						</table>
 					</form>
 		     </div>
 		     	 <?php
                       $id = $_GET["id"];
                       //echo "ini $id";

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
                     <table class="table">
                     	<thead><th>Tanggal</th><th>Info</th><th>action</th></thead>
                     <?php
                       while ($rows = mysqli_fetch_array($result))
                         {
                           $tgl = $rows['tanggal'];
                           $info = $rows['informasi'];
                           $id_info =$rows['id_informasi'];
                           echo "<tr><td>$tgl</td><td>$info</td><td><a href='act/info_delete.php?id_informasi=$id_info' class='btn btn-sm btn-default' title='Delete'><i class='fa fa-trash-o'></i></a></td></tr>";
                         }
                        ?>
                    </table>
                  </div>
       </section>
	</div>

	<div class="col-sm-6">
		<div class="row">
			<div class="col-sm-12"> <!-- menampilkan gallery-->
			    <section class="panel">
				    <header class="panel-heading">
				        <h3> Picture of <?php echo $name_hotel ?></h3>
			        </header>

			        <div class="panel-body">
                        <div class="html5gallery" data-responsive="true" style="width:100%;overflow:auto;" data-skin="horizontal"  data-width="450" data-height="250" data-resizemode="fit">
                        <!-- <div class="html5gallery" style="display:none;" data-skin="horizontal" data-width="450" data-height="250" data-resizemode="fit"> -->

				    	<?php
							$id=$_GET['id'];
							$querysearch="SELECT gallery_hotel FROM hotel_gallery where id='$id'";
							$hasil=mysqli_query($conn, $querysearch);
							$xx = 0;
					     	while($baris = mysqli_fetch_array($hasil)){
				     			$nilai=$baris['gallery_hotel'];
				     			$xx++;
					 	?>
							<image src="../../_foto/<?php echo $nilai; ?>" style="width:10%;">
						<?php
				    		}
				    		if($xx==0){
						?>
							<image src="../../_foto/no.png" style="width:10%;">
						<?php
				    		}
						?>
						</div>
			        </div>
			    </section>
			</div>
    </div>

    <!-- menampilkan video -->
    <div class="col-sm-12">
        <section class="panel">
          <div class="panel-body">
            <div class="btn-group">
              <button class="btn btn-theme btn-block" style="background:#26a69a;border-color:white; width:360%;" data-toggle='collapse' href='#vid' onclick='' title='Play Video' aria-controls='Nearby'>
                <i class="fa fa-play"> PLAY VIDEOS</i>
              </button>
            </div> <br><br>
            <div class='collapse' id='vid'>
              <div class="html5gallery" data-html5player="true" data-width="464" data-height="272" data-src="" data-webm="" data-title="Big Buck Bunny">
                <?php
                $querysearch  ="SELECT a.id, b.video FROM hotel as a left join hotel_video as b on a.id=b.id where a.id='$id' ";
                $hasil=mysqli_query($conn, $querysearch);
                while($baris = mysqli_fetch_assoc($hasil)){
                  if(($baris['video']=='-')||($baris['video']=='')){
                    echo "<a href='../../_video/novideo.mp4'><img src='../../_video/novideo.mp4' ></a>";
                  }
                  else{
                    echo "<a href='../../_video/".$baris['video']."'><img src='../../_video/".$baris['video']."'></a>";
                  }
                }
                ?>
              </div>
            </div>
        </section>
      </div>
			</div>
		</div>
	</div>

</div>
