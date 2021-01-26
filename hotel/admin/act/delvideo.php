<?php

include ('../../../connect.php');
session_start();
$ih = $_GET['id_hotel'];
// $sn = $_GET['sn'];
$p = $_GET['id_video'];

// echo $ih;
// echo $p;

	$i = mysqli_query($conn, "SELECT * FROM hotel_video WHERE video ='$p' ");
	$u =mysqli_fetch_array($i);

	if(is_file("../../../_video/".$u['video'])) unlink("../../../_video/".$u['video']);
	mysqli_query($conn, "DELETE FROM hotel_video WHERE video='$p' ");
	// header("location:../indexu.php?page=hotel_owner&id=$ih");
	echo "<script>
		alert (' Data Successfully Deleted');
		eval(\"parent.location='../indexu.php?page=hotel_owner&id=$ih'\");
		</script>";


?>
