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

?>



<div class="col-sm-12">
  <!-- tampil informasi -->
	<div class="col-sm-6">
	  	<section class="panel">
	        <div class="panel-body">
				<table>
          <thead>
            <tr>
              <td width="450px"><h3 class="box-title"><b>ID:</b> <?php echo $id ?></h3></td>
              <td><a href="?page=hotel_update&id=<?php echo $id ?>" type="button" class='btn btn-default'><i style="color:#26a69a;" class="fa fa-edit"></i></a></td>
            </tr>
          </thead>
        </table> <hr>

        <table>
					<tbody  style='vertical-align:top; font-size: 15px;'>
						<tr><td width="150px"><b>Address</b></td><td> :&nbsp; </td><td style='text-transform:capitalize;'><?php echo $address ?></td></tr>
						<tr><td><b>Contact Person</b></td><td>:</td><td><?php echo $cp ?></td></tr>
						<tr><td><b>Requirements</b></td> <td> :</td><td><?php echo $syarat ?></td></tr>
						<tr><td><b>Mushalla<b> </td><td>: </td><td><?php echo $mushalla_stat ?></td></tr>
						<tr><td><b>Hotel Type<b> </td><td>: </td><td><?php echo $hotel_type ?></td></tr>
            <tr><td><b>Latitude<b> </td><td>: </td><td><?php echo $lat ?></td></tr>
            <tr><td><b>Longitude<b> </td><td>: </td><td><?php echo $lng ?></td></tr>
					</tbody>
				</table><hr>
	     </section>

       <!-- tampil kamar -->

       <section class="panel">
         <div class="panel-body">
           <div >
             <div><a href="" type="button"  data-toggle="modal" data-target="#addR<?php echo $baris['id']; ?>"><i class="fa fa-plus" style="color: #26a69a;"></i> <span style="color: #26a69a;">Set Rooms</span></a></div><br>
             <table class="w3-table" style="width: 100%;">
               <thead >
                 <tr class="w3-teal">
                   <th style="text-align: center;">Room Name</th>
                   <th style="text-align: center;">Price</th>
                   <th style="text-align: center;">Available</th>
                   <th style="text-align: center;">Actions</th>
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
                     <tr id="<?php echo $data['id_room'];?>" >
                       <td><?php echo $name; ?></td>
                       <td><?php echo $price; ?></td>
                       <td style="text-align: center;"><?php echo $sisa; ?></td>
                       <td>
                        <a href="" type="button"  data-toggle="modal" data-target="#upR<?php echo $data['id_room']; ?>" ><i style="color: #26a69a;" class="fa fa-edit"></i></a> &nbsp; &nbsp;
                        <a href="act/delroom.php?id_room=<?php echo $id_room; ?>"  title='Delete'><i style="color: #26a69a;" class="fa fa-trash-o"></i></a>

                       </td>
                     </tr>

                     <!-- Form Modal modalUpdate-->
                     <div class="modal fade" id="upR<?php echo $data['id_room']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <div class="modal-dialog" role="document">
                         <div class="modal-content">
                           <div class="modal-header">
                             <h5 class="modal-title">Update Room</h5>
                             <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">×</span>
                             </button>
                           </div>
                           <div class="modal-body">
                             <form role="form" method="get" action="act/updateroomhotel.php">
                                 <div class="form-group">
                                   <label>Room Name</label>
                                   <input type="text" name="nama_kamar" class="form-control" value="<?php echo $name;?>">
                                 </div>
                                 <div class="form-group">
                                   <label>Room Price</label>
                                   <input type="text" name="harga_kamar" class="form-control" value="<?php echo $price; ?>">
                                 </div>
                                 <div class="form-group">
                                   <label>Rooms Available</label>
                                   <input type="number" name="kamar_available" class="form-control" value="<?php echo $available;?>">
                                 </div>
                                 <div class="form-group">
                                   <label>Remaining Rooms</label>
                                   <input type="number" name="kamar_sisa" class="form-control" value="<?php echo $sisa;?>">
                                 </div>

                                 <div class="modal-footer">
                                   <input type="hidden" name="idroom" value="<?php echo $id_room;?>">
                                   <input hidden name="idhotel" value="<?php echo $id_hotel; ?>">
                                   <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                   <button type="submit" class="btn btn-primary" id="update">Update</button>
                                 </div>
                             </form>
                           </div>
                         </div>
                       </div>
                     </div>
                     <!--  End Of Modal ModalUpdate-->
                 <?php }
                  ?>
               <tbody>
             </table>
           </div>
       </section><br>

<!-- meampilkan fasilitas -->

       <section class="panel">
         <div class="panel-body">
           <div>
             <div><a href="" type="button" data-toggle="modal" data-target="#addF<?php echo $baris['id']; ?>"><i style="color: #26a69a;" class="fa fa-plus"></i> <span style="color: #26a69a;">Set Facilities</span></a></div><br>
             <table class="w3-table" width="50%">

               <tbody>
                 <?php
                 $query=mysqli_query($conn, "SELECT detail_facility_hotel.id_facility, detail_facility_hotel.id_hotel, facility_hotel.name
                 FROM facility_hotel left join detail_facility_hotel on detail_facility_hotel.id_facility = facility_hotel.id
                 left join hotel on hotel.id = detail_facility_hotel.id_hotel where detail_facility_hotel.id_hotel = '".$id."' order by facility_hotel.name ");
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

	</div> <!-- end of col-sm-6 -->

	<!-- <div class="col-sm-6">
		<div class="row"> -->
      <!-- menampilkan galeri-->
			<div class="col-sm-6">
			    <section class="panel">
			        <div class="panel-body">
                <table>
                  <thead>
                    <tr>
                      <td width="450px"  style="text-align: center"><h3 class="box-title"> Gallery Photos</h3></td>
                      <td><a href="" type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#show<?php echo $baris['id']; ?>"><i style="color:#26a69a;" class="fa fa-edit"></i></a><td>
                    </tr>
                  </thead>
                </table> <hr>
                <div class="html5gallery" data-responsive="false" style="width:100%;overflow:auto;" data-skin="horizontal"  data-resizemode="fit">
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
			</div> <!-- end of col-sm-6 -->
      <!-- end of row -->
    <!-- </div>  -->
    <!-- end of col-sm-12 -->
  <!-- </div> -->


      <!-- menampilkan video -->
      <div class="col-sm-6">
          <section class="panel">
            <div class="panel-body">
              <div class="btn-group">
                <button class="btn btn-theme btn-block" style="background:#26a69a;border-color:white; width:385%;" data-toggle='collapse' href='#vid' onclick='' title='Play Video' aria-controls='Nearby'>
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

        <div class="col-sm-6">
          <!-- upload picture -->
  			  	<div class="col-sm-6">
              <section class="panel">
    			      	<header class="panel-heading">
    			          <h5><b>Upload Picture of <?php echo $name_hotel ?></b></h5>
    				    </header>

    			        <div class="panel-body">
    						<form role="form" action="act/hotel_upload_photo.php" enctype="multipart/form-data" method="post">
    				  			<div class="box-body">
    								<input type="text" class="form-control hidden" name="id" value="<?php echo $id ?>">
    								<div class="form-group">
                      <input type="file" class="" style="background:none;border:none;" name="image" required>
    								</div>
    								<span style="color:red; font-size: 13px;">*Maximum image size 500kb</span>
    				  			</div><!-- /.box-body -->

    							<div class="box-footer">
    								<button type="submit" class="btn btn-primary" style="background-color:#26a69a;"><i class="fa fa-upload"></i> Upload</button>
    						    </div>
    						</form>
    			        </div>
    			  	</section>
            </div>
            <div class="col-sm-6">
              <!-- upload video -->
              <section class="panel">
    			      	<header class="panel-heading">
    			          <h5><b>Upload Video of <?php echo $name_hotel ?></b></h5>
    				      </header>

    			      <div class="panel-body">
    						<form role="form" action="act/hotel_upload_video.php" enctype="multipart/form-data" method="post">
    				  			<div class="box-body">
    								<input type="text" class="form-control hidden" name="id_videos" value="<?php echo $id ?>">
    								<div class="form-group">
    					 			<input type="file" class="" style="background:none;border:none;" name="file_video" required>
    								</div>
    								<span style="color:red; font-size: 13px;">*Maximum image size 50mb</span>
    				  			</div><!-- /.box-body -->

    							<div class="box-footer">
    								<button type="submit" class="btn btn-primary" style="background-color:#26a69a;"><i class="fa fa-upload"></i> Upload</button>
    						  </div>
    						</form>
    			      </div>
    			  	</section>
            </div>
		    </div>
        <div class="col-sm-6">
          <!-- add info -->
          <section class="panel">
            <div class="panel-body">
              <div class="btn-group">
                <a class="btn btn-round" role="button" data-toggle="collapse" href="#info" onclick='' title='Nearby' aria-controls='Nearby'>
                  <i class='fa fa-plus' style='color:#26a69a;'></i>
                  <label style="color: #26a69a;">&nbsp; Add Info</label>
                </a>
              </div>

           <div class='collapse' id='info'>
             <form method="post" action="act/addinfo.php">
               <input type="text" class="form-control hidden " id="id" name="id" value="<?php echo $id ?>">
               <input type="text" class="form-control hidden " id="admin" name="admin" value="<?php echo $admin ?>">
               <table class="table">
                 <tbody  style='vertical-align:top;'>
                   <tr><td><b>Essential Information :</td><td><textarea cols="30" rows="5" name="info"></textarea></td></tr>
                   <tr><td><button type="submit" class="btn btn-theme btn-block" style="background:#26a69a;border-color:white; width:100%; height: 35px;"><i class="icon-pencil7"></i>&nbsp;Post Information</button></td></tr>
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
                        <table class="w3-table">
                         <thead class="w3-teal"><th>Tanggal</th><th>Info</th><th>Action</th></thead>
                        <?php
                          while ($rows = mysqli_fetch_array($result))
                            {
                              $tgl = $rows['tanggal'];
                              $info = $rows['informasi'];
                              $id_info =$rows['id_informasi'];
                              echo "<tr><td>$tgl</td><td>$info</td><td><a style='color:#26a69a;' href='act/info_delete.php?id_informasi=$id_info' title='Delete'><i class='fa fa-trash-o'></i></a></td></tr>";
                            }
                           ?>
                       </table>
                     </div>
          </section>
        </div>
	</div>

</div>

<!-- modal addRooms -->
<div class="modal fade" id="addR<?php echo $baris['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <table>
          <thead>
            <tr>
              <td style="width: 550px;"><h5 class="modal-title" id="exampleModalLabel">Add Rooms</h5></td>
              <td><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></td>
            </tr>
          </thead>
        </table>
      </div>
      <div class="modal-body">
        <form role="form" name="formAdd" method="post" action="act/addroomhotel.php" >

          <div class="form-group mb-3">
            <label>Room Name</label>
            <input type="text" class="form-control hidden" id="id_hotel" name="id_hotel" value="<?php echo $id ?> ">
            <input type="text" name="nama_kamar" class="form-control" value="">
          </div>
          <div class="form-group mb-3">
            <label>Room Price</label>
            <input type="text" name="harga_kamar" class="form-control" value="">
          </div>
          <div class="form-group mb-3">
            <label>Rooms Available</label>
            <input type="number" name="kamar_available" class="form-control" value="">
          </div>
          <div class="form-group mb-3">
            <label>Remaining Rooms</label>
            <input type="number" name="kamar_sisa" class="form-control" value="">
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-primary" type="submit"><i class="fa fa-floppy-o"></i> Save</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<!-- modal show photo -->
<div class="modal fade" id="show<?php echo $baris['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <table>
          <thead>
            <tr>
              <td style="width: 550px;"><h5 class="modal-title" id="exampleModalLabel">Delete Photos</h5></td>
              <td><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></td>
            </tr>
          </thead>
        </table>
      </div>
      <div class="modal-body">
          <table class="table">
            <thead>
              <tr>
                <td>ID Photo</td>
                <td>Photo</td>
                <td>Delete</td>
              </tr>
            </thead>
            <tbody  style='vertical-align:top;'>
              <?php
              $query = "SELECT * FROM hotel_gallery where id = '$id'";
              $photo = mysqli_query($conn, $query);
              while ($show=mysqli_fetch_array($photo)){
                $sn = $show['serial_number'];
                $ih = $show['id'];
                $p = $show['gallery_hotel'];
              ?>
              <tr>
                <td><?php echo $sn; ?></td>
                <td><?php echo $p; ?></td>
                <td>
                  <a href="act/delphoto.php?id_photo=<?php echo $p; ?>" class="btn btn-sm btn-default"><i class="fa fa-trash"></i></a>

                </td>
              </tr>

            <?php } ?>
            </tbody>
          </table>
      </div>

    </div>
  </div>
</div>

<!-- add facilities -->
<div class="modal fade" id="addF<?php echo $baris['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <table>
          <thead>
            <tr>
              <td style="width: 550px;"><h5 class="modal-title" id="exampleModalLabel">Add Hotel Facilities</h5></td>
              <td><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></td>
            </tr>
          </thead>
        </table>
      </div>
      <div class="modal-body">
        <form role="form" name="formAdd" method="post" action="act/updatefasilitashotel.php" >
          <div class="form-group mb-3">
            <div class="table-responsive">
              <input type="text" class="form-control hidden" id="id_hotel" name="id_hotel" value="<?php echo $id ?> " hidden>
                <table class="table" rules="cols">
                <thead><th></th><th>Facilities</th></thead>
                <tbody style='vertical-align: top;'>
                  <?php
                    $sql2 = mysqli_query($conn, "SELECT * from facility_hotel order by name");
                    while($dt = mysqli_fetch_array($sql2))
                    { ?> <tr> <?php
                      $sql3 = mysqli_query($conn, "SELECT * FROM detail_facility_hotel where id_hotel='$id' and id_facility=$dt[id]");
                      $data3 = mysqli_fetch_array($sql3);
                      if ($dt['id']==$data3['id_facility']){
                        echo "<td><input name='facility_hotel[]' value=\"$dt[id]\" type='checkbox' style='width:25px;' onClick='enable(this)' checked=\"\"></td><td>$dt[name]</td>";

                      }else{
                        echo "<td><input name='facility_hotel[]' value=\"$dt[id]\" type='checkbox' onClick='enable(this)' style='width:25px;'></td><td>$dt[name]</td>";

                      }
                  ?> </tr>
                  <?php } ?>
                </tbody>
                </table>
            </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" style="float:right"><i class="fa fa-floppy-o"></i> Save</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
