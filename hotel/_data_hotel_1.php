<?php
session_start();
include("../connect.php");
$city = $_SESSION['id'];
$cari = $_GET["cari"];	//ID

	//DATA HOTEL & TIPE HOTEL
	$querysearch	="SELECT hotel.id, hotel.name, hotel.address, hotel.cp, hotel.access,
	hotel.ktp, hotel.marriage_book, hotel.mushalla, hotel_type.name as type_hotel, st_x(st_centroid(hotel.geom)) as lon, st_y(st_centroid(hotel.geom)) as lat
	from hotel left join hotel_type on hotel_type.id=hotel.id_type, city where city.id='$city' and st_contains(city.geom, hotel.geom) and hotel.id='$cari'";
	$hasil=mysqli_query($conn, $querysearch);
	while($baris = mysqli_fetch_array($hasil)){
		  $id=$baris['id'];
		  $name=$baris['name'];
		  $address=$baris['address'];
		  $cp=$baris['cp'];
			$ktp=$baris['ktp'];
		  $access=$baris['access'];
		  $marriage_book=$baris['marriage_book'];
		  $mushalla=$baris['mushalla'];
		  $type_hotel=$baris['type_hotel'];
		  $lat=$baris['lat'];
		  $lng=$baris['lon'];

	  $dataarray[]=array('id'=>$id,'name'=>$name, 'access'=>$access,'address'=>$address,'cp'=>$cp, 'ktp'=>$ktp, 'marriage_book'=>$marriage_book, 'mushalla'=>$mushalla, 'type_hotel'=>$type_hotel,'lng'=>$lng,'lat'=>$lat);
	}

	//DATA GALLERY
    $query_gallery="SELECT serial_number, gallery_hotel FROM hotel_gallery where id = '".$cari."' ";
    $hasil2=mysqli_query($conn, $query_gallery);
    while($baris = mysqli_fetch_array($hasil2)){
        $serial_number=$baris['serial_number'];
        $gallery_hotel=$baris['gallery_hotel'];
        $data_gallery[]=array('serial_number'=>$serial_number,'gallery_hotel'=>$gallery_hotel);
    }

    //DATA FASILITAS
    $query_fasilitas="SELECT facility_hotel.id, facility_hotel.name FROM facility_hotel left join detail_facility_hotel
		on detail_facility_hotel.id_facility = facility_hotel.id left join hotel on hotel.id = detail_facility_hotel.id_hotel where hotel.id = '".$cari."' ";
    $hasil3=mysqli_query($conn, $query_fasilitas);
    while($baris = mysqli_fetch_array($hasil3)){
        $id=$baris['id'];
        $name=$baris['name'];
        $data_fasilitas[]=array('id'=>$id,'name'=>$name);
    }

    //DATA KAMAR
    $query_kamar="SELECT detail_room.* from detail_room where id_hotel = '".$cari."' ";
    $hasil4=mysqli_query($conn, $query_kamar);
    while($baris = mysqli_fetch_array($hasil4)){
        $id_room=$baris['id_room'];
				$id_hotel=$baris['id_hotel'];
				$available=$baris['available'];
				$name=$baris['name'];
        $price=$baris['price'];
				$sisa=$baris['sisa'];
        $data_kamar[]=array('id_room'=>$id_room, 'id_hotel'=>$id_hotel, 'available'=>$available, 'name'=>$name,'price'=>$price,'sisa'=>$sisa);
    }

    //OUTPUT
    $arr=array("data"=>$dataarray, "gallery"=>$data_gallery, "fasilitas"=>$data_fasilitas, "kamar"=>$data_kamar);
    echo json_encode($arr);
?>
