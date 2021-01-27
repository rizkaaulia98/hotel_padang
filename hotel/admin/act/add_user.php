<?php
include ('../../../connect.php');
// $id = $_GET['id'];
$nama = $_POST['nama'];
	$periode = $_POST['periode'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];
	$no_hp = $_POST['no_hp'];
	$role = $_POST['role'];
	$id = $_POST['ids'];
	$user = $_POST['username'];
	$password = $_POST['password'];
	$pass = md5(md5($password));
		$sql = mysqli_query($conn, "INSERT into admin (name, stewardship_period, address, hp, role, username, email)
	values ('$nama',  '$periode', '$alamat', '$no_hp','$role', '$user', '$email')");
	if($sql){
		for($i=0;$i<count($_POST['id']);$i++){
			$id = $_POST['id'][$i];
			$update = mysqli_query($conn, "UPDATE hotel set username='$user' where id = '$id'");
		}
	}

if ($sql){
	echo "<script>
	alert ('Data Successfully Added');
	</script>";
}else{
	echo "<script>
	alert ('Error');
	</script>";
	// echo mysqli_error($sql);
}

	echo "<script>
	eval(\"parent.location='../index.php?page=manage_user'\");
	</script>";

?>
