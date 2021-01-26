<?php

session_start();
include("../connect.php");
$city = $_SESSION['id'];


$querysearch="SELECT hotel.id, hotel.name,  ST_X(ST_Centroid(hotel.geom)) AS lng, ST_Y(ST_CENTROID(hotel.geom)) As lat from hotel, city
where city.id='$city' and st_contains(city.geom, hotel.geom) order by hotel.name ASC";

$result=mysqli_query($conn, $querysearch);
  while($baris = mysqli_fetch_array($result))
    {
        $id=$baris['id'];
        $nama=$baris['name'];
        $longitude=$baris['lng'];
		    $latitude=$baris['lat'];
		    $dataarray[]=array('id'=>$id,'nama'=>$nama,'longitude'=>$longitude,'latitude'=>$latitude);
    }
   echo json_encode ($dataarray);
?>
