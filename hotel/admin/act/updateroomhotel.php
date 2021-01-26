<?php
include ('../../../connect.php');
$id_hotel = $_GET['idhotel'];
$id_room	= $_GET['idroom'];
$name = $_GET['nama_kamar'];
$price = $_GET['harga_kamar'];
$available = $_GET['kamar_available'];
$sisa = $_GET['kamar_sisa'];


$sql  = "UPDATE detail_room set name='$name', price = '$price', available = '$available', id_room = '$id_room', sisa = '$sisa' where id_room='$id_room'";
$update = mysqli_query($conn, $sql);

if ($update){
	echo "<script>alert ('Data Successfully Updated');
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
