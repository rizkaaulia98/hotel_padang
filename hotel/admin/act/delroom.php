<?php
include ('../../../connect.php');
$id_room = $_GET['id_room'];
$id_hotel = $_GET['id_hotel'];
echo $id_hotel;

	$sql1   = "DELETE from detail_room where id_room=$id_room";

	$delete1 = mysqli_query($conn, $sql1);
	if ($delete1){
	echo "<script>
		alert (' Data Successfully Deleted');
		eval(\"parent.location='../indexu.php?page=hotel_owner&id=$id_hotel'\");
		</script>";
	}
	else{
		echo 'error';
	}
?>
