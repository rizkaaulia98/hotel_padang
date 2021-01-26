<?php
include ('../../../connect.php');
$id_hotel = $_GET['id'];
$idc = $_GET['category'];

$sql  = "DELETE from hotel_recommendation where id_hotel='$id_hotel' and id_kategori='$idc'";
$update = mysqli_query($conn, $sql);

if ($update){
	echo "<script>alert ('Recommendation Successfully Deleted');
	eval(\"parent.location='../index.php?page=setRecommendation'\");
	</script>";

}else{
	echo "<script>alert ('Error');
	eval(\"parent.location='../index.php?page=setRecommendation\");
	</script>";

}
?>
