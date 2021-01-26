<?php
session_start();
include("../connect.php");
$city = $_SESSION['id'];

$tipe = $_GET["tipe"];		// Cari berdasarkan apa
$nilai = $_GET["nilai"];	// Isi yang dicari
$nilai2 = $_GET["nilai2"];	// Isi yang dicari

/*
ISI TIPE:
	1 => Nama
	2 => Adress
	3 => Tipe
	4 => Service
	5 => room's price
	6 => rating
	7 => facility_hotel
	8 => Access
*/

if ($tipe == 1) {
	$querysearch	="SELECT DISTINCT hotel.id , hotel.name, st_x(st_centroid(hotel.geom)) as lon, st_y(st_centroid(hotel.geom)) as lat from hotel, city
	where LOWER(hotel.name) like '%$nilai%' and city.id = '$city' AND ST_CONTAINS(city.geom, hotel.geom)";
} elseif ($tipe == 2) {
	$querysearch	="SELECT hotel.id, hotel.name, st_x(st_centroid(hotel.geom)) as lon, st_y(st_centroid(hotel.geom)) as lat from hotel, city
	where city.id = '$city' AND ST_CONTAINS(city.geom, hotel.geom) AND LOWER(hotel.address) like '%$nilai%'";
} elseif ($tipe == 3) {
	$querysearch	="SELECT hotel.id, hotel.name, st_x(st_centroid(hotel.geom)) as lon, st_y(st_centroid(hotel.geom)) as lat
	from hotel left join hotel_type on hotel_type.id = hotel.id_type, city where city.id = '$city' AND ST_CONTAINS(city.geom, hotel.geom)
	AND hotel_type.id = '$nilai'";
} elseif ($tipe == 4) {
	$querysearch	="SELECT hotel.id, hotel.name, ST_X(ST_Centroid(hotel.geom)) AS lon, ST_Y(ST_CENTROID(hotel.geom)) As lat
	FROM hotel WHERE id IN(SELECT DISTINCT hotel.id FROM detail_facility_hotel
		JOIN hotel on detail_facility_hotel.id_hotel=hotel.id, city WHERE city.id = '$city' AND ST_CONTAINS(city.geom, hotel.geom)
		and detail_facility_hotel.id_facility = '$nilai')";
} elseif ($tipe == 5) {
	$querysearch	="SELECT hotel.id as id, hotel.name, ST_X(ST_Centroid(hotel.geom)) AS lon, ST_Y(ST_CENTROID(hotel.geom)) As lat
	FROM hotel WHERE id IN(SELECT DISTINCT hotel.id FROM detail_room
		JOIN hotel on detail_room.id_hotel=hotel.id, city WHERE city.id = '$city' AND ST_CONTAINS(city.geom, hotel.geom)
		AND detail_room.price between '$nilai' and '$nilai2')";
} elseif ($tipe == 6) {
	$querysearch = "SELECT hotel.id, hotel.name,  ST_X(ST_Centroid(hotel.geom)) AS lon, ST_Y(ST_CENTROID(hotel.geom)) As lat, FLOOR(AVG(review.rating)) AS rating
	from hotel JOIN review on hotel.id=review.id_hotel, city
	where city.id = '$city' AND st_contains(city.geom, hotel.geom) group by review.id_hotel having rating <= $nilai and rating > $nilai-1 order by hotel.name";
}elseif ($tipe == 7) {
	$querysearch ="SELECT hotel.id as id, hotel.name, ST_X(ST_Centroid(hotel.geom)) AS lon, ST_Y(ST_CENTROID(hotel.geom)) As lat
	FROM hotel WHERE id IN(SELECT DISTINCT hotel.id FROM detail_facility_hotel
		JOIN hotel on detail_facility_hotel.id_hotel=hotel.id, city WHERE city.id = '$city' AND ST_CONTAINS(city.geom, hotel.geom)
		AND detail_facility_hotel.id_facility = '$nilai')";
}elseif ($tipe == 8) {
	$querysearch = "SELECT hotel.id, hotel.name, hotel.access, st_x(st_centroid(hotel.geom)) as lon, st_y(st_centroid(hotel.geom)) as lat from hotel, city
	where city.id = '$city' AND ST_CONTAINS(city.geom, hotel.geom) AND hotel.access='$nilai'";
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
