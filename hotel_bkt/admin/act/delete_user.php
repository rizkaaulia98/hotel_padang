<?php
include ('../../../connect.php');
$id = $_GET['id'];
echo $id;

	$sql   = "DELETE from admin where username='$id'";
	$sql1 = "UPDATE hotel set username = null where username='$id'";
	$delete1 = mysqli_query($conn, $sql1);
	$delete = mysqli_query($conn, $sql);
	if ($delete){
		echo "<script>alert ('Data Successfully Delete');</script>";
	}
	else{
		echo "<script>alert ('Error');</script>";
	}

	echo "<script>eval(\"parent.location='../?page=manage_user'\");</script>";
?>
