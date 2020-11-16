
<?php
require '../connect.php';

$tipe = $_GET["tipe"];		// Cari berdasarkan apa

/*
ISI TIPE:
	1 => Star Hotel Rec
	2 => Budget Hotel Rec
  3 => Syariah hotel rec
  4 => best view hotel
*/

if ($tipe == 1) {
  $querysearch	="SELECT id, name, st_x(st_centroid(geom)) as lon, st_y(st_centroid(geom)) as lat from hotel where  status like 'P1'";
} elseif ($tipe == 2) {
  $querysearch	="SELECT id, name, st_x(st_centroid(geom)) as lon, st_y(st_centroid(geom)) as lat from hotel where  status like 'P2'";
} elseif ($tipe == 3) {
  $querysearch	="SELECT id, name, st_x(st_centroid(geom)) as lon, st_y(st_centroid(geom)) as lat from hotel where  status like 'P3'";
} elseif ($tipe== 4) {
  $querysearch	="SELECT id, name, st_x(st_centroid(geom)) as lon, st_y(st_centroid(geom)) as lat from hotel where  status like 'P4'";
}

$hasil=mysqli_query($conn, $querysearch);
while($baris = mysqli_fetch_array($hasil))
	{
		  $id=$baris['id'];
		  $name=$baris['name'];
		  $lat=$baris['lat'];
		  $lng=$baris['lon'];
		  $dataarray[]=array('id'=>$id,'name'=>$name, 'lng'=>$lng, 'lat'=>$lat);
	}
echo json_encode ($dataarray);
?>
