<?php
include ('../../../connect.php');
$id = $_GET['id'];
echo $id;

	$sql   = "DELETE from admin where username='$id'";
	$delete = mysqli_query($conn, $sql);
	if ($delete){
		echo "<script>alert ('Data Successfully Deleted');</script>";
	}
	else{
		echo "<script>alert ('Error');</script>";
	}

	echo "<script>eval(\"parent.location='../?page=manage_user'\");</script>";
?>
