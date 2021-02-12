<?php

	include('../connect.php');
    $latit = $_GET['lat'];
    $longi = $_GET['lng'];
	$rad=$_GET['rad']/100;

	// $querysearch="SELECT id, name, st_x(st_centroid(geom)) as lng, st_y(st_centroid(geom)) as lat, st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), geom) as jarak FROM culinary_place where st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), geom) <= ".$rad."";
	// $querysearch = "SELECT
	// 											id, (
	// 												6371 * acos (
	// 													cos ( radians($latit) )
	// 													* cos( radians( ST_Y(ST_CENTROID(geom)) ) )
	// 													* cos( radians( ST_X(ST_CENTROID(geom)) ) - radians($longi) )
	// 													+ sin ( radians($latit) )
	// 													* sin( radians( ST_Y(ST_CENTROID(geom)) ) )
	// 												)
	// 											) AS jarak, name, ST_Y(ST_CENTROID(geom)) as lat, ST_X(ST_CENTROID(geom)) as lng
	// 										FROM culinary_place
	// 										HAVING jarak <= $rad";

	 $querysearch = "SELECT id,name,ST_Y(ST_CENTROID(geom)) as lat, ST_X(ST_CENTROID(geom)) as lng from culinary_place a where st_intersects(st_centroid(a.geom), ST_buffer(ST_GeomFromText(concat('POINT($longi $latit)')), 0.0009*$rad))=1";

	$hasil=mysqli_query($conn, $querysearch);

        while($baris = mysqli_fetch_array($hasil))
            {
                $id=$baris['id'];
                $name=$baris['name'];
                // $jarak=$baris['jarak'];
                $lat=$baris['lat'];
                $lng=$baris['lng'];
                $dataarray[]=array('id'=>$id,'name'=>$name,"lat"=>$lat,"lng"=>$lng);
            }
            echo json_encode ($dataarray);
?>
