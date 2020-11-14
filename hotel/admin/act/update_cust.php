<?php
include ('../../../connect.php');

//$id = $_POST['id'];
$stewardship_period = $_POST['stewardship_period'];
// $id_hotel = $_POST['aset'];
$nama = $_POST['nama'];
$password = $_POST['password'];
$pass = md5(md5($password));
$role = $_POST['role'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$periode = $_POST['periode'];
$email = $_POST['email'];
// $aset = $_POST['aset'];
//echo "username $username, $nama,$role";

$sql  = "UPDATE admin set name='$nama', password='$pass', role='C', hp='$no_hp', address='$alamat', email='$email' where username='$username'";
$insert = mysqli_query($conn, $sql);

if ($insert)
	{
	echo "<script>alert ('Data Successfully Change');</script>";
	}
else
	{
	echo "<script>alert ('Error');</script>";
	}
	echo "<script>
		eval(\"parent.location='../../index.php'\");
		</script>";
?>
