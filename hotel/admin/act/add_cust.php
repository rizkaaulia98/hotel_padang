<?php
include ('../../../connect.php');
$id = $_GET['id'];
$nama = $_POST['nama'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];
	$no_hp = $_POST['no_hp'];
	$role = $_POST['role'];
	$id = $_POST['id'];
	$user = $_POST['username'];
	$password = $_POST['password'];
	$pass = md5(md5($password));
	$sql = mysqli_query($conn, "INSERT into admin (name, address, hp, role, username, password, email) values ('$nama', '$alamat', '$no_hp','$role', '$user', '$pass', '$email')");

if ($sql){
	echo "<script>
	alert ('Data Successfully Added');
	</script>";
}else{
	echo "<script>
	alert ('Error');
	</script>";
}

	echo "<script>
	eval(\"parent.location='../index.php?page=manage_user'\");
	</script>";
?>
