<?php
require '../connect.php';

$cari = $_GET["cari"];	//ID

	//DATA HOTEL & TIPE HOTEL
	$querysearch	="SELECT angkot.id, angkot.destination, angkot.track, angkot.cost,  angkot_color.color, angkot.id_type, angkot_type.type from angkot
	left join angkot_color on angkot.id_color = angkot_color.id join angkot_type on angkot.id_type=angkot_type.id_type
	where angkot.id='$cari'";
	$hasil=mysqli_query($conn, $querysearch);
	while($baris = mysqli_fetch_array($hasil)){
		  $id=$baris['id'];
		  $destination=$baris['destination'];
          $track=$baris['track'];
          $cost=$baris['cost'];
			$color=$baris['color'];
		  $type=$baris['type'];
		  $dataarray[]=array('type'=>$type,'id'=>$id,'destination'=>$destination,'track'=>$track,'cost'=>$cost, 'color'=>$color);
	}

    //OUTPUT
    $arr=array("data"=>$dataarray);
    echo json_encode($arr);


?>
