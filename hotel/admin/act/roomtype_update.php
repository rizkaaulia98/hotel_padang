<?php
include ('../../../connect.php');

$id	= $_POST['id_type'];
$roomtype = $_POST['roomtype'];

$sql  = "update room set name='$roomtype' where id_type='$id'";
$insert = mysqli_query($conn, $sql);

if ($insert){
	echo "<script>alert ('Data Successfully Change');</script>";
}else{
	echo "<script>alert ('Error');</script>";
}
	echo "<script>
		eval(\"parent.location='../?page=roomtype'\");
		</script>";
?>
