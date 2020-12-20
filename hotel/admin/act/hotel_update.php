<?php
session_start();
include ('../../../connect.php');
$id = $_POST['id'];
$nama = $_POST['name'];
$address = $_POST['address'];
$cp = $_POST['cp'];
$type = $_POST['type'];
$mushalla = $_POST['mushalla'];
$geom = $_POST['geom'];
$access = $_POST['access'];

$ktp = $_POST['ktp'];
$marriage_book = $_POST['marriage_book'];
if ($ktp != 1) {
	$ktp=0;
}
if ($marriage_book != 1) {
	$marriage_book=0;
}
$sql = mysqli_query($conn, "UPDATE hotel set id='$id', name='$nama', address='$address', cp='$cp', ktp='$ktp', mushalla='$mushalla', marriage_book='$marriage_book', id_type='$type', access='$access', geom=ST_GeomFromText('$geom') where id = '".$_POST['id_awal']."'");
	if ($sql){

		if($_SESSION['A']==true){
			echo "<script>alert ('Data Successfully Added');</script>";
		echo "<script>eval(\"parent.location='../index.php?page=hotel_detail&id=$id '\");</script>";
		}
		else{
			echo "<script>alert ('Data Successfully Added');</script>";
			echo "<script>eval(\"parent.location='../indexu.php?page=hotel_owner&id=$id '\");</script>";
		}
	}
	else{
		echo "<script>alert('Error');</script>";
	}
	// echo "<script>eval(\"parent.location='../index.php?page=hotel_detail&id=$id '\");</script>";
?>
