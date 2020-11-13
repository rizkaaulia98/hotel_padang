<?php
include ('../../../connect.php');
$id_type = $_GET['id_type'];

	$sql1   = "delete from detail_room where id_type=$id_type";
	$delete1 = mysqli_query($conn, $sql1);
	if ($delete1){
		echo "<script>alert ('Data Successfully Delete');</script>";
	}
	else{
		echo "<script>alert ('Error');</script>";
	}

	$sql   = "delete from room where id_type=$id_type";
	$delete = mysqli_query($conn, $sql);
	if ($delete){
		echo "<script>alert ('Data Successfully Delete');</script>";
	}
	else{
		echo "<script>alert ('Error');</script>";
	}

	echo "<script>eval(\"parent.location='../?page=roomtype'\");</script>";
?>
