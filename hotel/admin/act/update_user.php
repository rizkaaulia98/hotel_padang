<?php
include ('../../../connect.php');

//$id = $_POST['id'];
$stewardship_period = $_POST['stewardship_period'];
$id_hotel = $_POST['aset'];
$nama = $_POST['nama'];
$password = $_POST['password'];
$pass = md5(md5($password));
$role = $_POST['role'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$periode = $_POST['periode'];
$username = $_POST['username'];
$email = $_POST['email'];
$aset = $_POST['aset'];
//echo "username $username, $nama,$role";

$sql  = "UPDATE admin set name='$nama', password='$pass', role='$role', hp='$no_hp', address='$alamat', stewardship_period='$periode', username='$username', email='$email' where username='$username'";
$updateHotel = mysqli_query($conn, "UPDATE hotel set username=null where username='$username'");
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
