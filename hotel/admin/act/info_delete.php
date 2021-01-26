<?php
session_start();
include ('../../../connect.php');
$id_info = $_GET['id_informasi'];
$id_hotel = $_GET['id_hotel'];
// echo "$id_info --> id_info, $id_hotel= hotel";

	$sql1   = "delete from information_admin where id_informasi = $id_info";
	$delete1 = mysqli_query($conn, $sql1);
	if ($delete1){
		echo "<script>alert ('Data Successfully Deleted');</script>";
		if($_SESSION['A']===true){
		header("location:../?page=hotel_detail&id=$id_hotel");
		}
		else{
			header("location:../indexu.php?page=hotel_owner&id=$id_hotel");
		}
	}
	else{
		echo "<script>alert ('Error');</script>";
	}



?>
