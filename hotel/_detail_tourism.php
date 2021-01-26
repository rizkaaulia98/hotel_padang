<?php
    include("../connect.php");
    $id = $_GET['id'];

    $result=  mysqli_query($conn, "SELECT detail_tourism.id_angkot, angkot.route_color as color, angkot.destination, st_x(st_centroid(tourism.geom)) as lng2,
    st_y(st_centroid(tourism.geom)) as lat2, detail_tourism.lat, detail_tourism.lng, detail_tourism.description FROM detail_tourism
    left join tourism on tourism.id=detail_tourism.id_tourism left join angkot on angkot.id = detail_tourism.id_angkot where detail_tourism.id_tourism='$id' ");

        while($baris = mysqli_fetch_array($result))
            {
                $id=$baris['id_angkot'];
                $destination=$baris['destination'];
                $color=$baris['color'];
                $lat=$baris['lat'];
                $lng=$baris['lng'];
                $lat2=$baris['lat2'];
                $lng2=$baris['lng2'];
                $description=$baris['description'];
                $dataarray[]=array('id'=>$id,'destination'=>$destination,'lat'=>$lat,'lng'=>$lng,'lat2'=>$lat2,'lng2'=>$lng2,'color'=>$color,'description'=>$description);
            }
            echo json_encode ($dataarray);
?>
