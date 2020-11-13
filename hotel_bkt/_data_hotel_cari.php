<?php
require '../connect.php';

$tipe = $_GET["tipe"];		// Cari berdasarkan apa
$nilai = $_GET["nilai"];	// Isi yang dicari
$nilai2 = $_GET["nilai2"];	// Isi yang dicari

/*
ISI TIPE:
	1 => Nama
	2 => Adress
	3 => Tipe
	4 => Service
	5 => rating
	6 => room's price
*/

if ($tipe == 1) {
	$querysearch	="SELECT id, name, st_x(st_centroid(geom)) as lon, st_y(st_centroid(geom)) as lat from hotel where  LOWER(name) like '%".$nilai."%';";
} elseif ($tipe == 2) {
	$querysearch	="SELECT id, name, st_x(st_centroid(hotel.geom)) as lon, st_y(st_centroid(hotel.geom)) as lat from hotel where  LOWER(address) like '%".$nilai."%';";
} elseif ($tipe == 3) {
	$querysearch	="SELECT hotel.id, hotel.name, st_x(st_centroid(hotel.geom)) as lon, st_y(st_centroid(hotel.geom)) as lat from hotel left join hotel_type on hotel_type.id = hotel.id_type where  LOWER(hotel_type.id) like '%".$nilai."%';";
} elseif ($tipe == 4) {
	$querysearch	="SELECT hotel.id as id, hotel.name, ST_X(ST_Centroid(hotel.geom)) AS lon, ST_Y(ST_CENTROID(hotel.geom)) As lat FROM hotel WHERE id IN(SELECT DISTINCT hotel.id FROM detail_facility_hotel JOIN hotel on detail_facility_hotel.id_hotel=hotel.id WHERE detail_facility_hotel.id_facility = '$nilai');";
} elseif ($tipe == 5) {
	$querysearch	="SELECT hotel.id as id, hotel.name, ST_X(ST_Centroid(hotel.geom)) AS lon, ST_Y(ST_CENTROID(hotel.geom)) As lat FROM hotel WHERE id IN(SELECT DISTINCT hotel.id FROM detail_room JOIN hotel on detail_room.id_hotel=hotel.id WHERE detail_room.price between '$nilai' and '$nilai2');";
} elseif ($tipe == 6) {
	$querysearch = "SELECT hotel.id, hotel.name,  ST_X(ST_Centroid(hotel.geom)) AS lon, ST_Y(ST_CENTROID(hotel.geom)) As lat, avg(review.rating)as rata from hotel JOIN review on hotel.id=review.id_hotel group by review.id_hotel having avg(review.rating) = '$nilai - 1' and '$nilai' order by rata desc";
}elseif ($tipe == 7) {
	$querysearch ="SELECT hotel.id as id, hotel.name, ST_X(ST_Centroid(hotel.geom)) AS lon, ST_Y(ST_CENTROID(hotel.geom)) As lat FROM hotel WHERE id IN(SELECT DISTINCT hotel.id FROM detail_facility_hotel JOIN hotel on detail_facility_hotel.id_hotel=hotel.id WHERE detail_facility_hotel.id_facility = '$nilai');"; ;
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
