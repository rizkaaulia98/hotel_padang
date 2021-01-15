<?php
session_start();
include ('../../../connect.php');
$id = $_GET['id'];
$idh = $_GET['idh'];
echo $id;

	$sql   = "DELETE from review where id_review='$id'";
	$delete = mysqli_query($conn, $sql);
	if ($delete){
		echo "<script>alert ('Data Successfully Delete');</script>";
	}
	else{
		echo "<script>alert ('Error');</script>";
	}

	echo "<script>eval(\"parent.location='../indexu.php?page=feedback&id=$idh'\");</script>";
?>
