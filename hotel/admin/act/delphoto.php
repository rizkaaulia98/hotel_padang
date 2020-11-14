<?php

include ('../../../connect.php');
session_start();
// $ih = $_GET['id_hotel'];
// $sn = $_GET['sn'];
$p = $_GET['id_photo'];

	$i = mysqli_query($conn, "SELECT * FROM hotel_gallery WHERE gallery_hotel ='$p' ");
	$u =mysqli_fetch_array($i);

	if(is_file("../../../_foto/".$u['gallery_hotel'])) unlink("../../../_foto/".$u['gallery_hotel']);
	mysqli_query($conn, "DELETE FROM hotel_gallery WHERE gallery_hotel='$p' ");
	header("location:../indexu.php?");


?>
