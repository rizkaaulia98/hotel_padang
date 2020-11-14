<?php
session_start();
include '../../../connect.php';
$id = $_POST['id'];
$nama = $_POST['admin'];
$info = $_POST['info'];
//$user = $_SESSION['username'];
echo "ini id $id, ini user $user, ini info $info, $role,$nama";

$cariMax = "select max(id_informasi) as max from information_admin";
$queryMax = mysqli_query($conn, $cariMax);
$dataMax = mysqli_fetch_array($queryMax);

$id_informasi = 0;
if($dataMax['max'] == null){
	$id_informasi = 1;
} else {
	$id_informasi = $dataMax['max'] + 1;
}

$tanggal = date("Y-m-d");

$sql = "insert into information_admin(username,id_hotel,informasi,tanggal,id_informasi) values('$nama','$id','$info','$tanggal','$id_informasi')";

$query_sql = mysqli_query($conn, $sql);
if($query_sql){
	echo "<script>alert ('Data Successfully Added');</script>";
	if($_SESSION['A']===true){
	header("location:../?page=hotel_detail&id=$id");
	}
	else{
		header("location:../indexu.php?page=hotel_owner&id=$id");
	}
}
else{
	echo "<script>alert ('Error');</script>";
	if($_SESSION['A']===true){
	header("location:../?page=hotel_detail&id=$id");
	}
	else{
		header("location:../indexu.php?page=hotel_owner&id=$id");
	}

}


 ?>
