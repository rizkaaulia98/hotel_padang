<?php
include ('../../../connect.php');
$id_hotel = $_GET['idhotel'];
$id_room	= $_GET['idroom'];
$name = $_GET['nama_kamar'];
$price = $_GET['harga_kamar'];
$available = $_GET['kamar_available'];
$sisa = $_GET['kamar_sisa'];
$id_type= $_GET['tipe_kamar'];


$sql  = "UPDATE detail_room set name='$name', price = '$price', available = '$available', id_type = '$id_type', id_room = '$id_room', sisa = '$sisa' where id_room='$id_room'";
$update = mysqli_query($conn, $sql);

if ($update){
	echo "<script>alert ('Data Successfully Change');
	eval(\"parent.location='../indexu.php?page=hotel_owner&id=$id_hotel'\");
	</script>";

}else{
	echo "<script>alert ('Error');
	eval(\"parent.location='../indexu.php?page=hotel_owner&id=$id_hotel'\");
	</script>";

}
// header("location:../?page=formsetR&id=$id_hotel");
//
// 	if($_SESSION['A']===true){
// 	header("location:../?page=hotel_detail&id=$id_hotel");}
// 	else{
// 		header("location:../?page=hotel_detail&id=$id_hotel");
// 	}
?>
