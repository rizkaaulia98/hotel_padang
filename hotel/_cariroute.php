<?php

	require '../connect.php';

	$id_a = $_GET["id_angkot"];

	// PENCARIAN OBJEK WISATA DISEPANJANG JALUR ANGKOT //

	$querysearch = "SELECT FLOOR(111045 * DEGREES(acos(
                cos( radians(st_y(st_centroid(hotel.geom))) )
              * cos( radians( detail_hotel.lat ) )
              * cos( radians( detail_hotel.lng ) - radians(st_x(st_centroid(hotel.geom))) )
              + sin( radians(st_y(st_centroid(hotel.geom))) )
              * sin( radians( detail_hotel.lat) ))) )
							as distance,  detail_hotel.id_angkot, hotel.id as id, hotel.name, angkot.destination,
		angkot.route_color, st_x(st_centroid(angkot.geom)) AS lng3, st_y(st_centroid(angkot.geom)) AS lat3,
		st_x(st_centroid(hotel.geom)) AS lng2, st_y(st_centroid(hotel.geom)) AS lat2, detail_hotel.lat as lat1,
		detail_hotel.lng as lng1, detail_hotel.description
		FROM detail_hotel
		LEFT JOIN hotel ON hotel.id = detail_hotel.id_hotel
		LEFT JOIN angkot ON angkot.id = detail_hotel.id_angkot
		WHERE angkot.id = '$id_a' ORDER BY distance ASC";

	$result = mysqli_query($conn, $querysearch);

	while($row = mysqli_fetch_array($result))
	{
		$id   			= $row['id'];
		$name 			= $row['name'];
		$lng1 			= $row['lng1'];  // titik turun
		$lat1 			= $row['lat1'];  // titik turun
		$lng2 			= $row['lng2'];  // lng objek wisata
		$lat2 			= $row['lat2'];  // lat objek wisata
		$lng3  			= $row['lng3'];  // lng angkot
		$lat3  			= $row['lat3'];  // lat angkot
		$distance		= $row['distance'];
		$route_color	= $row['route_color'];

		$dataarray[] = array('id'=>$id, 'name'=>$name, 'lng1'=>$lng1, 'lat1'=>$lat1, 'lng3'=>$lng3, 'lat3'=>$lat3, 'lng2'=>$lng2,'lat2'=>$lat2, 'distance'=>$distance, 'route_color'=>$route_color);
	}
	echo json_encode ($dataarray);
?>
