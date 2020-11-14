<?php
require '../connect.php';

$querysearch = "select St_AsGeoJSON(geom) as geom ,id, name,  ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom))
As lat from district order by id ASC";
$result = mysqli_query($conn, $querysearch);
$hasil = array(
	'type'	=> 'FeatureCollection',
	'features' => array()
	);
while ($isinya = mysqli_fetch_assoc($result)) {
	$features = array(
		'type' => 'Feature',
		'geometry' => json_decode($isinya['geom']),
		
		'properties' => array(
			'id' => $isinya['id'],
			'name' => $isinya['name'],

            'lat' => $isinya['lat'],
			'lng' => $isinya['lng']
			)
		);
	array_push($hasil['features'], $features);
}
echo json_encode($hasil);
?>
