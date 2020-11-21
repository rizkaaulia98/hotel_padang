<?php
include '../connect.php';
$id = $_GET["id"];
$hasil=mysqli_query($conn, "SELECT hotel.id, hotel.name as name, hotel.address, hotel.cp, hotel.ktp, hotel.marriage_book, hotel.mushalla, hotel_type.name as type_hotel, st_x(st_centroid(hotel.geom)) as lon,st_y(st_centroid(hotel.geom)) as lat
 from hotel left join hotel_type on hotel_type.id=hotel.id_type where hotel.id='$id'");
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
	  $mushalla_stat = "Exists";
	};

//DATA FASILITAS
$facility;
$query_fasilitas="SELECT facility_hotel.id, facility_hotel.name FROM facility_hotel left join detail_facility_hotel on detail_facility_hotel.id_facility = facility_hotel.id left join hotel on hotel.id = detail_facility_hotel.id_hotel where detail_facility_hotel.id_hotel = '$id' ";
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
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Print Detail Hotel</title>
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
  </head>
  <body>
    <div class="col-sm-12">
    	<div class="col-sm-6"> <!-- tampil informasi -->
        <section class="panel">
            <div class="panel-body">

              <table>
                <thead>
                  <tr>
                    <td width="450px"><h3 class="box-title"><b>Detail Of <?php echo $name_hotel; ?></b></h3></td>
                  </tr>
                </thead>
              </table> <hr>

          <table>
            <tbody  style='vertical-align:top;'>
              <tr><td width="150px"><b>Address</b></td><td> :&nbsp; </td><td style='text-transform:capitalize;'><?php echo $address ?></td></tr>
              <tr><td><b>CP</b></td><td>:</td><td><?php echo $cp ?></td></tr>
              <tr><td><b>Requirements</b></td> <td> :</td><td><?php echo $syarat ?></td></tr>
              <tr><td><b>Mushalla<b> </td><td>: </td><td><?php echo $mushalla_stat ?></td></tr>
              <tr><td><b>Type<b> </td><td>: </td><td><?php echo $tourism_type ?></td></tr>
              <!-- <tr><td><b>Hotel Star<b> </td><td>: </td><td><?php echo $star ?></td></tr> -->
              <tr><td><b>Coordinate<b> </td><td>: </td><td><b>Latitude</b> : <?php echo $lat ?> <br><b>Longitude</b> : <?php echo $lng ?></td></tr>
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
                   $query_kamar=mysqli_query($conn, "SELECT detail_room.name as room, detail_room.* FROM detail_room right join hotel on hotel.id = detail_room.id_hotel where hotel.id = '$id' ");
                   while($data = mysqli_fetch_array($query_kamar)){
                       $name=$data['room'];
                       $id_room = $data['id_room'];
                       $id_hotel = $data['id_hotel'];
                       $id_type = $data['id_type'];
                       $price=$data['price'];
                       $available=$data['available'];

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
               <table width="50%">

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
         </section>
    	</div>

      <div class="col-sm-6">

      </div>

    </div>
<script>
window.print();

</script>
  </body>
</html>
