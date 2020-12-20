
<?php
session_start();
require '../connect.php';

$tipe = $_GET["tipe"];		// Cari berdasarkan apa
$id_city  = $_SESSION['id'];
/*
ISI TIPE:
	1 => Star Hotel Rec
	2 => Budget Hotel Rec
  3 => Syariah hotel rec
  4 => best view hotel
*/

if ($tipe == 1) {
  $querysearch	="SELECT hotel.id, hotel.name, st_x(st_centroid(hotel.geom)) as lon, st_y(st_centroid(hotel.geom))
  as lat, hotel_recommendation.id_kategori, hotel_recommendation.id_hotel from hotel_recommendation
  join hotel on hotel.id=hotel_recommendation.id_hotel, city
  where (hotel_recommendation.id_kategori = 'a') and city.id='$id_city' AND ST_CONTAINS(city.geom, hotel.geom)";
}elseif ($tipe == 2) {
  $querysearch	="SELECT hotel.id, hotel.name, st_x(st_centroid(hotel.geom)) as lon, st_y(st_centroid(hotel.geom))
  as lat, hotel_recommendation.id_kategori, hotel_recommendation.id_hotel from hotel_recommendation
  join hotel on hotel.id=hotel_recommendation.id_hotel, city
  where (hotel_recommendation.id_kategori = 'b') and city.id='$id_city' AND ST_CONTAINS(city.geom, hotel.geom)";
}elseif ($tipe == 3) {
  $querysearch	="SELECT hotel.id, hotel.name, st_x(st_centroid(hotel.geom)) as lon, st_y(st_centroid(hotel.geom))
  as lat, hotel_recommendation.id_kategori, hotel_recommendation.id_hotel from hotel_recommendation
  join hotel on hotel.id=hotel_recommendation.id_hotel, city
  where (hotel_recommendation.id_kategori = 'c') and city.id='$id_city' AND ST_CONTAINS(city.geom, hotel.geom)";
}elseif ($tipe == 4) {
  $querysearch	="SELECT hotel.id, hotel.name, st_x(st_centroid(hotel.geom)) as lon, st_y(st_centroid(hotel.geom))
  as lat, hotel_recommendation.id_kategori, hotel_recommendation.id_hotel from hotel_recommendation
  join hotel on hotel.id=hotel_recommendation.id_hotel, city
  where (hotel_recommendation.id_kategori = 'd') and city.id='$id_city' AND ST_CONTAINS(city.geom, hotel.geom)";
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
